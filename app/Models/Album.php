<?php

namespace App\Models;

use Database\Factories\AlbumFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

#[Fillable([
    'user_id',
    'category',
    'title',
    'description',
    'cover_image',
    'event_date',
    'is_published',
])]
class Album extends Model
{
    /** @use HasFactory<AlbumFactory> */
    use HasFactory;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'event_date'   => 'date',
            'is_published' => 'boolean',
        ];
    }

    /**
     * El usuario creador del álbum.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Las fotos que pertenecen al álbum.
     */
    public function photos(): BelongsToMany
    {
        return $this->belongsToMany(Photo::class, 'album_photo')
                    ->withPivot('order')
                    ->withTimestamps()
                    ->orderBy('album_photo.order');
    }
}
