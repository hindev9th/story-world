<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;


    /**
     * a tag has many story
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function stories()
    {
        return $this->belongsToMany(Story::class);
    }
}
