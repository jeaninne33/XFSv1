<?php

namespace XFS\Http\Controllers;

use Illuminate\Http\Request;

use XFS\Http\Requests;
use XFS\Http\Controllers\Controller;

class HomeController extends Controller
{
  public function index()
  {
      return \View::make('welcome');
  }
}
