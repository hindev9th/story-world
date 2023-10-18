<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rate extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * a rate belong to user
     *
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * a rate belong to story
     *
     * @return BelongsTo
     */
    public function story()
    {
        return $this->belongsTo(Story::class);
    }
}
