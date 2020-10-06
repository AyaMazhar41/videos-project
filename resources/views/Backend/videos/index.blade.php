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
                        video Name
                        </th>
                         <th>
                        video status
                        </th>
                        <th>
                          user
                        </th>
                         <th>
                          category
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
                         <td>
                          @if($row->published==1)

                          published

                          @else
                          hidden

                          @endif

                           </td>

                          <td>{{$row->user->name}} </td>
                          <td>{{$row->cat->name}} </td>

                         
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