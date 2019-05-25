<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Archivos extends Model
{
    protected $table = 'upload_file';

    protected $fillable = [

        'user_id',
        'name',
        'description',
        'slug',
        'files'
    ];

    public function user(){

        return $this -> belongsTo(User::class);
    }

    public function getArchivoAttribute($archivo)
    {
        if( !$file || starts_with($file, 'http') ){
            return $file;
        }
        return Storage::disk('public')->url($file);
    }

}
