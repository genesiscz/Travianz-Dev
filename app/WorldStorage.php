<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WorldStorage extends Model
{
	/**
	 * The table associated with the model
	 *
	 * @var string
	 */
	protected $table = 'world_storage';
	
	/**
	 * Indicates the model primary key.
	 *
	 * @var bool
	 */
	protected $primaryKey = 'world_id';
	
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
	 * Indicates if the model primary key does increment.
	 *
	 * @var bool
	 */
	public $incrementing = false;
	
	/**
	 * The world relation
	 *
	 * @return BelongsTo
	 */
	public function world(): BelongsTo
	{
		return $this->belongsTo(World::class);
	}
}
