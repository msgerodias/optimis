<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParentRecord extends Model
{
    protected $table = 'parents';

    protected $primaryKey = 'parent_id';

    protected $fillable = [
        'lastname',
        'firstname',
        'middlename',
        'contact_no',
        'email_address',
        'authorized_guardian',
        'child_id',
    ];

    public function child()
    {
        return $this->belongsTo(
            ChildRecord::class,
            'child_id',
            'child_id'
        );
    }

    public function user()
    {
        return $this->hasOne(
            User::class,
            'profile_id',
            'parent_id'
        )->where('user_type', 'parent');
    }

    public function getFullNameAttribute()
    {
        return trim($this->firstname . ' ' . $this->middlename . ' ' . $this->lastname);
    }
}