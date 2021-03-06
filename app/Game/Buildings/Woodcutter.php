<?php


namespace App\Game\Buildings;


use App\Game\Resources\Lumber;
use App\Models\Building;
use Tightenco\Parental\HasParent;

final class Woodcutter extends Building
{
    use HasParent;

    /**
     * {@inheritDoc}
     * @see Building::MAX_LEVEL
     */
    protected const MAX_LEVEL = INF;

    /**
     * The building maximum level, if not in the capital village.
     * @var int
     */
    protected const MAX_NOT_CAPITAL_LEVEL = 10;

    /**
     * {@inheritDoc}
     * @see Building::COST_GROWTH
     */
    protected const COST_GROWTH = 1.67;

    /**
     * {@inheritDoc}
     * @see Building::BASE_NEEDED_RESOURCES
     */
    protected const BASE_NEEDED_RESOURCES = [40, 100, 50, 60];

    /**
     * {@inheritDoc}
     * @see Building::BASE_NEEDED_TIME
     */
    protected const BASE_NEEDED_TIME = [1780 / 3, 1.6, 1000 / 3];

    /**
     * Indicates the resource produced by this field.
     *
     * @var string
     */
    public const PRODUCED_RESOURCE = Lumber::class;

    /**
     * {@inheritDoc}
     * @see Building::getBonusAttribute()
     */
    public function getBonusAttribute(): int
    {
        return ([2, 5, 9, 15, 22, 33, 50, 70, 100, 145, 200, 280, 375, 495, 635, 800, 1000, 1300, 1600, 2000, 2450])[$this->level] ?? 0;
    }

    /**
     * {@inheritDoc}
     * @see Building::isAtMaximumLevel()
     */
    public function isAtMaximumLevel(bool $isCapital = false): bool
    {
        if ($isCapital) return parent::isAtMaximumLevel();

        return $this->level == self::MAX_NOT_CAPITAL_LEVEL;
    }
}
