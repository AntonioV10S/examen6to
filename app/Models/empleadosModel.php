<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class empleadosModel extends Model
{
    use HasFactory;
    protected $table = 'empleados';
    public $timestamps = false;
}
