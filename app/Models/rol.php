<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class rol extends Model
{
    protected $primaryKey = ['IDROL']; 
    protected $table = 'rol';    
    public $incrementing = true;
    protected $keyType = ['int'];  
}
