<?php

namespace App\Models;

use App\Game\Buildings\Bakery;
use App\Game\Buildings\Brickyard;
use App\Game\Buildings\ClayPit;
use App\Game\Buildings\Cropland;
use App\Game\Buildings\GrainMill;
use App\Game\Buildings\IronFoundry;
use App\Game\Buildings\IronMine;
use App\Game\Buildings\Sawmill;
use App\Game\Buildings\Woodcutter;
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
    protected $fillable = ['user_id', 'name', 'capital', 'population'];

    /**
     * The resources number.
     *
     * @var int
     */
    public const RESOURCES_NUMBER = 4;

    /**
     * Indicates the resource fields.
     *
     * @var array
     */
    public const RESOURCE_FIELDS = [
        Woodcutter::class,
        ClayPit::class,
        IronMine::class,
        Cropland::class
    ];

    /**
     * Indicates buildings that provide a resource bonus.
     *
     * @var array
     */
    public const BONUS_RESOURCES_BUILDINGS = [
        [Sawmill::class],
        [Brickyard::class],
        [IronFoundry::class],
        3 => [
            GrainMill::class,
            Bakery::class
        ]
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
     * The building queue relation.
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
    public function buildingsQueue(): Collection
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

        $totalProduction = clone $this->production;

        foreach ($this->buildings->where('location', '>=', 19) as $building) {
            foreach (self::BONUS_RESOURCES_BUILDINGS as $id => $bonusResourcesBuildings) {
                foreach ($bonusResourcesBuildings as $bonusResourcesBuilding) {
                    if ($building instanceof $bonusResourcesBuilding) {
                        $totalProduction[$id] += floor( $this->production[$id] * $building->bonus );
                        break 2;
                    }
                }
            }
        }

        return $this->attributes['totalProduction'] = $totalProduction;
    }

    /**
     * Get the village production without bonuses.
     *
     * @return Collection
     */
    public function getProductionAttribute(): Collection
    {
        if (isset($this->attributes['production'])) return $this->attributes['production'];

        $production = new Collection(array_fill(0, self::RESOURCES_NUMBER, 0));

        foreach ($this->buildings->where('location', '<=', 18) as $building) {
            foreach (self::RESOURCE_FIELDS as $id => $resourceField) {
                if ($building instanceof $resourceField) {
                    $production[$id] += $building->bonus;
                    break;
                }
            }
        }

        return $this->attributes['production'] = $production;
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

        foreach ($this->world->units as $unit)
        {
            $upkeep += $unit::UPKEEP * $unit->amount;
        }

        return $upkeep;
    }
}
