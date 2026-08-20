<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {


            // Username
            $table->string('username')
                  ->unique()
                  ->after('name');


            // Phone Number
            $table->string('phone_number')
                  ->unique()
                  ->nullable()
                  ->after('email');


            // Birthday
            $table->date('birthday')
                  ->nullable()
                  ->after('phone_number');


            // Profile Image
            $table->string('profile_image')
                  ->nullable()
                  ->after('birthday');


            // OTP Verification
            $table->string('otp_code')
                  ->nullable()
                  ->after('profile_image');


            $table->timestamp('otp_expire_time')
                  ->nullable()
                  ->after('otp_code');


            $table->boolean('verify_status')
                  ->default(false)
                  ->after('otp_expire_time');



            // Security

            $table->integer('failed_login_attempts')
                  ->default(0)
                  ->after('verify_status');


            $table->boolean('is_locked')
                  ->default(false)
                  ->after('failed_login_attempts');


            $table->boolean('two_factor')
                  ->default(false)
                  ->after('is_locked');

        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {

            $table->dropColumn([

                'username',
                'phone_number',
                'birthday',
                'profile_image',
                'otp_code',
                'otp_expire_time',
                'verify_status',
                'failed_login_attempts',
                'is_locked',
                'two_factor'

            ]);

        });
    }
};