{!! Form::open(['action' =>['AssignmentsController@update', $assignment->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
<div class="card-body">
    <div class="form-group">
        {{Form::label('title', 'Title')}}
        {{Form::text('title', $assignment->title, ['class' => 'form-control ', 'placeholder' => 'Enter Full Title Name','id' => 'exampleInputName'])}}
    </div>
    <div class="form-group">
        {{Form::label('exampleInputEmail1', 'Description')}}
        {{Form::textarea('description', $assignment->description, ['class' => 'form-control', 'id' => 'exampleInputEmail1', 'placeholder' => 'Enter assignment description'])}}
    </div>
    <div class="form-group">
        {{Form::label('inputDeadline', 'Dead line')}}
        {{Form::date('deadline',\Carbon\Carbon::now())}}
    </div>
</div>
<div class="modal-footer justify-content-between">
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        {{Form::submit('Save changes',['class' => 'btn btn-primary'])}}
        {!! Form::close() !!}
    </div>
</div>
