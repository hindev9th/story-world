<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    /**
     * a comment belong to user
     *
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * a comment belong to story
     *
     * @return BelongsTo
     */
    public function story()
    {
        return $this->belongsTo(Story::class);
    }

    /**
     * a comment belong to episode
     *
     * @return BelongsTo
     */
    public function episode()
    {
        return $this->belongsTo(Episode::class);
    }
}
