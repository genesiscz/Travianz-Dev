<?php


namespace App\Game\Units\Gauls;


use App\Enums\UnitKindEnums;
use App\Enums\UnitCategoryEnums;
use Unit;

class Druidrider extends Unit
{
    /**
     * {@inheritDoc}
     * @see Unit::ATTACK
     */
    public const ATTACK = 45;

    /**
     * {@inheritDoc}
     * @see Unit::INFANTRY_DEFENSE
     */
    public const INFANTRY_DEFENSE = 115;

    /**
     * {@inheritDoc}
     * @see Unit::CAVALRY_DEFENSE
     */
    public const CAVALRY_DEFENSE = 55;

    /**
     * {@inheritDoc}
     * @see Unit::SPEED
     */
    public const SPEED = 16;

    /**
     * {@inheritDoc}
     * @see Unit::CAPACITY
     */
    public const CAPACITY = 35;

    /**
     * {@inheritDoc}
     * @see Unit::UPKEEP
     */
    public const UPKEEP = 2;

    /**
     * {@inheritDoc}
     * @see Unit::TRAIN_NEEDED_TIME
     */
    public const TRAIN_NEEDED_TIME = 3200;

    /**
     * {@inheritDoc}
     * @see Unit::KIND
     */
    public const CATEGORY = UnitCategoryEnums::CAVALRY;

    /**
     * {@inheritDoc}
     * @see Unit::CATEGORY
     */
    public const KIND = UnitKindEnums::NONE;

    /**
     * {@inheritDoc}
     * @see Unit::TRAIN_NEEDED_RESOURCES
     */
    protected const TRAIN_NEEDED_RESOURCES = [360, 330, 280, 120];
}
