<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Client extends Model
{
    /**
     * Campi assegnabili massivamente.
     */
    protected $fillable = [
        'name',
        'phone',
        'email',
        'address',
    ];

    /**
     * Relazione:
     * Un cliente può avere molti veicoli.
     */
    public function vehicles(): HasMany
    {
        return $this->hasMany(Vehicle::class);
    }

    /**
     * Relazione:
     * Un cliente può avere molti servizi attraverso i veicoli.
     */
    public function services(): HasManyThrough
    {
        return $this->hasManyThrough(Service::class, Vehicle::class);
    }
}
