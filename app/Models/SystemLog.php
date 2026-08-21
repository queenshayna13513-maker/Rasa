<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SystemLog extends Model
{
    protected $fillable = [
        'house_id',
        'type',
        'message',
        'status',
    ];

    public function house(): BelongsTo
    {
        return $this->belongsTo(House::class);
    }
}