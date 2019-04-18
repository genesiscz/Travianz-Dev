<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VillageSelected extends Model
{
	/**
	 * The table associated with the model
	 *
	 * @var string
	 */
	protected $table = 'village_selected';
	
	/**
	 * Indicates the model primary key.
	 *
	 * @var bool
	 */
	protected $primaryKey = 'user_id';
	
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
	 * The user relation.
	 * 
	 * @return BelongsTo
	 */
	public function user(): BelongsTo
	{
		return $this->belongsTo(User::class);
	}
	
	/**
	 * The village relation.
	 * 
	 * @return BelongsTo
	 */
	public function village(): BelongsTo
	{
		return $this->belongsTo(Village::class, 'village_id', 'world_id');
	}
}
