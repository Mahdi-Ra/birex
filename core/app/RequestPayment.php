<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestPayment extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'request_a_payment';
    public $timestamps = false;

}
