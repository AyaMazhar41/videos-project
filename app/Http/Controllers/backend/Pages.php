<?php

namespace App\Http\Controllers\backend;
use App\Http\Requests\BackEnd\Pages\store;
use App\Models\page;

class Pages extends BackendController
{
    public function __construct(page $model)
  {
      parent::__construct($model);

    }

     
   
     public function store(store $request)
    {
      //to confirm request to arrray
         $this->model->create($request->all());
        return redirect(route('pages.index'));
    }
 

    public function update($id, store $request)
    {
      $row=$this->model->findOrFail($id);
      $row->update($request->all());
      return redirect(route('pages.index'));


    	
    }
   
}
