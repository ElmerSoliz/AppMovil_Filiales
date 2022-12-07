<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioCargo extends Model
{
    use HasFactory;

    protected $primaryKey = "idusuariocargo";
    protected $fillable = ["iduser", "idcargo"];
    
}
