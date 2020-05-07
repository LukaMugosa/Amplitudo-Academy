<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfilesRequest;
use App\Post;
use App\Profile;
use App\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id){

        $profile = Profile::find($id);
        if(is_null($profile))
            return view('profiles.not_found');
        $posts = Post::all()->where('user_id','=', $id)->sortByDesc('updated_at');
        return view('profiles.show')->with([
            'profile' => $profile,
            'posts' => $posts
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($id)
    {
        $user = User::find($id);
        if(is_null($user))
            return view('profiles.not_found');
        return view('users.edit')->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfilesRequest $request, $id)
    {
        $profile = Profile::find($id);
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->save();
        $profile->description = $request->input('description_2');
        $profile->education = $request->input('education');
        $profile->experience = $request->input('experience');
        $profile->address = $request->input('address');
        $profile->phone_number = $request->input('phone_number');
        $profile->skills = $request->input('skills');
        $profile->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
