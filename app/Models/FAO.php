<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FAO extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'picture',
        'phone_number',
        'location',
        'city_id',
        'services',
        'description'
    ];
    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
