<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class MpesaController extends Controller
{
    private $base_url;
    private $consumer_key;
    private $consumer_secret;
    private $access_token;

    public function __construct()
    {
        $this->base_url = 'https://sandbox.safaricom.co.ke'; // Change for production
        $this->consumer_key = "Ez6tus6YsOOalsRpKNWpuJSeQfMhLkS8dg89nIccZKBFAP5T";
        $this->consumer_secret = "Fs7PECtLgEhSbe1OqDBshA2jX5uF760EammVrFiZj6SvBQYOOVfqsJ7eCWJYY9bL";

        // Generate the access token on controller initialization
        $this->access_token = $this->generateAccessToken();
    }

    /**
     * Generate M-Pesa Access Token
     *
     * @return string|null
     */
    private function generateAccessToken()
    {
        try {
            $client = new Client(['verify' => false]);

            $response = $client->request('GET', "{$this->base_url}/oauth/v1/generate?grant_type=client_credentials", [
                'headers' => [
                    'Authorization' => 'Basic ' . base64_encode("{$this->consumer_key}:{$this->consumer_secret}"),
                ],
            ]);

            $body = json_decode($response->getBody(), true);

            if (!isset($body['access_token'])) {
                Log::error("Access Token Error: ", $body);
                return null;
            }

            Log::info("Access Token Generated Successfully: " . $body['access_token']);
            return $body['access_token'];
        } catch (\Exception $e) {
            Log::error("Access Token Generation Failed: " . $e->getMessage());
            return null;
        }
    }

    /**
     * Perform STK Push Request
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function stkPush(Request $request)
    {
        try {
            // Validate the request
            $validatedData = $request->validate([
                'amount' => 'required|numeric|min:1',
                'phone' => 'required|regex:/^254[17]\d{8}$/', // Accepts 2547xx (Safaricom) & 2541xx (Airtel)
            ]);

            $shortcode = "174379"; // Sandbox paybill number
            $passkey = "JJS+HfVJPTEdO5MYmTN2ORzQJRgfy+3pcE2bDlsAiWX3DJXh6+s+R+gPpekhZ3Z6bfFWka/3U8d+ZFEhxoCJEv7csH3OakXGwEvgW5jq89VQldfNOKeNVb/75crCGkA4mLU++nQaIVeDU/RxvPKJXUTuDrQ28DbmdwnDZ/HhHWCvz8tVIhZxaRNlusE82W5tzJHW56AUTPpTW74k6LEFUpVkvVB24o0tZU1oMtYQxYOdWtCrWzH8aRgOK8LkG4Yzr6oNsHJ4jqvG3HA7zVBzGJpLGknso0lG0w5vlnhlbxWnUSteyxeAueNOe3QQeznpG6rnthVVw9vxhOs3GGuUg==";
            $timestamp = now()->format('YmdHis');
            $password = base64_encode("{$shortcode}{$passkey}{$timestamp}");

            // Ngrok callback URL
            $callbackUrl = "https://012c-102-219-209-138.ngrok-free.app/mpesa/callback";

            if (!$this->access_token) {
                return response()->json(['error' => 'Access token generation failed. Check logs.'], 500);
            }

            $client = new Client(['verify' => false]);

            // Prepare the STK Push payload
            $payload = [
                'BusinessShortCode' => $shortcode,
                'Password' => $password,
                'Timestamp' => $timestamp,
                'TransactionType' => 'CustomerPayBillOnline',
                'Amount' => $validatedData['amount'],
                'PartyA' => $validatedData['phone'],
                'PartyB' => $shortcode,
                'PhoneNumber' => $validatedData['phone'],
                'CallBackURL' => $callbackUrl,
                'AccountReference' => 'BetTCash Payment',
                'TransactionDesc' => 'Payment for BetTCash',
            ];

            Log::info("STK Push Request Payload: ", $payload);

            // Send the STK Push request
            $response = $client->post("{$this->base_url}/mpesa/stkpush/v1/processrequest", [
                'headers' => [
                    'Authorization' => "Bearer {$this->access_token}",
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                ],
                'json' => $payload,
            ]);

            $body = json_decode($response->getBody(), true);
            Log::info("STK Push Response: ", $body);

            // Check for STK Push errors
            if (!isset($body['ResponseCode']) || $body['ResponseCode'] !== '0') {
                Log::error("STK Push Failed: " . json_encode($body));
                return response()->json([
                    'error' => 'STK Push request failed.',
                    'response' => $body,
                ], 500);
            }

            return response()->json([
                'message' => 'STK Push request sent successfully. Please complete the payment on your phone.',
                'response' => $body,
            ]);
        } catch (\Exception $e) {
            Log::error("STK Push Failed: " . $e->getMessage());
            return response()->json(['error' => 'STK Push request failed. Check logs for details.'], 500);
        }
    }

    /**
     * M-Pesa Callback Handler
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function callback(Request $request)
    {
        Log::info("M-Pesa Callback Received: ", $request->all());

        return response()->json(['ResultCode' => 0, 'ResultDesc' => 'Success']);
    }
}
