<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barangay extends Model
{
    protected $primaryKey = 'brgy_id';

    protected $fillable = [
        'brgy_name',
        'brgy_municipality',
        'brgy_purok_count',
    ];

    public function municipality()
    {
        return $this->belongsTo(
            Municipality::class,
            'brgy_municipality',
            'municipality_id'
        );
    }

    public function children()
    {
        return $this->hasMany(
            ChildRecord::class,
            'barangay_id',
            'brgy_id'
        );
    }
}