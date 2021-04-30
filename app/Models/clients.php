<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clients extends Model
{
    use HasFactory;

    protected $fillable = [
        'giverName',
        'giverLastName',
        'passportNumber',
        'birthday',
        'home',
        'lastNameGirl',
        'country',
        'citizenship',
        'placeOfBirth',
        'passportDate',
        'passportWhoGave',
        'lastVizaBeginning1',
        'lastVizaEnding1',
        'lastVizaBeginning2',
        'lastVizaEnding2',
        'lastVizaBeginning3',
        'lastVizaEnding3',
        'lastVizaBeginning4',
        'lastVizaEnding4'
    ];
}
