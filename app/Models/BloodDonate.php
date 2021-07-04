<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BloodDonate extends Model
{
    protected $table = 'blood_donates';

    protected $fillable =  [
        'name',
        'donate_date',
        'donate_before',
        'blood_id',
        'donor_id',
    ];

    public function donor(){
        return $this->belongsTo(Donor::class,'donor_id');
    }
    public function blood(){
        return $this->belongsTo(Blood::class,'blood_id');
    }
}
