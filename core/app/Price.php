<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'price';
    public $timestamps = false;
}
