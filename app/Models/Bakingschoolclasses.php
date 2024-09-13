<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bakingschoolclasses extends Model
{
    use HasFactory;
    protected $fillable = [
        'id','description', 'name_class', 'image'
    ];
}
