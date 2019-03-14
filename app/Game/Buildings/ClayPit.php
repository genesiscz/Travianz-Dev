<?php


namespace App\Game\Buildings;


use App\Building;
use Tightenco\Parental\HasParent;

final class ClayPit extends Building
{
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
    protected const BASE_NEEDED_RESOURCES = [80, 40, 80, 50];

    /**
     * {@inheritDoc}
     * @see Building::BASE_NEEDED_TIME
     */
    protected const BASE_NEEDED_TIME = [1660 / 3, 1.6, 1000 / 3];

    use HasParent;
}
