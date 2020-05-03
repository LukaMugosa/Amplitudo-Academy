<?php

namespace App\Http\Controllers;

use App\Course;
use App\Http\Requests\CoursesRequest;
use App\User;
use Illuminate\Http\Request;

class CoursesController extends Controller
{

//    public function __construct()
//    {
//        $this->middleware('can:view_my_courses');
//    }

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function store(CoursesRequest $request)
    {
        $course = new Course();
        $course->mentor_id = auth()->user()->id;
        $course->title = $request->input('title');
        $course->about_course = $request->input('about_course');
        $course->description = $request->input('description');
        $course->price = $request->input('price');
        $course->save();
        return view('courses.create')->with('success', 'You have successfully added a new course!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::findOrFail($id);
        return view('courses.show')->with('course',$course);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
