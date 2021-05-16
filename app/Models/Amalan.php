<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amalan extends Model
{
    use HasFactory;

    protected $table = 'amalan';

    protected $fillable = [
        'id','businessType_id', 'user_id', 'name' ,'phone_number','email',
    ];

    public function user(){
    	return $this->belongsTo('App\Models\User');
    }
}
