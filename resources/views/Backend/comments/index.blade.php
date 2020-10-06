<table class="table" id="comments">
    <tbody>
    @foreach($comments as $comment)
        <tr>
            <td>

                <small>{{ $comment->user->name }}</small>

                
                <p>{{ $comment->comment }}</p>
                <small>{{ $comment->created_at }}</small>
            </td>
            
            <td class="td-actions text-right">
                <button type="button" rel="tooltip" title="" onclick="$(this).closest('tr').next('tr').slideToggle()"  class="btn btn-white btn-link btn-sm"
                        data-original-title="Edit Comment">
                    <i class="material-icons">edit</i>
                </button>

                 <a href="{{route('comments.delete',['id'=>$comment->id])}}"  type="button" rel="tooltip" class="btn btn-white btn-link btn-sm"
                        data-original-title="remove Comment">
                    <i class="material-icons">close</i>
                    </a>
               
            </td>
        </tr>
        <tr style="display: none">
            <td colspan="4">
                <form action="{{route('comments.update',['id'=>$comment])}}" method="post">
    {{csrf_field()}}
    
    @include('Backend.comments.form',['row'=>$comment])
    <input type="hidden" value="{{ $row->id }}" name="video_id">
    <button type="submit" class="btn btn-primary pull-right">update comment
        </button>

</form>

            </td>

        </tr>
        
    @endforeach
    </tbody>
</table>