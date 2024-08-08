<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complaints extends Model
{
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $table = 'complaint';
}
