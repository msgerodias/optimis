<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OptCase extends Model
{
    protected $primaryKey = 'opt_id';

    protected $fillable = [
        'child_id',
        'height',
        'weight',
        'date_measured',
        'age_in_months',
        'weight_for_age_status',
        'height_for_age_status',
        'weight_for_ltht_status',
    ];

    protected $casts = [
        'date_measured' => 'date',
    ];

    public function child()
    {
        return $this->belongsTo(
            ChildRecord::class,
            'child_id',
            'child_id'
        );
    }
}