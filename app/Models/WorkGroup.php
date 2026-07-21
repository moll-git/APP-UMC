<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class WorkGroup extends Model
{
    protected $fillable = [
        'name',
        'color',
        'description',
    ];

    public function concerts(): BelongsToMany
    {
        return $this->belongsToMany(Concert::class, 'concert_work_group');
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_work_group');
    }
}
