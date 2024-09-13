<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'full_name', 'email', 'address', 'city', 'state', 'zip_code', 'name_on_card',
         'credit_card_number', 'exp_month', 'exp_year', 'CVV', 'total', 'id_user', 'products'
    ];
}
