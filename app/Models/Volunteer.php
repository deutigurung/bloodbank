<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
    protected $table = 'volunteers';

    protected $fillable =  [
        'image',
        'designation',
        'blood_group','blood_id',
        'temporary_address',
        'permanent_address',
        'location_id',
        'status',
        'facebook',
        'twitter',
        'linkedin',
        'instagram',
        'user_id',
    ];

    public function location(){
        return $this->belongsTo(Location::class,'location_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

}
