<form action="{{route($RouteName.'.destroy',['id'=>$row])}}" method="POST">
                                {{csrf_field()}}      

                              {{method_field('delete')}}
                              <button type="submit" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Remove {{$singularName}}">
                                <i class="material-icons">close</i>
                              </button>
                              </form>