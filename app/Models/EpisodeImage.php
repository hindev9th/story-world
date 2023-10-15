<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EpisodeImage extends Model
{
    use HasFactory;

    /**
     * a image belong to episode
     *
     * @return BelongsTo
     */
    public function episode()
    {
        return $this->belongsTo(Episode::class);
    }
}
