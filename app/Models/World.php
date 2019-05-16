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
	 * The resources relation.
	 *
	 * @return HasMany
	 */
	public function resources(): HasMany
	{
		return $this->hasMany(WorldResource::class);
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
     * @return mixed
     */
    public function findStarterTiles (){
       return $this->where([
           ['type', '=', 3],
           ['occupied', '==', 0]
       ])
           ->orderBy('id', 'desc')
           ->first();
    }

    public function setFieldTaken($id) {
        $tile = $this->find($id);

        $tile->occupied = 1;

        $tile->save();
    }

}
