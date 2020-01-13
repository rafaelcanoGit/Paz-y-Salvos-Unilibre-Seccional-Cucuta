<?php

namespace sisPazySalvos;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    protected  $table = 'docente';
    protected $primaryKey = "id_docente";
    public $timestamps = false;
    protected $fillable = ['nombre','apellido','documento','id_fac'];
    protected $guarded=[];

    public function facultad(){
        return $this->belongsTo(Facultad::class);
    }

    
}
