<?php


namespace App\Game\Units\Romans;


use App\Enums\UnitKindEnums;
use App\Enums\UnitCategoryEnums;
use App\Models\Unit;

class BatteringRam extends Unit
{
    /**
     * {@inheritDoc}
     * @see Unit::ATTACK
     */
    public const ATTACK = 60;

    /**
     * {@inheritDoc}
     * @see Unit::INFANTRY_DEFENSE
     */
    public const INFANTRY_DEFENSE = 30;

    /**
     * {@inheritDoc}
     * @see Unit::CAVALRY_DEFENSE
     */
    public const CAVALRY_DEFENSE = 75;

    /**
     * {@inheritDoc}
     * @see Unit::SPEED
     */
    public const SPEED = 4;

    /**
     * {@inheritDoc}
     * @see Unit::CAPACITY
     */
    public const CAPACITY = 0;

    /**
     * {@inheritDoc}
     * @see Unit::UPKEEP
     */
    public const UPKEEP = 3;

    /**
     * {@inheritDoc}
     * @see Unit::TRAIN_NEEDED_TIME
     */
    public const TRAIN_NEEDED_TIME = 4600;

    /**
     * {@inheritDoc}
     * @see Unit::KIND
     */
    public const CATEGORY = UnitCategoryEnums::SIEGE;

    /**
     * {@inheritDoc}
     * @see Unit::CATEGORY
     */
    public const KIND = UnitKindEnums::RAM;

    /**
     * {@inheritDoc}
     * @see Unit::TRAIN_NEEDED_RESOURCES
     */
    protected const TRAIN_NEEDED_RESOURCES = [900, 360, 500, 70];
}
