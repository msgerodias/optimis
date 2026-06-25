<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    protected $primaryKey = 'municipality_id';

    protected $fillable = [
        'municipality_name',
        'municipality_postal_code',
    ];

    public function barangays()
    {
        return $this->hasMany(
            Barangay::class,
            'brgy_municipality',
            'municipality_id'
        );
    }

    public function children()
    {
        return $this->hasMany(
            ChildRecord::class,
            'municipality_id',
            'municipality_id'
        );
    }
}