 @extends('Backend.layout.app')

 @php


$test="Number of user = ";
@endphp

@section('title')
{{$pageTitle}}
@endsection

@section('content')
   @component('Backend.layout.header')
     @slot('nav_title')
        {{ $pageTitle }}
      @endslot
   @endcomponent

   @component('Backend.shared.table',['pageTitle'=>$pageTitle,'description'=>$description])
     @slot('addButton')
        <div class="col-md-4 text-right" >
           <a href="{{route($RouteName.'.create')}}" class="btn btn-white btn-round">Add {{$singularName}}
            </a>
        </div>
      @endslot  


        <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                          ID
                        </th>
                        <th>
                        page Name
                        </th>
                         <th>
                        page description
                        </th>
                       
                       
                        
                        <th class="text-right">
                          control
                        </th>
                      </thead>
                      <tbody>
                        @foreach($rows as $row)
                        <tr>
                          <td>{{$row->id}} </td>
                          <td>{{$row->name}} </td>
                          <td>{{$row->des}} </td>
                         
                          <td class="td-actions text-right">
                             @include('Backend.shared.buttons.edit') 
                             @include('Backend.shared.buttons.delete') 


                              
                            </td>
                          

                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    {!! $rows->links() !!}

                  </div>    
    @endcomponent
  
@endsection