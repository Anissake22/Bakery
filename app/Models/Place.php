<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;
    protected $fillable = [
        'id','id_user', 'id_class', 'number_place','date_reservation_place','date_admin_validation_place',
        'status'
    ];
}
