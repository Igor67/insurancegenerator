<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class firms extends Model
{
    use HasFactory;

    protected $fillable = [
        'firm',
        'firmBody',
        'electronicNumber'
    ];
}
