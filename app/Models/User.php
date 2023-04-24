<?php

namespace App\Models;

use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use  SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name', 'email', 'password', 'status', 'selfie', 'facebook', 'instagram',
        'phone'
    ];
    // public static function checkSuperAdmin()
    // {
    //     $superAdmin = Self::all();
    //     if (count($superAdmin) < 1) {
    //         $data = [
    //             'id' => 1,
    //             'name' => 'Bashar',
    //             'email' => 'bashar@gmail.com',
    //             'password' => bcrypt('12341234'),
    //             'status' => 'superAdmin',
    //         ];
    //         $team = [
    //             'id' => 1,
    //             'user_id' => 1,
    //             'name' => "Bashar 's Team",
    //             'personal_team' => 1
    //         ];
    //         Self::create($data);
    //         Team::create($team);
    //     }
    //     return Self::first();
    // }

    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }
    public function archive()
    {
        return $this->belongsTo(Archive::class);
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];
}
