<?php


namespace App\Game\Buildings;


use App\Building;
use Tightenco\Parental\HasParent;

final class WorldWonder extends Building
{
    /**
     * {@inheritDoc}
     * @see Building::BASE_CULTURE_POINTS
     */
    protected const BASE_CULTURE_POINTS = 0;

    /**
     * {@inheritDoc}
     * @see Building::BASE_POPULATION
     */
    protected const BASE_POPULATION = 1;

    /**
     * {@inheritDoc}
     * @see Building::MAX_LEVEL
     */
    protected const MAX_LEVEL = 100;

    /**
     * {@inheritDoc}
     * @see Building::BASE_NEEDED_RESOURCES
     */
    protected const BASE_NEEDED_RESOURCES = [66700, 69050, 72200, 13200];

    /**
     * {@inheritDoc}
     * @see Building::BASE_NEEDED_TIME
     */
    protected const BASE_NEEDED_TIME = [19875, 1.16, 1875];

    use HasParent;
}
