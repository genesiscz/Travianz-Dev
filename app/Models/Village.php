<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Village extends Model
{
    /**
     * The table associated with the model
     *
     * @var string
     */
    protected $table = 'village';

    /**
     * Indicates the model primary key.
     *
     * @var bool
     */
    protected $primaryKey = 'world_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['world_id','user_id', 'name', 'capital', 'population'];

    public const  VILLAGE_CREATE_FIELD_TYPES =[
        1 => [1 => 4,4,1,4,4,2,3,4,4,3,3,4,4,1,4,2,1,2,1,26 => 15],
        [1 => 3,4,1,3,2,2,3,4,4,3,3,4,4,1,4,2,1,2,1,26 => 15],
        [1 => 1,4,1,3,2,2,3,4,4,3,3,4,4,1,4,2,1,2,1,26 => 15],
        [1 => 1,4,1,2,2,2,3,4,4,3,3,4,4,1,4,2,1,2,1,26 => 15],
        [1 => 1,4,1,3,1,2,3,4,4,3,3,4,4,1,4,2,1,2,1,26 => 15],
        [1 => 3,4,1,3,2,2,3,4,4,3,3,4,4,1,4,2,1,2,1,26 => 15],
        [1 => 4,4,1,3,4,4,4,4,4,4,4,4,4,4,4,2,4,4,1,26 => 15],
        [1 => 1,4,4,1,2,2,3,4,4,3,3,4,4,1,4,2,1,2,1,26 => 15],
        [1 => 3,4,4,1,2,2,3,4,4,3,3,4,4,1,4,2,1,2,1,26 => 15],
        [1 => 3,4,4,1,1,2,3,4,4,3,3,4,4,1,4,2,1,2,1,26 => 15],
        [1 => 3,4,1,2,2,2,3,4,4,3,3,4,4,1,4,2,1,2,1,26 => 15],
        [1 => 3,1,1,3,1,4,4,3,3,2,2,3,1,4,4,2,4,4,1,26 => 15],
        [1 => 1,4,1,1,2,2,3,4,4,3,3,4,4,1,4,2,1,2,1,26 => 15],
    ];

    public const RESOURCES_FIELD_COORDINATES = [
        1 => '101,33,28',
        '165,32,28',
        '224,46,28',
        '46,63,28',
        '138,74,28',
        '203,94,28',
        '262,86,28',
        '31,117,28',
        '83,110,28',
        '214,142,28',
        '269,146,28',
        '42,171,28',
        '93,164,28',
        '160,184,28',
        '239,199,28',
        '87,217,28',
        '140,231,28',
        '190,232,28'
    ];

    public const  BUILDING_FIELD_COORDINATES = [
        19 => "53,91,91,71,127,91,91,112",
        "136,66,174,46,210,66,174,87",
        "196,56,234,36,270,56,234,77",
        "270,69,308,49,344,69,308,90",
        "327,117,365,97,401,117,365,138",
        "14,129,52,109,88,129,52,150",
        "97,137,135,117,171,137,135,158",
        "182,119,182,65,257,65,257,119,220,140",
        "337,156,375,136,411,156,375,177",
        "2,199,40,179,76,199,40,220",
        "129,164,167,144,203,164,167,185",
        "92,189,130,169,166,189,130,210",
        "342,216,380,196,416,216,380,237",
        "22,238,60,218,96,238,60,259",
        "167,232,205,212,241,232,205,253",
        "290,251,328,231,364,251,328,272",
        "95,273,133,253,169,273,133,294",
        "222,284,260,264,296,284,260,305",
        "80,306,118,286,154,306,118,327",
        "199,316,237,296,273,316,237,337",
        "270,158,303,135,316,155,318,178,304,211,288,227,263,238,250,215"];

    /**
     * Disables updated_at column.
     *
     * @var bool
     */
    public const UPDATED_AT = null;

    /**
     * Indicates if the model primary key does increment.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The buildings relation.
     *
     * @return HasMany
     */
    public function buildings(): HasMany
    {
        return $this->hasMany(Building::class, 'village_id', 'world_id');
    }

    /**
     * The world relation.
     *
     * @return BelongsTo
     */
    public function world(): BelongsTo
    {
        return $this->belongsTo(World::class);
    }

    /**
     * The owner relation.
     *
     * @return BelongsTo
     */
    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * The village buildings queue.
     *
     * @return Collection
     */
    public function getBuildingsQueue(): Collection
    {
        if (isset($this->attributes['buildings_queue'])) return $this->attributes['buildings_queue'];

        return $this->attributes['buildings_queue'] = $this
            ->hasManyThrough(BuildingQueue::class, Building::class, 'village_id', 'building_id')
            ->with('building')
            ->get();
    }

    /**
     * Get the village total production with bonuses.
     *
     * @return Collection
     */
    public function getTotalProductionAttribute(): Collection
    {
        if (isset($this->attributes['totalProduction'])) return $this->attributes['totalProduction'];

        $totalProduction = clone $this->production_with_building_bonuses;

        foreach ($this->owner->bonuses as $bonus) {
            if (defined(get_class($bonus) . '::BOOSTED_RESOURCE') && $bonus->isActive()) {
                $totalProduction[$bonus::BOOSTED_RESOURCE] += round($this->production_with_building_bonuses->get($bonus::BOOSTED_RESOURCE, 0) * $bonus->bonus);
            }
        }

        return $this->attributes['totalProduction'] = $totalProduction;
    }

    public function getProductionWithBuildingBonusesAttribute(): Collection
    {
        if (isset($this->attributes['productionWithBuildingBonuses'])) return $this->attributes['productionWithBuildingBonuses'];

        $productionWithBuildingBonuses = clone $this->production;

        foreach ($this->buildings->where('location', '>=', 19) as $building) {
            if (defined(get_class($building) . '::BOOSTED_RESOURCE')) {
                $productionWithBuildingBonuses[$building::BOOSTED_RESOURCE] += round($this->production->get($building::BOOSTED_RESOURCE, 0) * $building->bonus);
            }
        }

        return $this->attributes['productionWithBuildingBonuses'] = $productionWithBuildingBonuses;
    }

    /**
     * Get the village production without bonuses.
     *
     * @return Collection
     */
    public function getProductionAttribute(): Collection
    {
        if (isset($this->attributes['production'])) return $this->attributes['production'];

        $production = new Collection();

        foreach ($this->buildings->where('location', '<=', 18) as $building) {
            if (defined(get_class($building) . '::PRODUCED_RESOURCE')) {
                $production->put($building::PRODUCED_RESOURCE, $production->get($building::PRODUCED_RESOURCE, 0) + $building->bonus);
            }
        }

        return $this->attributes['production'] = $production;
    }

    /**
     * Get the storage type.
     *
     * @param string $storageType
     * @return int
     */
    public function getStorage(string $storageType): int
    {
        if (isset($this->attributes['storages'][$storageType])) return $this->attributes['storages'][$storageType];

        $storageValue = 0;

        foreach ($this->buildings->where('location', '>=', 19) as $building) {
            if ($building instanceof $storageType) $storageValue += $building->bonus;
        }

        return $this->attributes['storages'][$storageType] = ($storageValue ?: (new $storageType)->bonus) * config('server.storage_capacity_multiplier');
    }

    /**
     * Get the village total upkeep.
     *
     * @return int
     */
    public function getTotalUpkeep(): int
    {
        return $this->getOwnUnitsUpkeep();
    }

    public function getOwnUnitsUpkeep(): int
    {
        $upkeep = 0;

        foreach ($this->world->units as $unit) {
            $upkeep += $unit::UPKEEP * $unit->amount;
        }

        return $upkeep;
    }

    /**
     * Check if the village is the capital.
     *
     * @return bool
     */
    public function isCapital(): bool
    {
        return $this->capital;
    }

    /**
     * Check if a building is in the building queue.
     *
     * @param Building $building
     * @param string $queueType
     * @return bool
     */
    public function hasBuildingInQueue(Building $building, string $queueType): bool
    {
        foreach ($this->getBuildingsQueue() as $buildingQueue) {
            if ($buildingQueue->building->id == $building->id && $buildingQueue instanceof $queueType) {
                return true;
            }
        }

        return false;
    }

    public function isBuildingQueueFull(string $queueType)
    {
        $queueCount = 0;

        foreach ($this->getBuildingsQueue()->whereInstanceOf($queueType) as $buildingQueue) {
            //if () {
                $queueCount++;
            //}
        }

        return $queueCount >= BuildingQueue::BASE_QUEUE_COUNT[$queueType];
    }
}
