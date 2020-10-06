 @extends('Backend.layout.app')



@section('title')
{{$pageTitle}}
@endsection

@section('content')
@component('Backend.layout.header')
 @slot('nav_title')
     {{ $pageTitle }}
   @endslot
@endcomponent
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@component('Backend.shared.create',['pageTitle'=> $pageTitle ,'description'=>$description])   
  <form action="{{route($RouteName.'.store')}}" method="POST"> 
    
     @include('Backend.'.$FolderName.'.form')

       <button type="submit" class="btn btn-primary pull-right">Add {{$moduleName}}
        </button>
      <div class="clearfix"></div>
   </form>
  @endcomponent

  
@endsection