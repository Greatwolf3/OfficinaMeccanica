<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Vehicle extends Model
{
    /**
     * Campi assegnabili massivamente.
     */
    protected $fillable = [
        'client_id',
        'brand',
        'model',
        'year',
        'license_plate',
    ];

    /**
     * Relazione:
     * Un veicolo appartiene a un cliente.
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * Relazione:
     * Un veicolo può avere molti servizi.
     */
    public function services(): HasMany
    {
        return $this->hasMany(Service::class);
    }

    /**
     * Relazione:
     * Un veicolo appartiene a un cliente (alias per compatibilità).
     */
    public function owner(): BelongsTo
    {
        return $this->client();
    }
}
