<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class usuario extends Model
{
    protected $primaryKey = ['NSOCIO']; 
    protected $fillable = ['NSOCIO, DNI, FOTO'];
    protected $table = 'usuario';    
    public $incrementing = FALSE;
    protected $keyType = ['int'];  
}
