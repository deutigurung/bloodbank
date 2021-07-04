<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BloodSeeker extends Model
{
    protected $table = 'blood_seekers';

    protected $fillable =  [
        'name','age','phone','gender','receive_date', 'blood_id',
    ];

    public function blood(){
        return $this->belongsTo(Blood::class,'blood_id');
    }
}
