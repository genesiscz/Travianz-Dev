<?php


namespace App\Game\Units\Nature;


use App\Enums\UnitKindEnums;
use App\Enums\UnitCategoryEnums;
use App\Models\Unit;

class Spider extends Unit
{
    /**
     * {@inheritDoc}
     * @see Unit::ATTACK
     */
    public const ATTACK = 20;

    /**
     * {@inheritDoc}
     * @see Unit::INFANTRY_DEFENSE
     */
    public const INFANTRY_DEFENSE = 35;

    /**
     * {@inheritDoc}
     * @see Unit::CAVALRY_DEFENSE
     */
    public const CAVALRY_DEFENSE = 40;

    /**
     * {@inheritDoc}
     * @see Unit::UPKEEP
     */
    public const UPKEEP = 1;

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
}
