<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * a tag has many story
     *
     * @return BelongsToMany
     */
    public function stories()
    {
        return $this->belongsToMany(Story::class);
    }
}
