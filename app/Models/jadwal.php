<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jadwal extends Model
{
    use HasFactory;
    /**
     * Get the film that owns the jadwal
     *
     * @return \Illuminate\Database\Eloquent\Relatios\BelongsTo
     */
    public function film(): BelongsTo
    {
        return $this->belongsTo(film::class, 'foreign_ky', 'other_key');
    }
}
