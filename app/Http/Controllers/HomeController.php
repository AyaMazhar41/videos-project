<?php

namespace App\Http\Controllers;

use App\Models\video;
use App\Models\category;
use App\Models\skill;
use App\Models\tag;
use App\Models\comment;
use App\Models\message;
use App\Models\page;
use App\Models\User;



use App\Http\Requests\FrontEnd\comments\store;
use App\Http\Requests\FrontEnd\messages\stor;
use App\Http\Requests\FrontEnd\user\update;
use Illuminate\Support\Facades\Hash;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
  

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()

    {
        $videos=video::Published()->orderBy('id','desc');
        if(request()->has('search') && request()->get('search') != '')
        {
            $videos=$videos->where('name','like','%'.request()->get('search').'%');
        }
        $videos=$videos->paginate(30);
        return view('home',compact('videos'));
    } 


     public function category($id)

    {
        $cat=category::findOrFail($id);
        $videos=video::Published()->where('cat_id',$id)->orderBy('id','desc')->paginate(30);
        return view('Frontend.category.index',compact('videos','cat'));
    } 

    public function skills($id)

    { //علاقه الفديو ب الاسكلز مني تو مني
        $skill=skill::findOrFail($id);
        $videos=video::Published()->whereHas('skills',function($query) use($id){
        $query->where('skill_id',$id);
        })->orderBy('id','desc')->paginate(30);
        return view('Frontend.skill.index',compact('videos','skill'));
    } 

     public function tags($id)

    { 
        $tag=tag::findOrFail($id);
        $videos=video::Published()->whereHas('tags',function($query) use($id){
        $query->where('tag_id',$id);
        })->orderBy('id','desc')->paginate(30);
        return view('Frontend.tag.index',compact('videos','tag'));
    } 
    public function video($id)
    {
        $video=video::with('skills','tags','cat','user','comments')->findOrFail($id);
        return view('Frontend.video.index',compact('video'));

    }
    public function commentUpdate($id ,store $request)
    {
        $comment=comment::findOrFail($id);
        if($comment->user_id = auth()->user()->id || auth()->user()->group =='admin')
        {
            $comment->update( $request->all()+ [ 'user_id'=>auth()->user()->id]);


        }
        return redirect()->route('frontend.video',['id'=>$comment->video_id]);
    }
   public function commentStore($id ,store $request)
    {
        $video=video::Published()->findOrFail($id);
        $comment=comment::create([
            'user_id'=>auth()->user()->id,
            'video_id'=>$video->id,
            'comment'=>$request->comment
        ]);

        
        return redirect()->route('frontend.video',['id'=>$video->id]);
    }

    public function commentdelete($id)
    {
        comment::findOrFail($id)->delete();
        return redirect()->back();

        
    }

    
    public function contact(stor $request)
    {
        message::create($request->all());
        return redirect()->route('frontend.landing');



    } 
    public function welcome()
    {
        $videos=video::Published()->orderBy('id','desc')->paginate(9);
        $videos_count=video::Published()->count();
        $comments_count=comment::count();
        $tags_count=tag::count();



        return view('welcome',compact('videos','videos_count','comments_count','tags_count'));
    }
public function page($id,$slug = null){
    $page=page::findOrFail($id);
    return view('Frontend.pages.index',compact('page'));


}
public function profile($id,$slug = null){
    $user=User::findOrFail($id);
    return view('Frontend.profile.index',compact('user'));


}

public function profileUpdate(update $request)
{
    $user=user::findOrFail(auth()->user()->id);
    //الجزء ده عشان حته تغير الايميل لان مش هعرف اعملهابالطريقه العاديه لان معنديش اي دي
   $array=[];
    if($request->email != $user->email)
    {
        //الشيك دي عشان لو الايميل موجود قبل كده
        // Frist بقيمه او ب null 

        $email= user::where ('email', $request->email)->first();
        if($email == null)
        {
            $array['email'] = $request->email;
        }

        
    }
    if($request->name != $user->name)
    {
        $array['name'] = $request->name;
    }
    if($request->password != '')
    {
        $array['password'] = Hash::make($request->password);
    }
    if(!empty($array))
    {
        $user->update($array);
    }
    return redirect()->back();


}



}
