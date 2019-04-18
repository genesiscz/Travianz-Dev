<?php


namespace App\Game\Buildings;


use App\Models\Building;
use Tightenco\Parental\HasParent;

final class GreatBarracks extends Building
{
    use HasParent;

    /**
     * {@inheritDoc}
     * @see Building::BUILDINGS_REQUIREMENTS
     */
    public const BUILDINGS_REQUIREMENTS = [Barracks::class => 20];

    /**
     * {@inheritDoc}
     * @see Building::BASE_POPULATION
     */
    protected const BASE_POPULATION = 4;

    /**
     * {@inheritDoc}
     * @see Building::BASE_NEEDED_RESOURCES
     */
    protected const BASE_NEEDED_RESOURCES = [630, 420, 780, 360];

    /**
     * {@inheritDoc}
     * @see Building::BASE_NEEDED_TIME
     */
    protected const BASE_NEEDED_TIME = [3875, 1.16, 1875];

    /**
     * {@inheritDoc}
     * @see Building::getBonusAttribute()
     */
    public function getBonusAttribute(): float
    {
        return 0.9 ** ($this->level - 1);
    }
}
