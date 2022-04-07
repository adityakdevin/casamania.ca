<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecentVisited extends Model
{
    use HasFactory;

    protected $fillable =  [
        'user_id',
        'ml_num'
    ];
    // propertyDetails
    public function propertyDetails()
    {
        return $this->hasOne('App\Models\Property', 'Ml_num', 'ml_num');
    }
}
