<?php

namespace App\Models;

use App\Game\Buildings\Academy;
use App\Game\Buildings\Armoury;
use App\Game\Buildings\Bakery;
use App\Game\Buildings\Barracks;
use App\Game\Buildings\Blacksmith;
use App\Game\Buildings\Brewery;
use App\Game\Buildings\Brickyard;
use App\Game\Buildings\CityWall;
use App\Game\Buildings\ClayPit;
use App\Game\Buildings\Cranny;
use App\Game\Buildings\Cropland;
use App\Game\Buildings\EarthWall;
use App\Game\Buildings\Embassy;
use App\Game\Buildings\GrainMill;
use App\Game\Buildings\Granary;
use App\Game\Buildings\GreatBarracks;
use App\Game\Buildings\GreatGranary;
use App\Game\Buildings\GreatStable;
use App\Game\Buildings\GreatWarehouse;
use App\Game\Buildings\HeroMansion;
use App\Game\Buildings\HorseDrinkingTrough;
use App\Game\Buildings\IronFoundry;
use App\Game\Buildings\IronMine;
use App\Game\Buildings\MainBuilding;
use App\Game\Buildings\Marketplace;
use App\Game\Buildings\Palace;
use App\Game\Buildings\Palisade;
use App\Game\Buildings\RallyPoint;
use App\Game\Buildings\Residence;
use App\Game\Buildings\Sawmill;
use App\Game\Buildings\Stable;
use App\Game\Buildings\StonemasonLodge;
use App\Game\Buildings\TournamentSquare;
use App\Game\Buildings\TownHall;
use App\Game\Buildings\TradeOffice;
use App\Game\Buildings\Trapper;
use App\Game\Buildings\Treasury;
use App\Game\Buildings\Warehouse;
use App\Game\Buildings\Woodcutter;
use App\Game\Buildings\Workshop;
use App\Game\Buildings\WorldWonder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Tightenco\Parental\HasChildren;

class Building extends Model
{
    use HasChildren;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'building';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['village_id', 'location', 'type', 'level'];
    /**
     * The buildings list.
     *
     * @var array
     */
    protected $childTypes = [
        1 => Woodcutter::class,
        2 => ClayPit::class,
        3 => IronMine::class,
        4 => Cropland::class,
        5 => Sawmill::class,
        6 => Brickyard::class,
        7 => IronFoundry::class,
        8 => GrainMill::class,
        9 => Bakery::class,
        10 => Warehouse::class,
        11 => Granary::class,
        12 => Armoury::class,
        13 => Blacksmith::class,
        14 => TournamentSquare::class,
        15 => MainBuilding::class,
        16 => RallyPoint::class,
        17 => Marketplace::class,
        18 => Embassy::class,
        19 => Barracks::class,
        20 => Stable::class,
        21 => Workshop::class,
        22 => Academy::class,
        23 => Cranny::class,
        24 => TownHall::class,
        25 => Residence::class,
        26 => Palace::class,
        27 => Treasury::class,
        28 => TradeOffice::class,
        29 => GreatBarracks::class,
        30 => GreatStable::class,
        31 => CityWall::class,
        32 => EarthWall::class,
        33 => Palisade::class,
        34 => StonemasonLodge::class,
        35 => Brewery::class,
        36 => Trapper::class,
        37 => HeroMansion::class,
        38 => GreatWarehouse::class,
        39 => GreatGranary::class,
        40 => WorldWonder::class,
        41 => HorseDrinkingTrough::class
    ];

    /**
     * Disables updated_at column.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The building requirements to be built.
     *
     * @var array
     */
    public const BUILDINGS_REQUIREMENTS = [];

    /**
     * The building culture points at the first level.
     *
     * @var int
     */
    protected const BASE_CULTURE_POINTS = 1;

    /**
     * The building population at the first level.
     *
     * @var int
     */
    protected const BASE_POPULATION = 2;

    /**
     * The building maximum level.
     *
     * @var int
     */
    protected const MAX_LEVEL = 20;

    /**
     * The building cost growth.
     *
     * @var float
     */
    protected const COST_GROWTH = 1.28;

    /**
     * The building resources needed to construct it at the first level.
     *
     * @var array
     */
    protected const BASE_NEEDED_RESOURCES = [0, 0, 0, 0];

    /**
     * The building time needed to construct it at the first level.
     *
     * @var array
     */
    protected const BASE_NEEDED_TIME = [0, 0, 0];

    /**
     * The queues relation.
     *
     * @return HasMany
     */
    public function queues(): HasMany
    {
        return $this->hasMany(BuildingQueue::class, 'building_id', 'id');
    }

    /**
     * The village relation.
     *
     * @return BelongsTo
     */
    public function village(): BelongsTo
    {
        return $this->belongsTo(Village::class, 'village_id', 'world_id');
    }

    /**
     * Get the total population of the building.
     *
     * @return int
     */
    public function getTotalPopulationAttribute(): int
    {
        $totalPopulation = 0;

        for ($i = 1; $i <= $this->level; $i++) {
            $totalPopulation += $this->getPopulationByLevel($i);
        }

        return $totalPopulation;
    }

    /**
     * Get the actual building population.
     *
     * @return int
     */
    public function getActualPopulationAttribute(): int
    {
        return $this->getPopulationByLevel($this->level);
    }

    /**
     * Get the building culture points.
     *
     * @return int
     */
    public function getCulturePointsAttribute(): int
    {
        return static::BASE_CULTURE_POINTS * 1.2 ** $this->level;
    }

    /**
     * Get the time to construct the building at its level.
     *
     * @return int
     */
    public function getNeededTimeAttribute(): int
    {
        return round_with_precision(static::BASE_NEEDED_TIME[0] * (static::BASE_NEEDED_TIME[1] ** ($this->level - 1)) - static::BASE_NEEDED_TIME[2], 10);
    }

    /**
     * Get the needed resources to construct the building at its level.
     *
     * @return Collection
     */
    public function getNeededResourcesAttribute(): Collection
    {
        return new Collection([
            $this->getNeededResource(static::BASE_NEEDED_RESOURCES[0]),
            $this->getNeededResource(static::BASE_NEEDED_RESOURCES[1]),
            $this->getNeededResource(static::BASE_NEEDED_RESOURCES[2]),
            $this->getNeededResource(static::BASE_NEEDED_RESOURCES[3])
        ]);
    }

    /**
     * Get the building actual bonus.
     *
     * @return mixed
     */
    public function getBonusAttribute()
    {
        return round(0.964 ** ($this->level - 1) * 100);
    }

    /**
     * Check if the building is at the maximum level
     *
     * @return bool
     */
    public function isAtMaximumLevel(): bool
    {
        return static::MAX_LEVEL == $this->level;
    }

    /**
     * Get a resource needed to construct the building.
     *
     * @param int $resource
     * @return int
     */
    private function getNeededResource(int $resource): int
    {
        return min(1000000, round_with_precision($resource * static::COST_GROWTH ** ($this->level - 1), 5));
    }

    /**
     * Get the actual population of the building.
     *
     * @param int $level
     * @return int
     */
    private function getPopulationByLevel(int $level): int
    {
        return $level == 1 ? static::BASE_POPULATION : round((5 * static::BASE_POPULATION + $level - 1) / 10);
    }
}
