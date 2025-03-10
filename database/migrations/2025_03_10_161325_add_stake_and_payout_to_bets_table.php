<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('bets', function (Blueprint $table) {
        $table->decimal('stake', 10, 2)->nullable()->after('odds');
        $table->decimal('potential_payout', 10, 2)->nullable()->after('stake');
    });
}




    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('bets', function (Blueprint $table) {
            $table->dropColumn(['stake', 'potential_payout']);
        });
    }
};
