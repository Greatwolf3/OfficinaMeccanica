<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Service extends Model
{
    /**
     * Campi assegnabili massivamente.
     */
    protected $fillable = [
        'vehicle_id',
        'description',
        'cost',
        'date',
    ];

    /**
     * Relazione:
     * Un servizio appartiene a un veicolo.
     */
    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class);
    }
}
