{!! Form::open(['action' =>['ProjectsController@update', $project->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
<div class="card-body">
    <div class="form-group">
        {{Form::label('title', 'Title')}}
        {{Form::text('title', $project->title, ['class' => 'form-control ', 'placeholder' => 'Enter Full Title Name','id' => 'exampleInputName'])}}
    </div>
    <div class="form-group">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">
                    Describe Project In Detail
                </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body pad">
                <div class="mb-3">
                    {{Form::textarea('project_description', $project->project_description, ['class' => 'textarea', 'placeholder' => 'Place some text here', 'style' => 'width: 100%; height: 800px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;'])}}
                </div>
            </div>
        </div>
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
