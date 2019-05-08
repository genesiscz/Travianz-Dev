<?php

namespace App\Models;

use App\Enums\UnitKindEnums;
use App\Enums\UnitCategoryEnums;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    /**
     * The unit attack.
     *
     * @var int
     */
    public const ATTACK = 0;

    /**
     * The unit infantry defense.
     *
     * @var int
     */
    public const INFANTRY_DEFENSE = 0;

    /**
     * The unit cavalry defense.
     *
     * @var int
     */
    public const CAVALRY_DEFENSE = 0;

    /**
     * The unit speed.
     *
     * @var int
     */
    public const SPEED = 20;

    /**
     * The unit loot capacity.
     *
     * @var int
     */
    public const CAPACITY = 0;

    /**
     * The unit upkeep.
     *
     * @var int
     */
    public const UPKEEP = 0;

    /**
     * The time needed to train the unit.
     *
     * @var int
     */
    public const TRAIN_NEEDED_TIME = 0;

    /**
     * The unit kind.
     *
     * @var int
     */
    public const CATEGORY = UnitCategoryEnums::INFANTRY;

    /**
     * The unit category.
     *
     * @var int
     */
    public const KIND = UnitKindEnums::NONE;

    /**
     * The resources needed to train the unit.
     *
     * @var array
     */
    protected const TRAIN_NEEDED_RESOURCES = [0, 0, 0, 0];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function getTrainNeededResources(): Collection
    {
        return new Collection(static::TRAIN_NEEDED_RESOURCES);
    }
}
