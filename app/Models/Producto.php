<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    //
    use HasFactory, SoftDeletes;
    protected $table='productos';
    protected $fillable = ['nombre','descripcion','precio','stock','idCategoria'];

    public function categoria()
    {
        return $this->belongsTo(categoria::class, 'idCategoria');
    }
}
