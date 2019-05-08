<?php

namespace App\Models;

use App\Game\Buildings\Queues\Normal;
use App\Game\Buildings\Queues\WaitingLoop;
use App\Game\Buildings\Queues\MasterBuilder;
use App\Game\Buildings\Queues\Demolition;
use App\Scopes\EndedAtScope;
use App\Traits\TimeConvertible;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Tightenco\Parental\HasChildren;

class BuildingQueue extends Model
{
    use HasChildren, TimeConvertible;

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
     * The building queues list.
     *
     * @var array
     */
    protected $childTypes = [
        Normal::class,
        WaitingLoop::class,
        MasterBuilder::class,
        Demolition::class
    ];

    /**
     * The building queues count list.
     *
     * @var array
     */
    public const BASE_QUEUE_COUNT = [
        Normal::class => 1,
        WaitingLoop::class => 1,
        MasterBuilder::class => 3,
        Demolition::class => 1
    ];

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
