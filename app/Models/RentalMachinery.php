<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentalMachinery extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone_number',
        'location',
        'city_id',
        'services',
        'description',
        'picture',
    ];

    // Relationship with City
    public function city()
    {
        return $this->belongsTo(City::class);
    }
}

