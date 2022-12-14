<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Miembro extends Model
{
    use HasFactory;

    protected $primaryKey = "idmiembro";
    protected $foreinKey = "iduser";
    protected $fillable = ["iglesia" , "bautizo"];
}
