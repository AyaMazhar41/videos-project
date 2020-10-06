@extends('Backend.layout.app')
@section('title')
Home page

@endsection


@section('content')
@component('Backend.layout.header',['nav_title'=>'Home page'])
@endcomponent

@include('Backend.home-section.statics')

 @include('Backend.home-section.comments')
@endsection