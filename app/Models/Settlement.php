<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settlement extends Model
{
    use HasFactory;

    /**
     * Get the phone associated with the user.
     */
    public function settlement_type()
    {
        return $this->belongsTo(SettlementType::class);
    }
}
