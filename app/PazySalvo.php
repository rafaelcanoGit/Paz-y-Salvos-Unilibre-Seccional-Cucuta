<?php

namespace sisPazySalvos;

use Illuminate\Database\Eloquent\Model;

class PazySalvo extends Model
{
    protected  $table = 'pazysalvo';
    protected $primaryKey = "id_pazysalvo";
    public $timestamps = false;
    protected $fillable = ['id_dep','id_fac','id_per'];
    protected $guarded=[];
}
