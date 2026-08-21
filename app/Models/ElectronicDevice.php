<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ElectronicDevice extends Model
{
   protected $fillable = [
        'house_id',
        'name',
        'category',
        'voltage',
        'watt',
        'status',
    ];

    public function house(): BelongsTo
    {
        return $this->belongsTo(House::class);
    }
}
