<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Name
 * @package App\Models
 * 
 * @property string $email
 * @property string $link
 */
class Name extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'name';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = '';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'email',

        'link',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [

    ];

    const RuleList = [

        'email' => [],

        'link' => [],

    ];


}
