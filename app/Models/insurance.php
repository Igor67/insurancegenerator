<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Insurance
 * @package App\Models
 *
 */
class insurance extends Model
{


    use HasFactory;
    protected $fillable = [
        'passportNumber',
        'days',
        'startdate',
        'prem',
        'summ',
        'enddate',
        'fran',
        'login',
        'polNumber',
        'type',
        'createDate'
    ];



}
