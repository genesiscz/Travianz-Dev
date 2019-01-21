<?php

namespace Travianz\Data\Buildings;

use Travianz\Entity\Building;

final class Blacksmith extends Building
{
    public function __construct(
        int $id,
        int $position,
        int $level,
        string $name,
        string $desc,
        array $baseResourcesRequired,
        int $baseCulturePoints,
        array $baseTime,
        float $baseCostGrowth,
        int $baseUpkeep,
        array $bonus,
        int $maxLevel,
        array $buildingRequirements
    ) {
        parent::__construct(
            $id,
            $position,
            $level,
            $name,
            $desc,
            $baseResourcesRequired,
            $baseCulturePoints,
            $baseTime,
            $baseCostGrowth,
            $baseUpkeep,
            $bonus,
            $maxLevel,
            $buildingRequirements
        );
    }
    
    /**
     * {@inheritDoc}
     * @see \Travianz\Entity\Building::getBonus()
     */
    public function getBonus()
    {
        return 0.964 ** ($this->level - 1);
    }
}