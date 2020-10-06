<form action="{{route('comments.store')}}" method="post">
	{{csrf_field()}}
	
	@include('Backend.comments.form')
	<input type="hidden" value="{{ $row->id }}" name="video_id">
	<button type="submit" class="btn btn-primary pull-right">Add comment
        </button>

</form>