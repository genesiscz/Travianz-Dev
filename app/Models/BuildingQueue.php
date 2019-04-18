<?php

namespace App\Models;

use App\Scopes\EndedAtScope;
use App\Traits\TimeConvertible;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BuildingQueue extends Model
{
    use TimeConvertible;

    /**
     * The table associated with the model
     *
     * @var string
     */
    protected $table = 'building_queue';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Disables updated_at column.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['ended_at'];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot(): void
    {
        parent::boot();

        static::addGlobalScope(new EndedAtScope());
    }

    /**
     * The building relation.
     *
     * @return BelongsTo
     */
    public function building(): BelongsTo
    {
        return $this->belongsTo(Building::class);
    }

    /**
     * Get the building queue time left.
     *
     * @return string
     */
    public function getTimeLeftAttribute(): string
    {
        return $this->secondsToTimeString($this->ended_at->getTimestamp() - now()->getTimestamp());
    }
}
