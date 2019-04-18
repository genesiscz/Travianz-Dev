<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class World extends Model
{
	/**
	 * The table associated with the model
	 *
	 * @var string
	 */
	protected $table = 'world';
	
	/**
	 * The attributes that aren't mass assignable.
	 *
	 * @var array
	 */
	protected $guarded = [];

    /**
     * Indicates the resources name.
     *
     * @var array
     */
    public const RESOURCES = [
        0 => 'wood',
        1 => 'clay',
        2 => 'iron',
        3 => 'crop'
    ];

	/**
	 * Indicates if the model should be timestamped.
	 *
	 * @var bool
	 */
	public $timestamps = false;
	
	/**
	 * The loyalty relation.
	 *
	 * @return HasOne
	 */
	public function loyalty(): HasOne
	{
		return $this->hasOne(WorldLoyalty::class);
	}
	
	/**
	 * The resource relation.
	 *
	 * @return HasOne
	 */
	public function resource(): HasOne
	{
		return $this->hasOne(WorldResource::class);
	}
	
	/**
	 * The storage relation.
	 *
	 * @return HasOne
	 */
	public function storage(): HasOne
	{
		return $this->hasOne(WorldStorage::class);
	}
	
	/**
	 * The units relation.
	 *
	 * @return HasMany
	 */
	public function units(): HasMany
	{
		return $this->hasMany(WorldUnitList::class);
	}

    /**
     * Get a single resource.
     *
     * @param int $resourceId
     * @return int
     */
	public function getResource(int $resourceId): int
    {
        return $this->resource->{self::RESOURCES[$resourceId]};
    }
}
