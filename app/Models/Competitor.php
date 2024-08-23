<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competitor extends Model
{
    use HasFactory;

    protected $table = "competitor";
    protected $fillable = [
        'name',
        'age',
        'height',
        'weight',
        'sex',
        'CPF',
        'RG',
        'team',
    ];
}
