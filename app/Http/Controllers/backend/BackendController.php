<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;

class BackendController extends Controller
{
	protected $model;
    public function __construct(Model $model)
    {
    	 $this->model=$model;

    }
    protected function GetClassNameFromModel()
    {
    	 return strtolower($this->PluralModelName());
    }
    protected function filter($rows)
    {
    	 return $rows;

    }
    protected function with()
    {
        [];
    }
    protected function append()
    {
        [];
    }
    protected function PluralModelName()
    {
         return str_plural($this->ModelName());
    }
    protected function ModelName()
    {
        return class_basename($this->model);

    }

      public function index()
    
    {
    	 $rows=$this->model;
    	 $rows=$this->filter($rows);
         $with=$this->with();
         if(!empty($with))
         {
            $rows=$rows->with($with);
         }
    	 $rows=$rows->paginate(10);


         $moduleName=$this->PluralModelName();
         $singularName=$this->ModelName();
         $pageTitle=$moduleName ." "."control";
         $description="here you can add / edit / delete" ." ".$moduleName;
         $RouteName=$this->GetClassNameFromModel();

    	return view ('Backend.'.$this->GetClassNameFromModel().'.index',compact('rows','moduleName','pageTitle','description','singularName','RouteName'));
    }
     public function create()
    {

         $moduleName=$this->ModelName();
         $pageTitle=$moduleName." create";
         $description="here you can create " ." ".$moduleName ;
         $FolderName=$this->GetClassNameFromModel();
         $RouteName=$this->GetClassNameFromModel();
         $append=$this->append();
    	return view ('Backend.'.$FolderName.'.create',compact('moduleName','pageTitle','description','FolderName','RouteName'))->with($append);
    	
    }

       public function edit($id)
    {
         $row=$this->model->findOrFail($id);
         $moduleName=$this->ModelName();
         $pageTitle=$moduleName ." "."edit";
         $description="here you can edit " ." ".$moduleName ;
         $FolderName=$this->GetClassNameFromModel();
          $RouteName=$this->GetClassNameFromModel();
          $append=$this->append();
    	return view ('Backend.'.$FolderName.'.edit',compact('row','moduleName','pageTitle','description','FolderName','RouteName'))->with($append);
    	
    }

     public function destroy ($id)
    {
     $this->model->findOrFail($id)->delete();
     return redirect(route($this->GetClassNameFromModel().'.index'));
    	
    }

}
