<?php

namespace sisPazySalvos;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class EstadoDocente extends Model
{
    use Notifiable;
    protected  $table = 'estado_docente';
    protected $primaryKey = "id_estado_doc";
    public $timestamps = true;
    protected $fillable = ['id_pazys','id_doc','estado','observacion'];
    protected $guarded=[];
}
