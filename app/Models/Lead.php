<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'last_name',
        'email',
        'contact',
        'remark',
        'Ml_num',
        'tags',
        'source',
        'stage'
    ];

    // propertyDetails
    public function propertyDetails()
    {
        return $this->hasOne('App\Models\Property', 'Ml_num', 'Ml_num');
    }
}
