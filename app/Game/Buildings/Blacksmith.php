<?php


namespace App\Game\Buildings;


use App\Building;
use Tightenco\Parental\HasParent;

final class Blacksmith extends Building
{
    /**
     * The building culture points at the first level.
     *
     * @var int
     */
    protected const BASE_CULTURE_POINTS = 2;

    /**
     * {@inheritDoc}
     * @see Building::BASE_POPULATION
     */
    protected const BASE_POPULATION = 4;

    /**
     * {@inheritDoc}
     * @see Building::BASE_NEEDED_RESOURCES
     */
    protected const BASE_NEEDED_RESOURCES = [130, 210, 410, 130];

    /**
     * {@inheritDoc}
     * @see Building::BASE_NEEDED_TIME
     */
    protected const BASE_NEEDED_TIME = [3875, 1.16, 1875];

    use HasParent;
}
