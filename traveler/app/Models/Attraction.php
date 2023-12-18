<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attraction extends Model
{
    use HasFactory;

    protected $fillable = [
        'attraction', 'region', 'attractionType', 'information', 'photo', 'latitude', 'longitude',
        // Add other fields that need to be fillable
    ];
    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

}
