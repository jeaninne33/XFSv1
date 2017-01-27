<?php

namespace XFS;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table='categorias';
    protected $filltable=['nombre','id'];

    public function categorias()
    {
      return $this->hasMany('servicios');
    }

}
