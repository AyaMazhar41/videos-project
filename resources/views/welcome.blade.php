@extends('layouts.app')
@section('title')
Home page
@endsection
@section('content')
@include('Frontend.homepage-section.homepage-image')
@include('Frontend.homepage-section.videos')
@include('Frontend.homepage-section.statics')

@include('Frontend.homepage-section.homepage-contact')

@endsection