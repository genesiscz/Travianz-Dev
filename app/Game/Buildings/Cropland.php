<?php


namespace App\Game\Buildings;


use App\Models\Building;
use Tightenco\Parental\HasParent;

final class Cropland extends Building
{
    use HasParent;

    /**
     * {@inheritDoc}
     * @see Building::BASE_POPULATION
     */
    protected const BASE_POPULATION = 0;

    /**
     * {@inheritDoc}
     * @see Building::MAX_LEVEL
     */
    protected const MAX_LEVEL = INF;

    /**
     * {@inheritDoc}
     * @see Building::COST_GROWTH
     */
    protected const COST_GROWTH = 1.67;

    /**
     * {@inheritDoc}
     * @see Building::BASE_NEEDED_RESOURCES
     */
    protected const BASE_NEEDED_RESOURCES = [70, 90, 70, 20];

    /**
     * {@inheritDoc}
     * @see Building::BASE_NEEDED_TIME
     */
    protected const BASE_NEEDED_TIME = [1450 / 3, 1.6, 1000 / 3];

    /**
     * {@inheritDoc}
     * @see Building::getBonusAttribute()
     */
    public function getBonusAttribute(): int
    {
        return ([2, 5, 9, 15, 22, 33, 50, 70, 100, 145, 200, 280, 375, 495, 635, 800, 1000, 1300, 1600, 2000, 2450])[$this->level] ?? 0;
    }
}
