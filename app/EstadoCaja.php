<?php

namespace sisPazySalvos;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class EstadoCaja extends Model
{
    use Notifiable;
    protected  $table = 'estadocaja';
    protected $primaryKey = "id_estadocaja";
    public $timestamps = true;
    protected $fillable = ['documento_doc','estado','observacion'];
    protected $guarded=[];
}
