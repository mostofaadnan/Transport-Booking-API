<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusInfo extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'bus_name',
        'bus_number',
        'License_Number',
        'type',
        'bus_company',
        'total_seat',
        'per_label_seat',
        'status'
    ];
}
