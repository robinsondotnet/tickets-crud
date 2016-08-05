<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'tickets';
    protected $fillable = ['nombre', 'descripcion', 'prioridad', 'fecha_solicitud'];

}
