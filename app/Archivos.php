<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Archivos extends Model
{
    public $table = 'files';

    protected $fillable = [

        'user_id',
        'name',
        'description',
        'slug',
        'archivo'
    ];

    public function user(){

        return $this -> belongsTo(user::class);
    }

    public function getArchivoAttribute($archivo)
    {
        if( !$archivo || starts_with($archivo, 'http') ){
            return $archivo;
        }
        return Storage::disk('public')->url($archivo);
    }

}
