<?php


namespace App\Game\Bonuses;

use App\Models\Bonus;
use Tightenco\Parental\HasParent;

class Plus extends Bonus
{
    use HasParent;

    /**
     * {@inheritDoc}
     * @see Bonus::BASE_DURATION
     */
    public const BASE_DURATION = 604800;
}
