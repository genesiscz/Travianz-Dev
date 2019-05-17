<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Tightenco\Parental\HasChildren;

class Oasis extends Model
{
    use HasChildren;

    /**
     * The table associated with the model
     *
     * @var string
     */
    protected $table = 'oasis';

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
     * The world relation
     *
     * @return BelongsTo
     */
    public function world(): BelongsTo
    {
        return $this->belongsTo(World::class);
    }

}
