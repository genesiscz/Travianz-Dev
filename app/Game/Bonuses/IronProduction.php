<?php


namespace App\Game\Bonuses;

use App\Game\Resources\Iron;
use App\Models\Bonus;
use Tightenco\Parental\HasParent;

final class IronProduction extends Bonus
{
    use HasParent;

    /**
     * Indicates the boosted resource.
     *
     * @var string
     */
    public const BOOSTED_RESOURCE = Iron::class;

    /**
     * {@inheritDoc}
     * @see Bonus::getBonusAttribute()
     */
    public function getBonusAttribute(): float
    {
        return 0.25;
    }
}
