@extends('layouts.app')
@section('title')
videos
@endsection
@section('content')
<div class="section section-buttons">

  <div class="container">
          <div class="title">
           <h2>  video </h2>
           @if(request()->has('search') && request()->get('search') != '')
           <p>you are search on <b> {{request()->get('search')}} </b>  | <a href="{{route('home')}}"> reset</a> </p>
            @endif

         </div>
       
         @include('Frontend.shared.video-row')

   </div>
</div>
@endsection
