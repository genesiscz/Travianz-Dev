<?php

namespace App\Models;

use App\Game\Users\Admin;
use App\Game\Users\Multihunter;
use App\Notifications\ResetPasswordNotification;
use App\Notifications\VerifyEmailNotification;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tightenco\Parental\HasChildren;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, HasChildren;

    /**
     * The table associated with the model
     *
     * @var string
     */
    protected $table = 'user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'tribe', 'map_sector', 'access_level'];

    /**
     * The users list.
     *
     * @var array
     */
    protected $childTypes = [
        User::class,
        Multihunter::class,
        Admin::class
    ];

    /**
     * The tribes name.
     *
     * @var array
     */
    public const TRIBES_NAME = [
        1 => 'romans',
        'teutons',
        'gauls',
        'nature',
        'natars'
    ];

    /**
     * Add the User ranking.
     */
    public function addRanking(): void
    {
        $this->ranking()->create(['user_id' => $this->id]);
    }

    /**
     * The ranking relation.
     *
     * @return HasOne
     */
    public function ranking(): HasOne
    {
        return $this->hasOne(UserRanking::class);
    }

    /**
     * The vacation relation.
     *
     * @return HasOne
     */
    public function vacation(): HasOne
    {
        return $this->hasOne(Vacation::class);
    }

    /**
     * The village selected relation.
     *
     * @return HasOne
     */
    public function selectedVillage(): HasOne
    {
        return $this->hasOne(VillageSelected::class);
    }

    /**
     * The Profile relation.
     *
     * @return HasOne
     */
    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class);
    }

    /**
     * The Profile relation.
     *
     * @return HasOne
     */
    public function preference(): HasOne
    {
        return $this->hasOne(Preference::class);
    }

    /**
     * The referral relation.
     *
     * @return HasMany
     */
    public function referrals(): HasMany
    {
        return $this->hasMany(UserReferral::class);
    }

    /**
     * The villages relation.
     *
     * @return HasMany
     */
    public function villages(): HasMany
    {
        return $this->hasMany(Village::class);
    }

    /**
     * The bonuses relation.
     *
     * @return HasMany
     */
    public function bonuses(): HasMany
    {
        return $this->hasMany(Bonus::class);
    }

    /**
     * The reports relation.
     *
     * @return HasMany
     */
    public function fromReports()
    {
        return $this->hasMany(Report::class, 'from_user_id');
    }

    /**
     * The reports relation.
     *
     * @return HasMany
     */
    public function toReports()
    {
        return $this->hasMany(Report::class, 'to_user_id');
    }

    /**
     * Get all User's reports.
     *
     * @return Collection
     */
    public function allReports(): Collection
    {
        return $this->fromReports->merge($this->toReports);
    }

    /**
     * Check if the User has at least one message to read.
     *
     * @return bool
     */
    public function hasReadAllReports(): bool
    {
        if (isset($this->attributes['has_read_all_reports'])) return $this->attributes['has_read_all_reports'];

        return $this->attributes['has_read_all_reports'] =
            $this->toReports()
                ->where('report.seen', 0)
                ->exists() ||
            $this->fromReports()
                ->where('report.seen', 0)
                ->exists();
    }

    /**
     * The messages relation.
     *
     * @return HasMany
     */
    public function receivedMessages(): HasMany
    {
        return $this->hasMany(Message::class, 'recipient_user_id');
    }

    /**
     * The messages relation.
     *
     * @return HasMany
     */
    public function sentMessages(): HasMany
    {
        return $this->hasMany(Message::class, 'sender_user_id');
    }

    /**
     * Get all User's messages.
     *
     * @return Collection
     */
    public function allMessages(): Collection
    {
        return $this->receivedMessages->merge($this->sentMessages);
    }

    /**
     * Check if the User has at least one message to read.
     *
     * @return bool
     */
    public function hasReadAllMessages(): bool
    {
        if (isset($this->attributes['has_read_all_messages'])) return $this->attributes['has_read_all_messages'];

        return $this->attributes['has_read_all_messages'] =
            $this->receivedMessages()
                ->where('message.read', 0)
                ->exists();
    }

    /**
     * Check if a bonus is active.
     *
     * @param string $bonusType
     * @return bool
     */
    public function isBonusActive(string $bonusType): bool
    {
        if ($this->bonuses->isEmpty()) return false;

        foreach ($this->bonuses as $bonus) {
            if ($bonus instanceof $bonusType) {
                return $bonus->isActive();
            }
        }

        return false;
    }

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification(): void
    {
        $this->notify(new VerifyEmailNotification($this));
    }

    /**
     * Send the password reset notification.
     *
     * @param string $token
     * @return void
     */
    public function sendPasswordResetNotification($token): void
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    /**
     * Overrides the method to ignore the remember token.
     *
     * @author <https://laravel.io/forum/05-21-2014-how-to-disable-remember-token>
     *
     * @param $key
     * @param $value
     */
    public function setAttribute($key, $value): void
    {
        $isRememberTokenAttribute = $key == $this->getRememberTokenName();
        if (!$isRememberTokenAttribute) {
            parent::setAttribute($key, $value);
        }
    }
}
