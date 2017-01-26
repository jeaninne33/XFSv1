<?php

namespace XFS;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Servicio extends Model
{
    protected $table = 'servicios';

    protected $filltable=['nombre, descripcion','categoria_id'];

    public function categorias()
    {
      return $this->hasOne('categorias');
    }
}
