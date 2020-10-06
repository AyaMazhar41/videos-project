<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
//use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\comment;


class Home extends BackendController
{
	 public function __construct(User $model)
  {
      parent::__construct($model);

    }
    public function index()
    {
      $comments = comment::with('user','video')->orderBy('id','desc')->paginate(20);
    	return view('Backend.home' ,compact('comments'));
    }
}
