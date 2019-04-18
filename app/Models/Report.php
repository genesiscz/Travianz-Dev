<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Report extends Model
{
    /**
     * The table associated with the model
     *
     * @var string
     */
    protected $table = 'report';

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
    public const UPDATED_AT = null;

    /**
     * The from User relation.
     *
     * @return BelongsTo
     */
    public function fromUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'from_user_id');
    }

    /**
     * The from village relation.
     *
     * @return BelongsTo
     */
    public function fromVillage(): BelongsTo
    {
        return $this->belongsTo(Village::class, 'from_village_id', 'world_id');
    }

    /**
     * The from User relation.
     *
     * @return BelongsTo
     */
    public function toUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'to_user_id');
    }

    /**
     * The to village relation.
     *
     * @return BelongsTo
     */
    public function toVillage(): BelongsTo
    {
        return $this->belongsTo(Village::class, 'from_village_id', 'world_id');
    }
}
