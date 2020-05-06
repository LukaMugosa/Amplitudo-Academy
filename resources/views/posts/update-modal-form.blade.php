{!! Form::open(['action' =>['PostsController@update', $post->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
<div class="card-body">
    <div class="form-group">
        {{Form::label('title', 'Title', ['class' => 'text-info'])}}
        {{Form::text('title', $post->title, ['class' => 'form-control'])}}
    </div>
    <div class="form-group">
        {{Form::label('description', 'Description' ,['class' => 'text-info'])}}
        {{Form::text('description', $post->description, ['class' => 'form-control '])}}
    </div>
    <div class="form-group">
        <div class="card card-outline card-info">
            <div class="card-body pad">
                {{Form::label('body', 'Content', ['class' => 'text-info'])}}
                {{Form::textarea('body', $post->body, ['class' => 'textarea', 'placeholder' => 'Place some text here', 'style' => 'width: 100%; height: 800px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;'])}}
            </div>
        </div>
    </div>
</div>
<div class="modal-footer justify-content-between">
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        {{Form::submit('Save changes',['class' => 'btn btn-primary'])}}
        {!! Form::close() !!}
    </div>
</div>
