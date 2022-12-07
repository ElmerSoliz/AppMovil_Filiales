<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsignacionRoles extends Model
{
    use HasFactory;

    protected $primaryKey = "idasignacionrol";
    protected $foreinKey =["idministerio", "idmiembro"];
    protected $fillable = ["fechaInicio", "fechaFinal"];
}
