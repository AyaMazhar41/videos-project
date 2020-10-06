@extends('layouts.app')
@section('meta_des',$cat->meta_description)
@section('meta_keywords',$cat->meta_keywords)
@section('title')
{{$cat->name}}
@endsection



@section('content')
<div class="section section-buttons">

  <div class="container">
          <div class="title">
           <h1> {{$cat->name}} </h1>
         </div>
         @include('Frontend.shared.video-row')

   </div>
</div>
@endsection
