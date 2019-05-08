<?php


namespace App\Game\Bonuses;

use App\Game\Resources\Lumber;
use App\Models\Bonus;
use Tightenco\Parental\HasParent;

final class LumberProduction extends Bonus
{
    use HasParent;

    /**
     * Indicates the boosted resource.
     *
     * @var string
     */
    public const BOOSTED_RESOURCE = Lumber::class;

    /**
     * {@inheritDoc}
     * @see Bonus::getBonusAttribute()
     */
    public function getBonusAttribute(): float
    {
        return 0.25;
    }
}
