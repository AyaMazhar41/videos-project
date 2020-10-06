<?php

namespace App\Http\Controllers\backend;
use App\Http\Requests\BackEnd\videso\store;
use App\Http\Requests\BackEnd\videso\update;


use App\Models\video;
use App\Models\category;
use App\Models\skill;
use App\Models\tag;



class Videos extends BackendController
{
  use commentTrait;
     public function __construct(video $model)
    {
      parent::__construct($model);

    }

    
    protected function with()
    {
     return ['cat','user'];
    }
    protected function append()
    {
      // el condition da 3shan efsl el edit 3n create
      // ln video da el parameter el gwa route el edit
      // el id e3ny bs asmo video b3rf from
      // php artisn route:list
      $array= [ 
      'categories'=>category::get(),
      'skills'=>skill::get(),
      'tags'=>tag::get(),
      'selectedSkills'=>[],
      'selectedTags'=>[],
      'comments'=>[],

       ];

    if( request()->route()->parameter('video'))
     {
     $array['selectedSkills']=$this->model->find(request()->route()->parameter('video'))->skills()->get()->pluck('id')->toArray();
      $array['selectedTags']=$this->model->find(request()->route()->parameter('video'))->tags()->pluck('tags.id')->toArray();
      $array['comments']=$this->model->find(request()->route()->parameter('video'))->comments()->orderBy('id','desc')->get();

          }     
           return $array;


    }

   
     public function store(store $request)
    {
      $file=$request->file('image');

      $fileName=time().str_random('10').'.'.$file->getClientOriginalExtension();
      $file->move(public_path('uploads'),$fileName);
      //to confirm request to arrray
      $requestArray=['user_id'=>auth()->user()->id,'image'=>$fileName] + $request->all();
     $row= $this->model->create($requestArray);
     if(isset($requestArray['skills']) && !empty($requestArray['skills']))
        {
          $row->skills()->sync($requestArray['skills']);

        }

        if(isset($requestArray['tags']) && !empty($requestArray['tags']))
        {
          $row->tags()->sync($requestArray['tags']);

        }
        return redirect(route('videos.index'));
    }
 
 
    public function update($id, update $request)
    {
       $requestArray=$request->all();
      if($request->hasFile('image'))
      {
        $file=$request->file('image');

      $fileName=time().str_random('10').'.'.$file->getClientOriginalExtension();
      $file->move(public_path('uploads'),$fileName);
       $requestArray=['image'=>$fileName]+$request->all();

      }

     

      $row=$this->model->findOrFail($id);
      $row->update($requestArray);
       if(isset($requestArray['skills']) && !empty($requestArray['skills']))
        {
          $row->skills()->sync($requestArray['skills']);

        }

         if(isset($requestArray['tags']) && !empty($requestArray['tags']))
        {
          $row->tags()->sync($requestArray['tags']);

        }
    //  return redirect(route('videos.index'));
return redirect()->back();

    	
    }
}
