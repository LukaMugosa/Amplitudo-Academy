<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReportsRequest;
use App\Report;
use App\User;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $usersList = User::all()->where('role_id', '<', 5)->sortBy('name', SORT_NATURAL | SORT_FLAG_CASE)->pluck('name','id');
        $reports = Report::retriveMyReports();
        return view('reports.index')->with([
            'reports' => $reports,
            'usersList' => $usersList
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $usersList = User::all()->where('role_id', '<', 5)->sortBy('name', SORT_NATURAL | SORT_FLAG_CASE)->pluck('name','id');
        return view('reports.create')->with('usersList',$usersList);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ReportsRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ReportsRequest $request)
    {
        $report = new Report();
        $report->user_id = auth()->user()->id;
        $report->intended_user_id = $request->get('intended_user_id');
        $report->title = $request->input('title');
        $report->body = $request->input('body');
        $report->save();
        if(auth()->user()->isSupervisor())
            return redirect('/reports')->with('success','Report added successfully!');
        else
            return redirect('/reports/create')->with('success','Report added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function show($id)
    {
        $usersList = User::all()->where('role_id', '<', 5)->sortBy('name', SORT_NATURAL | SORT_FLAG_CASE)->pluck('name','id');
        $report = Report::find($id);
        $returnHTML = view('reports.modal-body-view',['report'=>$report])->render();
        return response()->json(['html' => $returnHTML]);
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
        $usersList = User::all()->where('role_id', '<', 5)->sortBy('name', SORT_NATURAL | SORT_FLAG_CASE)->pluck('name','id');
        $report = Report::find($id);
        $returnHTML = view('reports.update-modal-form',['report'=>$report,'usersList' => $usersList])->render();
        return response()->json(['html' => $returnHTML]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ReportsRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(ReportsRequest $request, $id)
    {
        $report = Report::find($id);
        $report->user_id = auth()->user()->id;
        $report->intended_user_id = $request->get('intended_user_id');
        $report->title = $request->input('title');
        $report->body = $request->input('body');
        $report->save();
        return redirect('/reports')->with('success','Report updated successfully!');
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
