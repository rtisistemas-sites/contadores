<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noticias extends Model
{
    //
	protected $table = 'noticias' ;

    public $timestamps = false;

    protected $guarded = [];
}