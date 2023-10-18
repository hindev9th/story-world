<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Story extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name','author','highlights','status','image','description'];

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
