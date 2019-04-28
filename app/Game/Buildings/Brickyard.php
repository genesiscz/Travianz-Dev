<?php


namespace App\Game\Buildings;


use App\Game\Resources\Clay;
use App\Models\Building;
use Tightenco\Parental\HasParent;

final class Brickyard extends Building
{
    use HasParent;

    /**
     * {@inheritDoc}
     * @see Building::BUILDINGS_REQUIREMENTS
     */
    public const BUILDINGS_REQUIREMENTS = [ClayPit::class => 10, MainBuilding::class => 5];

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
    protected const BASE_NEEDED_RESOURCES = [440, 480, 320, 50];

    /**
     * {@inheritDoc}
     * @see Building::BASE_NEEDED_TIME
     */
    protected const BASE_NEEDED_TIME = [5240, 1.5, 2400];

    /**
     * Indicates the boosted resource.
     *
     * @var string
     */
    public const BOOSTED_RESOURCE = Clay::class;

    /**
     * {@inheritDoc}
     * @see Building::getBonusAttribute()
     */
    public function getBonusAttribute(): float
    {
        return array_combine(range(0, self::MAX_LEVEL), range(0,  self::MAX_LEVEL * 0.05, 0.05))[$this->level] ?? 0;
    }
}
