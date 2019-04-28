<?php

namespace App\Models;

use App\Game\Resources\Lumber;
use App\Game\Resources\Clay;
use App\Game\Resources\Iron;
use App\Game\Resources\Crop;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Tightenco\Parental\HasChildren;

class WorldResource extends Model
{
    use HasChildren;

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
     * The resources list.
     *
     * @var array
     */
    protected $childTypes = [
        Lumber::class,
        Clay::class,
        Iron::class,
        Crop::class
    ];
	
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
