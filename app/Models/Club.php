<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Club extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'city',
        'description',
        'address',
        'contact_name',
        'contact_phone',
        'contact_email',
    ];

    public function courts(): HasMany
    {
        return $this->hasMany(Court::class);
    }
}
