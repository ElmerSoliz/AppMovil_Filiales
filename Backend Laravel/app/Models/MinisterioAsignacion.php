<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MinisterioAsignacion extends Model
{
    use HasFactory;

    protected $primaryKey = "idministerioasignacion";
    protected $fillable = ["iduser", "idasignacionrol"];
}
