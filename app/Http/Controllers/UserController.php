<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class UserController extends Controller
{
    /**
     * Display the dashboard with user data.
     */
    public function index()
    {
        // Get the authenticated user
        $user = Auth::user();

        // Fetch user details
        $userData = User::select('id', 'first_name', 'middle_name', 'last_name', 'username', 'phone', 'email', 'profile_image', 'created_at')
                        ->where('id', $user->id)
                        ->first();

        return view('dashboard', compact('userData'));
    }

    /**
     * Handle profile image upload and update user record.
     */
    public function uploadProfileImage(Request $request)
    {
        $request->validate([
            'profile_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Ensure it's an image file
        ]);

        $user = Auth::user();
        $user = User::find(Auth::id()); // Ensures it's an Eloquent instance

        if ($request->hasFile('profile_image')) {
            $destinationPath = public_path('assets/upload/users');
        
            if ($user->profile_image && File::exists($destinationPath . '/' . $user->profile_image) && $user->profile_image !== 'default_user_img.jpeg') {
                File::delete($destinationPath . '/' . $user->profile_image);
            }
        
            $image = $request->file('profile_image');
            $imageName = time() . '_' . $user->id . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageName);
        
            // Now update works because $user is an Eloquent instance
            $user->update(['profile_image' => $imageName]);
        }
        
        return back()->with('success', 'Profile image uploaded successfully.');
    }
}
