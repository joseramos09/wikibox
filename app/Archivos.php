<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Archivos extends Model
{

    protected $fillable = [

        'user_id',
        'name',
        'description',
        'slug'
    ];

    public function user(){

        return $this -> belongsTo(user::class);
    }


}
