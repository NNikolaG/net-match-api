<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class RequestForMatch extends Model
{
    use HasFactory, SoftDeletes;

    public const OPPONENT_ID = 'opponent_id';
    public const CHALLENGER_ID = 'challenger_id';
    public const STATUS = 'status';

    protected $fillable = [
        self::OPPONENT_ID,
        self::CHALLENGER_ID,
        self::STATUS,
    ];

    public function challenger(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function opponent(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
