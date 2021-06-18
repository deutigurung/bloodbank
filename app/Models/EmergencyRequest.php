<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmergencyRequest extends Model
{
    protected $table = 'emergency_requests';

    protected $fillable =  [
        'name',
        'message',
        'mobile',
        'requisition_form',
        'blood_group','blood_id',
        'status'
    ];

}
