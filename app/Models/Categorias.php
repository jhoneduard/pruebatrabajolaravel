<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Categorias extends Model
{
    use HasFactory, Notifiable;
    public $table= "categoria";
    protected $primaryKey = "id_categoria";
    public $timestamps = false;
    protected $guarded =[];
    protected $fillable = [
        'id_categoria','nombre',
    ];
}
