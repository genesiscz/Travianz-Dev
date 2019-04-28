<?php


namespace App\Game\Bonuses;

use App\Game\Resources\Crop;
use App\Models\Bonus;
use Tightenco\Parental\HasParent;

class CropProduction extends Bonus
{
    use HasParent;

    /**
     * Indicates the boosted resource.
     *
     * @var string
     */
    public const BOOSTED_RESOURCE = Crop::class;

    /**
     * {@inheritDoc}
     * @see Bonus::getBonusAttribute()
     */
    public function getBonusAttribute(): float
    {
        return 0.25;
    }
}
