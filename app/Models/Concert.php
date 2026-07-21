<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Concert extends Model
{
    protected $fillable = [
        'title',
        'location',
        'date',
        'time',
        'status',
        'vestuario',
        'notes',
    ];

    protected $casts = [
        'date' => 'date',
    ];

    public function works(): HasMany
    {
        return $this->hasMany(ConcertWork::class)->orderBy('order');
    }

    public function workGroups(): BelongsToMany
    {
        return $this->belongsToMany(WorkGroup::class, 'concert_work_group');
    }

    public function isPast(): bool
    {
        return $this->status === 'past';
    }

    public function isUpcoming(): bool
    {
        return in_array($this->status, ['upcoming', 'in_preparation']);
    }

    public function statusLabel(): string
    {
        return match($this->status) {
            'upcoming'       => 'Pròxim',
            'in_preparation' => 'En preparació',
            'past'           => 'Passat',
            default          => 'Desconegut',
        };
    }
}
