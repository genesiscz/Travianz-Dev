<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\CompositeKey;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserReferral extends Model
{

    use CompositeKey;

    /**
     * The table associated with the model
     *
     * @var string
     */
    protected $table = 'user_referral';

    /**
     * Indicates the model primary key.
     *
     * @var bool
     */
    protected $primaryKey = ['user_id', 'referral_user_id'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

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
     * Get the user relation.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
