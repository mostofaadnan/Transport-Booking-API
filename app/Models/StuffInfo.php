<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StuffInfo extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'address', 'mobile', 'email', 'joining_date', 'image', 'status'];
}
