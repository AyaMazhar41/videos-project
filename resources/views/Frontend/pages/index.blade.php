@extends('layouts.app')
@section('meta_des',$page->meta_description)
@section('meta_keywords',$page->meta_keywords)
@section('title')
{{$page->name}}
@endsection

@section('content')
<div class="section section-buttons text-center" style="min-height: 600px">

  <div class="container">
          <div class="title">
           <h1> {{$page->name}} </h1>
         </div>
        <p>{!!$page->des!!}</p>

   </div>
</div>
@endsection
