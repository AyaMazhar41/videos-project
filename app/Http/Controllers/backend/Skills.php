<?php

namespace App\Http\Controllers\backend;

//use Illuminate\Http\Request;
//use App\Http\Controllers\Controller;
use App\Http\Requests\BackEnd\skills\store;
use App\Models\skill;
class Skills extends BackendController
{
    public function __construct(skill $model)
  {
      parent::__construct($model);

    }

     
   
     public function store(store $request)
    {
      //to confirm request to arrray
         $this->model->create($request->all());
        return redirect(route('skills.index'));
    }
 

    public function update($id, store $request)
    {
      $row=$this->model->findOrFail($id);
      $row->update($request->all());
      return redirect(route('skills.index'));


    	
    }
   

}


