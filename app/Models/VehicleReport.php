<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

class VehicleReport extends Model
{
    protected $fillable = [
        'user_id',
        'vin',
        'brand',
        'model',
        'year',
        'report_type',
        'report_result'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
