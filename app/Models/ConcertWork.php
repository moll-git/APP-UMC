<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ConcertWork extends Model
{
    protected $fillable = [
        'concert_id',
        'order',
        'title',
        'youtube_url',
    ];

    public function concert(): BelongsTo
    {
        return $this->belongsTo(Concert::class);
    }
}
