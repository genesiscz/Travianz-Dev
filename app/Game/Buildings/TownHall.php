<?php


namespace App\Game\Buildings;


use App\Building;
use Tightenco\Parental\HasParent;

final class TownHall extends Building
{
    /**
     * {@inheritDoc}
     * @see Building::BASE_CULTURE_POINTS
     */
    protected const BASE_CULTURE_POINTS = 6;

    /**
     * {@inheritDoc}
     * @see Building::BASE_POPULATION
     */
    protected const BASE_POPULATION = 4;

    /**
     * {@inheritDoc}
     * @see Building::BASE_NEEDED_RESOURCES
     */
    protected const BASE_NEEDED_RESOURCES = [1250, 1110, 1260, 600];

    /**
     * {@inheritDoc}
     * @see Building::BASE_NEEDED_TIME
     */
    protected const BASE_NEEDED_TIME = [14375, 1.16, 1875];

    use HasParent;
}
