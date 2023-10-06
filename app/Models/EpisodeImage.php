<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EpisodeImage extends Model
{
    use HasFactory;

    /**
     * a image belong to episode
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function episode()
    {
        return $this->belongsTo(Episode::class);
    }
}
