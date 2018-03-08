<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoginToken extends Model
{
    // setting primaryKey for this model
    protected $primaryKey =  'token';
    protected $keyType = 'string';
    public $incrementing = false;
}
