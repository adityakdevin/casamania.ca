<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FacebookPage extends Model
{
  use SoftDeletes;

  protected $table = 'facebook_pages';
  protected $fillable = ['user_id', 'fb_user_id', 'name', 'category', 'category_list', 'page_id', 'is_active', 'page_access_token', 'is_subscribed'];
  protected $casts = ['is_subscribed' => 'boolean', 'is_active' => 'boolean', 'category_list' => 'json'];

  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
