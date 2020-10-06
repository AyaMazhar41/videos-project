<?php

namespace App\Http\Controllers\backend;

//use Illuminate\Http\Request;
use App\Http\Requests\BackEnd\Users\Store;
use App\Http\Requests\BackEnd\Users\Update;


//use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class users extends BackendController
{
  public function __construct(User $model)
  {
      parent::__construct($model);

    }

     /*protected function filter($rows)
    {
      if(request()->has('name') && request()->get('name') != "" )
      {
        $rows=$rows->where('name',request()->get('name'));

      }
      return $rows;

    }*/
   
     public function store(Store $request)
    {
      //to confirm request to arrray
      $requestArray=$request->all();
      $requestArray['password']=Hash::make($requestArray['password']);
         $this->model->create($requestArray);
        //return redirect()->route('users.index');
        return redirect(route('users.index'));
    }
 

    public function update($id, Update $request)
    {
      $row=$this->model->findOrFail($id);
          $requestArray=$request->all();

    if(isset($requestArray['password']) && $requestArray['password'] != "" )
      {
           $requestArray['password']=Hash::make($requestArray['password']);
      }
      else
      {
        //cuz if pass send null in array 
        //it will remove pass from my array request
        unset($requestArray['password']);
      }
      $row->update($requestArray);
      return redirect(route('users.index'));


    	
    }
   

}
