<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class usuario extends Model
{
    protected $primaryKey = ['NSOCIO']; 
    protected $table = 'usuario';    
    public $incrementing = true;
    protected $keyType = ['int'];  
}
