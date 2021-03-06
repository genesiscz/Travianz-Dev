<?php


namespace App\Game\Units\Romans;


use App\Enums\UnitKindEnums;
use App\Enums\UnitCategoryEnums;
use App\Game\Buildings\Academy;
use App\Game\Buildings\Armoury;
use App\Models\Unit;

final class Praetorian extends Unit
{
    /**
     * {@inheritDoc}
     * @see Unit::ATTACK
     */
    public const ATTACK = 30;

    /**
     * {@inheritDoc}
     * @see Unit::INFANTRY_DEFENSE
     */
    public const INFANTRY_DEFENSE = 65;

    /**
     * {@inheritDoc}
     * @see Unit::CAVALRY_DEFENSE
     */
    public const CAVALRY_DEFENSE = 35;

    /**
     * {@inheritDoc}
     * @see Unit::SPEED
     */
    public const SPEED = 5;

    /**
     * {@inheritDoc}
     * @see Unit::CAPACITY
     */
    public const CAPACITY = 20;

    /**
     * {@inheritDoc}
     * @see Unit::UPKEEP
     */
    public const UPKEEP = 1;

    /**
     * {@inheritDoc}
     * @see Unit::TRAIN_NEEDED_TIME
     */
    public const TRAIN_NEEDED_TIME = 2200;

    /**
     * {@inheritDoc}
     * @see Unit::RESEARCH_REQUIREMENTS
     */
    public const RESEARCH_REQUIREMENTS = [Academy::class => 1, Armoury::class => 1];

    /**
     * {@inheritDoc}
     * @see Unit::KIND
     */
    public const CATEGORY = UnitCategoryEnums::INFANTRY;

    /**
     * {@inheritDoc}
     * @see Unit::CATEGORY
     */
    public const KIND = UnitKindEnums::NONE;

    /**
     * {@inheritDoc}
     * @see Unit::TRAIN_NEEDED_RESOURCES
     */
    protected const TRAIN_NEEDED_RESOURCES = [100, 130, 160, 70];
}
