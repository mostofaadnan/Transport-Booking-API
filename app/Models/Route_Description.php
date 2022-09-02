<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route_Description extends Model
{
    use HasFactory;

    protected $fillable = [
        'startting_point',
        'starting_station',
        'ending_point',
        'ending_station',
        'status'
    ];
}
