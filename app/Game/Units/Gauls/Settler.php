<?php


namespace App\Game\Units\Gauls;


use App\Enums\UnitKindEnums;
use App\Enums\UnitCategoryEnums;
use App\Models\Unit;

class Settler extends Unit
{
    /**
     * {@inheritDoc}
     * @see Unit::ATTACK
     */
    public const ATTACK = 0;

    /**
     * {@inheritDoc}
     * @see Unit::INFANTRY_DEFENSE
     */
    public const INFANTRY_DEFENSE = 80;

    /**
     * {@inheritDoc}
     * @see Unit::CAVALRY_DEFENSE
     */
    public const CAVALRY_DEFENSE = 80;

    /**
     * {@inheritDoc}
     * @see Unit::SPEED
     */
    public const SPEED = 5;

    /**
     * {@inheritDoc}
     * @see Unit::CAPACITY
     */
    public const CAPACITY = 3000;

    /**
     * {@inheritDoc}
     * @see Unit::UPKEEP
     */
    public const UPKEEP = 1;

    /**
     * {@inheritDoc}
     * @see Unit::TRAIN_NEEDED_TIME
     */
    public const TRAIN_NEEDED_TIME = 22700;

    /**
     * {@inheritDoc}
     * @see Unit::KIND
     */
    public const CATEGORY = UnitCategoryEnums::COLONIZERS;

    /**
     * {@inheritDoc}
     * @see Unit::CATEGORY
     */
    public const KIND = UnitKindEnums::SETTLER;

    /**
     * {@inheritDoc}
     * @see Unit::TRAIN_NEEDED_RESOURCES
     */
    protected const TRAIN_NEEDED_RESOURCES = [5500, 7000, 5300, 4900];
}
