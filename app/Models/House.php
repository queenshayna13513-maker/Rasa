<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
     protected $fillable = [
        'user_id',
        'elderly_name',
        'address',
        'phone',
        'nominal_voltage',
        'status',
        'power_status',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function electronicDevices()
    {
        return $this->hasMany(ElectronicDevice::class);
    }

    public function powerReadings()
    {
        return $this->hasMany(PowerReading::class);
    }

    public function alerts()
    {
        return $this->hasMany(Alert::class);
    }

    public function systemLogs()
    {
        return $this->hasMany(SystemLog::class);
    }
}
