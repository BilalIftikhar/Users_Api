<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class UserData extends Model
{
    use HasApiTokens, HasFactory;

    // Specify the table name
    protected $table = 'users_data';

    // Define which attributes are mass assignable
    protected $fillable = [
        'name', 'cnic', 'phone_number', 'password', 'city', 'cultivated_area', 'grows',
    ];

    // Cast the 'grows' field to an array when retrieving from the database
    protected $casts = [
        'grows' => 'array',  // Automatically cast 'grows' field as an array
    ];
}
