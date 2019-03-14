<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Village extends Model
{
    /**
     * The table associated with the model
     *
     * @var string
     */
    protected $table = 'village';

    /**
     * Indicates the model primary key.
     *
     * @var bool
     */
    protected $primaryKey = 'world_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'name', 'capital', 'population'];

    /**
     * Disables updated_at column.
     *
     * @var bool
     */
    public const UPDATED_AT = null;

    /**
     * Indicates if the model primary key does increment.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The building queue relation.
     *
     * @return HasMany
     */
    public function buildings(): HasMany
    {
        return $this->hasMany(Building::class, 'village_id', 'world_id');
    }

    /**
     * The world relation.
     *
     * @return BelongsTo
     */
    public function world(): BelongsTo
    {
        return $this->belongsTo(World::class);
    }

    /**
     * The owner relation.
     *
     * @return BelongsTo
     */
    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * The village buildings queue.
     *
     * @return Collection
     */
    public function buildingsQueue(): Collection
    {
        if (isset($this->attributes['buildings_queue'])) return $this->attributes['buildings_queue'];

        return $this->attributes['buildings_queue'] = $this
            ->hasManyThrough(BuildingQueue::class, Building::class, 'village_id', 'building_id')
            ->with('building')
            ->get();
    }
}
