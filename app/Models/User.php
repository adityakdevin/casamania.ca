<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'last_name',
        'email',
        'contact',
        'password',
        'google_link',
        'facebook_link',
        'instagram_link',
        'address',
        'avatar',
        'role',
        'is_deleted',
        'social_uid',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function recentLead()
    {
        return $this->hasOne('App\Models\Lead', 'user_id', 'id')->orderBy('id', "desc");
    }

    public function inquiredProperty()
    {
        return $this->hasMany('App\Models\Lead', 'user_id', 'id')->orderBy('id', "desc");
    }

    public function activity()
    {
        return $this->hasMany('App\Models\RecentVisited', 'user_id', 'id')->orderBy('id', "desc");
    }
}
