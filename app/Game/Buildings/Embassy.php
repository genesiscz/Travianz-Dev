<?php


namespace App\Game\Buildings;


use App\Building;
use Tightenco\Parental\HasParent;

final class Embassy extends Building
{
    /**
     * {@inheritDoc}
     * @see Building::BASE_CULTURE_POINTS
     */
    protected const BASE_CULTURE_POINTS = 5;

    /**
     * {@inheritDoc}
     * @see Building::BASE_POPULATION
     */
    protected const BASE_POPULATION = 3;

    /**
     * {@inheritDoc}
     * @see Building::BASE_NEEDED_RESOURCES
     */
    protected const BASE_NEEDED_RESOURCES = [180, 130, 150, 80];

    /**
     * {@inheritDoc}
     * @see Building::BASE_NEEDED_TIME
     */
    protected const BASE_NEEDED_TIME = [3875, 1.16, 1875];

    use HasParent;
}
