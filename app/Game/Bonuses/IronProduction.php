<?php


namespace App\Game\Bonuses;

use App\Models\Bonus;
use Tightenco\Parental\HasParent;

class IronProduction extends Bonus
{
    use HasParent;

    /**
     * {@inheritDoc}
     * @see Bonus::BASE_DURATION
     */
    public const BASE_DURATION = 604800;

    /**
     * {@inheritDoc}
     * @see Bonus::getBonusAttribute()
     */
    public function getBonusAttribute(): float
    {
        return 0.25;
    }
}
