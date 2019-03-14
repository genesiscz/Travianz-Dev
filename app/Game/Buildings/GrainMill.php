<?php


namespace App\Game\Buildings;


use App\Building;
use Tightenco\Parental\HasParent;

final class GrainMill extends Building
{
    /**
     * {@inheritDoc}
     * @see Building::BASE_POPULATION
     */
    protected const BASE_POPULATION = 3;

    /**
     * {@inheritDoc}
     * @see Building::MAX_LEVEL
     */
    protected const MAX_LEVEL = 5;

    /**
     * {@inheritDoc}
     * @see Building::COST_GROWTH
     */
    protected const COST_GROWTH = 1.80;

    /**
     * {@inheritDoc}
     * @see Building::BASE_NEEDED_RESOURCES
     */
    protected const BASE_NEEDED_RESOURCES = [500, 440, 380, 1240];

    /**
     * {@inheritDoc}
     * @see Building::BASE_NEEDED_TIME
     */
    protected const BASE_NEEDED_TIME = [4240, 1.5, 2400];

    /**
     * {@inheritDoc}
     * @see Building::BUILDINGS_REQUIREMENTS
     */
    protected const BUILDINGS_REQUIREMENTS = [Cropland::class => 5, MainBuilding::class => 5];

    use HasParent;
}
