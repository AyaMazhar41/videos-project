@extends('layouts.app')
@section('meta_des',$video->meta_description)
@section('meta_keywords',$video->meta_keywords)
@section('title')
{{$video->name}}
@endsection
@section('content')
<div class="section section-buttons">

  <div class="container">
          <div class="title">
           <h1> {{$video->name}} </h1>
         </div>
         <div class="row">
         <div class="col-md-12">

         @php $url = getYoutubeId($video->youtube) @endphp
            @if($url)
                <iframe width="100%" height="500" src="https://www.youtube.com/embed/{{ $url }}" style="margin-bottom: 20px" frameborder="0"  allowfullscreen></iframe>
            @endif
             </div>

            </div>

            <div class="row">
         <div class="col-md-12">
         <p>{{$video->user->name}} </p>
         <p>{{$video->created_at}} </p>
         <p>{{$video->des}} </p>
          <h4 style="
    color: orange"> Category</h4>

         <p><a href="{{route('front.category',['id'=>$video->cat->id])}}"> <span class="badge badge-primary"> {{$video->cat->name}}</span> </a></p> <hr>
         <h4 style="
    color: orange"> Tags</h4>
         <p> @foreach($video->tags as $tag)
            <a href="{{route('front.tags',['id'=>$tag->id])}}">
         <span class="badge badge-primary">{{$tag->name}}</span>

         @endforeach
         </a></p> <hr>
         <h4 style="
    color: orange"> Skills</h4>


      @foreach($video->skills as $skill)
         <p>  <a href="{{route('front.skill',['id'=>$skill->id])}}">
         <span class="badge badge-info">{{$skill->name}}</span>

         @endforeach
         </a> </p>  <hr>



        
             </div>

            </div>
            @include('Frontend.video.comments')

            @include('Frontend.video.createComment')

@endsection
