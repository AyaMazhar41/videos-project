<div class="col-lg-4">
                <div class="card" style="width: 20rem;">
                <a href="{{route('frontend.video',['id'=>$video->id])}}" title="{{$video->name}}">

                  <img class="card-img-top" src="{{url('uploads/'.$video->image)}}" alt="{{$video->name}}" style="max-height: 200px">
                   </a>
                   <div class="card-body">
                     <p class="card-text">
                     <a href="{{route('frontend.video',['id'=>$video->id])}}" title="{{$video->name}}">
                     {{$video->name}}

                     </a>
                     </p>
                    </div>
                    <small>{{$video->created_at}}</small>
                </div>
                 
             </div>