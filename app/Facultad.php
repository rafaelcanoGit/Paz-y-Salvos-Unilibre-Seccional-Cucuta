<?php

namespace sisPazySalvos;

use Illuminate\Database\Eloquent\Model;

class Facultad extends Model
{
    protected  $table = 'facultad';
    protected $primaryKey = "id_facultad";
    public $timestamps = false;
    protected $fillable = ['nombre'];
    protected $guarded=[];

    public function docentes(){
        return $this->hasMany(Docente::class,'id_fac','id_facultad');
    }

    public function pazysalvo (){
        return $this->belongsTo(PazySalvo::class);
    }


}
