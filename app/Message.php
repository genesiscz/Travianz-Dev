<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model
{
    /**
     * The table associated with the model
     *
     * @var string
     */
    protected $table = 'message';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Disables updated_at column.
     *
     * @var bool
     */
    public const UPDATED_AT = null;


    /**
     * The sender User relation.
     *
     * @return BelongsTo
     */
    public function senderUser(): BelongsTo
    {
        return $this->BelongsTo(User::class, 'sender_user_id', 'id');
    }

    /**
     * The recipient User relation.
     *
     * @return BelongsTo
     */
    public function recipientUser(): BelongsTo
    {
        return $this->BelongsTo(User::class, 'recipient_user_id', 'id');
    }
}
