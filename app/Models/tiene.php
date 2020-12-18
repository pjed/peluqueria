<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tiene extends Model
{
    protected $primaryKey = ['IDTIENE']; 
    protected $table = 'tiene';      
    public $incrementing = FALSE;
}
