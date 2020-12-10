<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cita extends Model
{
    protected $primaryKey = ['IDCITA']; 
    protected $table = 'cita';    
    public $incrementing = true;
    protected $keyType = ['int'];  
}
