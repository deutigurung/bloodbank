<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $table = 'campaigns';

    protected $fillable =  [
        'name',
        'address',
        'date',
        'volunteer_id',
        'status',
    ];

    public function volunteer(){
        return $this->belongsTo(Volunteer::class,'volunteer_id');
    }
}
