<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Row extends Model
{
    protected $table = 'rows';
    protected $fillable = ['name', 'date'];
}
