{!! Form::open(['action' =>['CoursesController@update', $course->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
<div class="card-body">
    <div class="form-group">
        {{Form::label('title', 'Course Title',['class' => 'text-info'])}}
        {{Form::text('title', $course->title, ['class' => 'form-control ', 'placeholder' => 'Enter Course Title','id' => 'course-title'])}}
    </div>
    <div class="form-group">
        {{Form::label('about_course', 'About course',['class' => 'text-info'])}}
        {{Form::textarea('about_course', $course->about_course, ['class' => 'form-control', 'placeholder' => 'About your course', 'style' => 'height:100px;'])}}
    </div>
    <div class="form-group">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title text-info">
                    Describe Your Course In Detail
                </h3>
            </div>
            <div class="card-body pad">
                <div class="mb-3">
                    {{Form::textarea('description', $course->description, ['class' => 'textarea', 'placeholder' => 'Place some text here', 'style' => 'width: 100%; height: 800px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;'])}}
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        {{Form::label('header_photo', 'Upload header photo' ,['class' => 'text-info'])}}
        {{Form::file('header_photo')}}
    </div>
    <div class="form-group">
        {{Form::label('video_material', 'Upload video material',['class' => 'text-info'])}}
        {{Form::file('video_material')}}
    </div>
    <div class="form-group">
        {{Form::label('price', 'Enter price for Your course $',['class' => 'text-info'])}}
        {{Form::number('price',$course->price)}}
    </div>
</div>
<!-- /.card-body -->
<div class="card-footer">
    {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
</div>
