<?php


namespace App\Models;

use App\Game\Bonuses\GoldClub;
use App\Game\Bonuses\Plus;
use App\Game\Bonuses\ClayProduction;
use App\Game\Bonuses\CropProduction;
use App\Game\Bonuses\IronProduction;
use App\Game\Bonuses\LumberProduction;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Tightenco\Parental\HasChildren;

class Bonus extends Model
{
    use HasChildren;

    /**
     * The table associated with the model
     *
     * @var string
     */
    protected $table = 'bonus';

    /**
     * Indicates the model primary key.
     *
     * @var bool
     */
    protected $primaryKey = 'user_id';

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
        Plus::class,
        LumberProduction::class,
        ClayProduction::class,
        IronProduction::class,
        CropProduction::class,
        GoldClub::class
    ];

    /**
     * Disables updated_at column.
     *
     * @var bool
     */
    public const UPDATED_AT = null;

    /**
     * Disables updated_at column.
     *
     * @var bool
     */
    public const CREATED_AT = null;

    /**
     * The bonus base duration (in seconds).
     *
     * @var int
     */
    public const BASE_DURATION = 604800;

    /**
     * The user relation.
     *
     * @return HasOne
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    /**
     * The bonus attribute
     *
     * @return mixed
     */
    public function getBonusAttribute()
    {
        return true;
    }

    /**
     * Check if the bonus is active
     *
     * @return bool
     * @var bool
     */
    public function isActive(): bool
    {
        return $this->ended_at > Carbon::now();
    }
}
