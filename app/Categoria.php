<?php

namespace XFS;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table='categorias';
    protected $fillable=['nombre','id'];

   public function servicios()
    {
      return $this->hasMany('XFS\Servicio','categoria_id');
    }

}
