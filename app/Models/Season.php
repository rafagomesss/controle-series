<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{
    BelongsTo,
    HasMany
};

class Season extends Model
{
    use HasFactory;

    protected $fillable = ['number'];

    public function series(): BelongsTo
    {
        return $this->belongsTo(Serie::class, 'series_id');
    }

    public function episodes(): HasMany
    {
        return $this->hasMany(Episode::class);
    }

    public function numberOfWatchedEpisodes(): int
    {
        return $this->episodes
            ->filter(fn ($episode) => $episode->watched)
            ->count();
    }
}
