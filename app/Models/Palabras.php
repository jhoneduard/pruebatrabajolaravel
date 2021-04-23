<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Palabras extends Model
{
    use HasFactory, Notifiable;
    public $table= "palabras";
    protected $primaryKey = "id_palabra";
    public $timestamps = false;
    protected $guarded =[];
    protected $fillable = [
        'id_palabra','nombre','id_categoria',
    ];
}
