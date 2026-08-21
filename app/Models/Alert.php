<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Alert extends Model
{
    // 👇 TAMBAHKAN BARIS INI 👇
    public $timestamps = false;

    // Karena timestamps dimatikan, kita harus kasih tahu Laravel
    // bahwa kolom created_at tetap ada tapi tanpa auto-update
    const CREATED_AT = 'created_at';
    const UPDATED_AT = null;

    protected $fillable = [
        'house_id',
        'title',
        'message',
        'severity',
        'is_read',
    ];

    protected $casts = [
        'is_read' => 'boolean',
    ];

    public function house(): BelongsTo
    {
        return $this->belongsTo(House::class);
    }
}