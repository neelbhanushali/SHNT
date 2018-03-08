<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    // setting primaryKey for this model
    protected $primaryKey = 'username';
    protected $keyType = 'string';
    public $incrementing = false;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;


}
