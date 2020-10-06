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
@component('Backend.shared.edit',['pageTitle'=>$pageTitle,'description'=>$description])
  
      
      
       @include('Backend.'.$FolderName.'.form')

     @endcomponent        

  
@endsection