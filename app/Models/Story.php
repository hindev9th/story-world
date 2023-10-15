<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Story extends Model
{
    use HasFactory;

    /**
     * a story has many tag
     *
     * @return BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * a story can have many episodes
     *
     * @return HasMany
     */
    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }

    /**
     * a story can have many rates
     *
     * @return HasMany
     */
    public function rates()
    {
        return $this->hasMany(Rate::class);
    }

    /**
     * a story has many followers
     *
     * @return BelongsToMany
     */
    public function folowers()
    {
        return $this->belongsToMany(User::class);
    }
}
