<?php

namespace App\Http\Controllers;

use App\Course;
use App\Http\Requests\CoursesRequest;
use App\Rating;
use App\User;
use Illuminate\Http\Request;

class CoursesController extends Controller
{

    public function __construct()
    {
//        $this->middleware('can:add_courses');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $courses = Course::all();
        return view('courses.index')->with('courses',$courses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CoursesRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\DiskDoesNotExist
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileDoesNotExist
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileIsTooBig
     */
    public function store(CoursesRequest $request)
    {
        $course = new Course();
        $course->mentor_id = auth()->user()->id;
        $course->title = $request->input('title');
        $course->about_course = $request->input('about_course');
        $course->description = $request->input('description');
        $course->price = $request->input('price');
        if($request->hasFile('video_material')){
            $fileNameWithExt = $request->file('video_material')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('video_material')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_'.time().'.'.$extension;
            $path = $request->file('video_material')->storeAs('public/video_material_files',$fileNameToStore);
        }else{
            return redirect('/courses/create')->with('error','Please upload your .zip or .rar file!');
        }
        $course->courses_file_name = $fileNameToStore;
        $course->addMedia($request->header_photo)->toMediaCollection();
        $course->save();
        return redirect('/courses/create')->with('success', 'You have successfully added a new course!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $course = Course::findOrFail($id);
        $reviews = Rating::all()->where('course_id','=',$id);
        return view('courses.show')->with([
            'course' => $course,
            'reviews' => $reviews,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function edit($id)
    {
        $course = Course::find($id);
        $returnHTML = view('courses.update-modal-form',['course'=> $course])->render();
        return response()->json( ['html' => $returnHTML]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $course = Course::find($id);
        $course->delete();
        return redirect('/my-courses')->with('success','Course deleted successfully!');
    }
}
