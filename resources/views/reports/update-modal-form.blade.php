{!! Form::open(['action' =>['ReportsController@update', $report->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
<div class="card-body">
    <div class="form-group">
        {{Form::label('title', 'Title')}}
        {{Form::text('title', $report->title, ['class' => 'form-control ', 'placeholder' => 'Enter Full Title Name','id' => 'exampleInputName'])}}
    </div>
    <div class="form-group">
        {{Form::label('users', 'Select User')}}
        {{Form::select('intended_user_id', $usersList, $report->intended_user_id, ['class' => 'form-control '])}}
    </div>
    <div class="form-group">
        {{Form::label('body', 'Report Content')}}
        {{Form::textarea('body', $report->body, ['class' => 'form-control', 'placeholder' => 'Place some text here'])}}
    </div>
</div>
<div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    {{Form::submit('Save changes',['class' => 'btn btn-success'])}}
    {!! Form::close() !!}
</div>
