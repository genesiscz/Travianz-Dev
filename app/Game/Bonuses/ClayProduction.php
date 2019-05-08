<?php


namespace App\Game\Bonuses;

use App\Game\Resources\Clay;
use App\Models\Bonus;
use Tightenco\Parental\HasParent;

final class ClayProduction extends Bonus
{
    use HasParent;

    /**
     * Indicates the boosted resource.
     *
     * @var string
     */
    public const BOOSTED_RESOURCE = Clay::class;

    /**
     * {@inheritDoc}
     * @see Bonus::getBonusAttribute()
     */
    public function getBonusAttribute(): float
    {
        return 0.25;
    }
}
