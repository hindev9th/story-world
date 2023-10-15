<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BlogComments extends Model
{
    use HasFactory;

    /**
     * a comment belong to blog
     *
     * @return BelongsTo
     */
    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }

    /**
     * a comment belong to user
     *
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
