<?php

namespace App\Models;

use App\Game\Units\Chieftain;
use App\Game\Units\Gauls\Druidrider;
use App\Game\Units\Gauls\Haeduan;
use App\Game\Units\Gauls\Pathfinder;
use App\Game\Units\Gauls\Phalanx;
use App\Game\Units\Gauls\Swordsman;
use App\Game\Units\Gauls\TheutatesThunder;
use App\Game\Units\Gauls\Trebuchet;
use App\Game\Units\Natars\Axerider;
use App\Game\Units\Natars\Ballista;
use App\Game\Units\Natars\BirdsOfPrey;
use App\Game\Units\Natars\Guardsman;
use App\Game\Units\Natars\NatarianEmperor;
use App\Game\Units\Natars\NatarianKnight;
use App\Game\Units\Natars\NatarianSettler;
use App\Game\Units\Natars\Pikeman;
use App\Game\Units\Natars\ThornedWarrior;
use App\Game\Units\Natars\WarElephant;
use App\Game\Units\Nature\Bat;
use App\Game\Units\Nature\Bear;
use App\Game\Units\Nature\Crocodile;
use App\Game\Units\Nature\Elephant;
use App\Game\Units\Nature\Rat;
use App\Game\Units\Nature\Snake;
use App\Game\Units\Nature\Spider;
use App\Game\Units\Nature\Tiger;
use App\Game\Units\Nature\WildBoar;
use App\Game\Units\Nature\Wolf;
use App\Game\Units\Romans\BatteringRam;
use App\Game\Units\Romans\EquitesCaesaris;
use App\Game\Units\Romans\EquitesImperatoris;
use App\Game\Units\Romans\EquitesLegati;
use App\Game\Units\Romans\FireCatapult;
use App\Game\Units\Romans\Imperian;
use App\Game\Units\Romans\Legionnaire;
use App\Game\Units\Romans\Praetorian;
use App\Game\Units\Romans\Senator;
use App\Game\Units\Teutons\Axeman;
use App\Game\Units\Teutons\Catapult;
use App\Game\Units\Teutons\Chief;
use App\Game\Units\Teutons\Clubswinger;
use App\Game\Units\Teutons\Paladin;
use App\Game\Units\Teutons\Scout;
use App\Game\Units\Teutons\Spearman;
use App\Game\Units\Teutons\TeutonicKnight;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Tightenco\Parental\HasChildren;

class WorldUnitList extends Model
{
    use HasChildren;

	/**
	 * The table associated with the model
	 *
	 * @var string
	 */
	protected $table = 'world_unit_list';
	
	/**
	 * Indicates the model primary key.
	 *
	 * @var bool
	 */
	protected $primaryKey = 'world_id';
	
	/**
	 * The attributes that aren't mass assignable.
	 *
	 * @var array
	 */
	protected $guarded = [];

    /**
     * The buildings list.
     *
     * @var array
     */
    protected $childTypes = [
        1 => Legionnaire::class,
        2 => Praetorian::class,
        3 => Imperian::class,
        4 => EquitesLegati::class,
        5 => EquitesImperatoris::class,
        6 => EquitesCaesaris::class,
        7 => BatteringRam::class,
        8 => FireCatapult::class,
        9 => Senator::class,
        10 => Game\Units\Romans\Settler::class,
        11 => Clubswinger::class,
        12 => Spearman::class,
        13 => Axeman::class,
        14 => Scout::class,
        15 => Paladin::class,
        16 => TeutonicKnight::class,
        17 => Game\Units\Teutons\Ram::class,
        18 => Catapult::class,
        19 => Chief::class,
        20 => Game\Units\Teutons\Settler::class,
        21 => Phalanx::class,
        22 => Swordsman::class,
        23 => Pathfinder::class,
        24 => TheutatesThunder::class,
        25 => Druidrider::class,
        26 => Haeduan::class,
        27 => Game\Units\Gauls\Ram::class,
        28 => Trebuchet::class,
        29 => Chieftain::class,
        30 => Game\Units\Gauls\Settler::class,
        31 => Rat::class,
        32 => Spider::class,
        33 => Snake::class,
        34 => Bat::class,
        35 => WildBoar::class,
        36 => Wolf::class,
        37 => Bear::class,
        38 => Crocodile::class,
        39 => Tiger::class,
        40 => Elephant::class,
        41 => Pikeman::class,
        42 => ThornedWarrior::class,
        43 => Guardsman::class,
        44 => BirdsOfPrey::class,
        45 => Axerider::class,
        46 => NatarianKnight::class,
        47 => WarElephant::class,
        48 => Ballista::class,
        49 => NatarianEmperor::class,
        50 => NatarianSettler::class
    ];

	/**
	 * Indicates if the model should be timestamped.
	 *
	 * @var bool
	 */
	public $timestamps = false;
	
	/**
	 * Indicates if the model primary key does increment.
	 *
	 * @var bool
	 */
	public $incrementing = false;
	
	/**
	 * The world relation
	 *
	 * @return BelongsTo
	 */
	public function world(): BelongsTo
	{
		return $this->belongsTo(World::class);
	}
}
