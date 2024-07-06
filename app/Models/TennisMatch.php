<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class TennisMatch extends Model
{
    use HasFactory, SoftDeletes;

// Constants
    public const COURT_ID = 'court_id';
    public const MATCH_REQUEST_ID = 'match_request_id';
    public const TYPE = 'type';
    public const STATUS = 'status';
    public const CHALLENGER_CONDITIONS_AGREED = 'challenger_conditions_agreed';
    public const OPPONENT_CONDITIONS_AGREED = 'opponent_conditions_agreed';
    public const WINNER_ID = 'winner_id';
    public const TOURNAMENT_ID = 'tournament_id';
    public const DURATION = 'duration';
    public const SCHEDULED_AT = 'scheduled_at';
    public const PLAYED_AT = 'played_at';

// Fillable array
    protected $fillable = [
        self::COURT_ID,
        self::MATCH_REQUEST_ID,
        self::TYPE,
        self::STATUS,
        self::CHALLENGER_CONDITIONS_AGREED,
        self::OPPONENT_CONDITIONS_AGREED,
        self::WINNER_ID,
        self::TOURNAMENT_ID,
        self::DURATION,
        self::SCHEDULED_AT,
        self::PLAYED_AT
    ];

    public function tournament(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function winner(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function matchRequest(): BelongsTo
    {
        return $this->belongsTo(RequestForMatch::class);
    }

    public function court(): BelongsTo
    {
        return $this->belongsTo(Court::class);
    }

}
