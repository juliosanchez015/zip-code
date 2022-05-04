<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZipCode extends Model
{
    use HasFactory;

    /**
     * Get the phone associated with the user.
     */
    public function federal_entity()
    {
        return $this->belongsTo(FederalEntity::class);
    }

    /**
     * Get the phone associated with the user.
     */
    public function municipality()
    {
        return $this->belongsTo(Municipality::class);
    }

    /**
     * Get the phone associated with the user.
     */
    public function settlements()
    {
        return $this->hasMany(Settlement::class);
    }
}
