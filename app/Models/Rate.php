<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;

    /**
     * a rate belong to user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * a rate belong to story
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function story()
    {
        return $this->belongsTo(Story::class);
    }
}
