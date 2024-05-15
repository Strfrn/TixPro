<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kursi extends Model
{
    use HasFactory;

/**
 * Get the studio that owns the kursi
 *
 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
 */
public function studio(): BelongsTo
{
    return $this->belongsTo(studio::class, 'foreign_key', 'other_key');
}
}
