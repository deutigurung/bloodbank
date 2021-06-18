<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{
    protected $table = 'donors';

    protected $fillable =  [
        'father_name',
        'mother_name',
        'temporary_address',
        'permanent_address',
        'image',
        'blood_group',
        'blood_id',
        'location_id',
        'blood_donate_count',
        'status',
        'user_id',
    ];

    public function location(){
        return $this->belongsTo(Location::class,'location_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
