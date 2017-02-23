<?php

namespace XFS;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table = 'servicios';

    protected $fillable=['nombre, descripcion','categoria_id'];

    public function categoria()
    {
      return $this->belongsTo('XFS\Categoria','categoria_id');
    }
}
