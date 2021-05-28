<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cita extends Model
{
    protected $primaryKey = ['idCITA']; 
//    protected $fillable = ['NSOCIO, DNI, FOTO'];
    protected $table = 'cita';    
    public $incrementing = FALSE;
    protected $keyType = ['int'];  
    public $timestamps = false;
}
