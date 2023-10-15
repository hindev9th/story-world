<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Episode extends Model
{
    use HasFactory;


    /**
     * a episode belong to story
     *
     * @return BelongsTo
     */
    public function story()
    {
        return $this->belongsTo(Story::class);
    }

    /**
     * a episode can have many images
     *
     * @return HasMany
     */
    public function images()
    {
        return $this->hasMany(EpisodeImage::class);
    }
}
