<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amalan extends Model
{
    use HasFactory;

    protected $table = 'amalan';

    public function user(){
    	return $this->belongsTo('App\User');
    }
}
