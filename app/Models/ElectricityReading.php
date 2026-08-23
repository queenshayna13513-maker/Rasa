<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ElectricityReading extends Model
{
    protected $fillable = [
        'voltage',
        'current',
        'power',
        'status',
    ];
}