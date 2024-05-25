<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Court extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surface',
        'indoor',
        'length',
        'width',
        'lightning',
        'capacity',
        'location',
        'club_id',
        'balls_provided'
    ];

    public function club(): BelongsTo
    {
        return $this->belongsTo(Club::class);
    }
}
