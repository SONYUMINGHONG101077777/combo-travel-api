<?php

namespace App\Models;

/**
 * @mixin \Illuminate\Database\Eloquent\Builder
 * @method static \Illuminate\Database\Eloquent\Builder|static where(string $column, string $operator = null, mixed $value = null, string $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|static orWhere(string $column, string $operator = null, mixed $value = null)
 * @method \Laravel\Sanctum\PersonalAccessToken|null currentAccessToken()
 */
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


#[Fillable([
    'name',
    'username',
    'email',
    'phone_number',
    'password',
    'birthday',
    'profile_image',

    'otp_code',
    'otp_expire_time',
    'verify_status',

    'failed_login_attempts',
    'is_locked',
    'two_factor',

    'settings',
])]


#[Hidden([
    'password',
    'remember_token',
    'otp_code'
])]


class User extends Authenticatable
{

    /** @use HasFactory<UserFactory> */
    use HasApiTokens, HasFactory, Notifiable;



    protected function casts(): array
    {
        return [

            'email_verified_at' => 'datetime',

            'password' => 'hashed',

            'otp_expire_time' => 'datetime',

            'birthday' => 'date',

            'verify_status' => 'boolean',

            'is_locked' => 'boolean',

            'two_factor' => 'boolean',

            'settings' => 'array',

        ];
    }
}