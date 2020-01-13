<?php

namespace sisPazySalvos;

use Illuminate\Database\Eloquent\Model;

class PeriodoAcademico extends Model
{
    protected  $table = 'periodo_academico';
    protected $primaryKey = "id_periodoac";
    public $timestamps = false;
    protected $fillable = ['ano','periodo'];
    protected $guarded=[];


    public function pazysalvo (){
        return $this->belongsTo(PazySalvo::class);
    }
}
