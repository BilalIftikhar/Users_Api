<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone_number',
        'location',
        'city_id',
        'services',
        'description',
        'website_link',
        'picture'
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
