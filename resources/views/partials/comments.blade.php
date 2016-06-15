<hr>
<div class="widget-area no-padding blank">
    <div class="status-upload">
        <h4>Post a comment</h4>
        <hr>
        {!! Form::open() !!}
        {!! Form::hidden('comments', $card->id) !!}
        {!! csrf_field() !!}
        {{ method_field('PUT') }}

            <textarea name="comment-text" id="comment-text" placeholder="Write a comment for this card..." ></textarea>

            <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-send" aria-hidden="true"></span></i> Comment
            </button>
        {!! Form::close() !!}
        @if (count($errors) > 0)
            <div class="alert alert-danger animated flipInX">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div><!-- Status Upload  -->
</div><!-- Widget Area -->


<div class="col-md-6 col-md-offset-3">
    <div class="page-header">
        <h4><small class="pull-right">{{ count($comments) }} comments</small> Comments: </h4>
    </div>

    <div class="comments-list">
        @if($comments)
            @foreach($comments as $comment)
                <div class="media">
                <p class="pull-right"><small>{{ $comment->created_at->diffForHumans() }}</small></p>
                    <div class="media-body">
                        <h4 class="media-heading user_name">{{ App\User::find($comment->user_id)->name }} </h4>
                        <p>{{ $comment->comment_text }}</p>
                        <ul class="list-unstyled list-inline">
                            <li><a href="#">Edit</a></li>|
                            <li><a href="#">Delete</a></li>
                        </ul>
                    </div>
                </div>
            @endforeach
        @else
            <p>No Comments.</p>
        @endif
    </div>
</div>
