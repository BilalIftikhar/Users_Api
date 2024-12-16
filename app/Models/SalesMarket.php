<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesMarket extends Model
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
    protected $casts = [
        'services' => 'array', // This ensures JSON is cast to an array
    ];
    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
