<?php

namespace sisPazySalvos;

use Illuminate\Database\Eloquent\Model;

class Dependencia extends Model
{
    
    protected  $table = 'dependencia';
    protected $primaryKey = "id_dependencia";
    public $timestamps = false;
    protected $fillable = ['nombre'];
    protected $guarded=[];
    
    
    
    public function pazysalvo (){
        return $this->belongsTo(PazySalvo::class);
    }//
}
