<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InstrumentsFamily extends Model
{
    protected $fillable = array('family');
    protected $table = 'instruments_family';
}
