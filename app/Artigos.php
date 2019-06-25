<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artigos extends Model
{
    //
	protected $table = 'artigos' ;

    public $timestamps = false;

    protected $guarded = [];
}