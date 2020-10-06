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
  
      <form action="{{route($RouteName.'.update',['id'=> $row])}}" method="POST" enctype="multipart/form-data">
       {{method_field('put')}} 
      
       @include('Backend.'.$FolderName.'.form')

         <button type="submit" class="btn btn-primary pull-right">update {{$moduleName}}
          </button>
         <div class="clearfix"></div>
      </form>
      @slot('md4')
            @php $url = getYoutubeId($row->youtube) @endphp
            @if($url)
                <iframe width="250" src="https://www.youtube.com/embed/{{ $url }}" style="margin-bottom: 20px" frameborder="0"  allowfullscreen></iframe>
            @endif
            <img src="{{ url('uploads/'.$row->image) }}" width="250">
        @endslot

 @endcomponent 



 @component('Backend.shared.edit',['pageTitle'=>'comments','description'=>'here you can control your comment'])

  @include('Backend.comments.index')
  @slot('md4')
@include('Backend.comments.create')
@endslot
      

 @endcomponent          



  

@endsection