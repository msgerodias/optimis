<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bhw extends Model
{
    protected $primaryKey = 'bhw_id';

    protected $fillable = [
        'lastname',
        'firstname',
        'middlename',
        'contact_no',
        'email_address',
        'address',
        'gender',
    ];

    public function getFullNameAttribute()
    {
        return trim($this->firstname . ' ' . $this->middlename . ' ' . $this->lastname);
    }

    public function user()
    {
        return $this->hasOne(
            User::class,
            'profile_id',
            'bhw_id'
        )->where('user_type', 'bhw');
    }
}