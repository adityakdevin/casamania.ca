<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FacebookDetail extends Model
{
    use SoftDeletes;

    protected $table = 'facebook_details';
    protected $fillable = ['user_id', 'fb_id', 'fb_name', 'fb_email', 'user_token', 'is_connected'];
    protected $casts = ['is_connected' => 'boolean'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
