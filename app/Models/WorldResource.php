<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WorldResource extends Model
{
	/**
	 * The table associated with the model
	 *
	 * @var string
	 */
	protected $table = 'world_resource';
	
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
	 * Disables created_at column.
	 *
	 * @var bool
	 */
	public const CREATED_AT = null;
	
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
