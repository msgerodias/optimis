<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChildRecord extends Model
{
    protected $table = 'children';

    protected $primaryKey = 'child_id';

    protected $fillable = [
        'lastname',
        'firstname',
        'middlename',
        'belongs_to_ip_group',
        'gender',
        'birthday',
        'municipality_id',
        'barangay_id',
        'purok',
    ];

    protected $casts = [
        'birthday' => 'date',
    ];

    public function municipality()
    {
        return $this->belongsTo(
            Municipality::class,
            'municipality_id',
            'municipality_id'
        );
    }

    public function barangay()
    {
        return $this->belongsTo(
            Barangay::class,
            'barangay_id',
            'brgy_id'
        );
    }

    public function parent()
    {
        return $this->hasOne(
            ParentRecord::class,
            'child_id',
            'child_id'
        );
    }

    public function optCases()
    {
        return $this->hasMany(
            OptCase::class,
            'child_id',
            'child_id'
        )->latest('date_measured');
    }

    public function getFullNameAttribute()
    {
        return trim($this->firstname . ' ' . $this->middlename . ' ' . $this->lastname);
    }
}