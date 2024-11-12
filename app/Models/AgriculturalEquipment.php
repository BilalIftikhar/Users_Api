<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgriculturalEquipment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'picture', 'audio_link', 'video_link'
    ];
}
