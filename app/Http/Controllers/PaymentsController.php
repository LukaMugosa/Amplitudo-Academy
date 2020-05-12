<?php

namespace App\Http\Controllers;

use App\Course;
use App\Http\Requests\PaymentsRequest;
use App\Payment;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:view_payments')->except(['show','store']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $payments = Payment::all();
        return view('payments.index')->with('payments',$payments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PaymentsRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(PaymentsRequest $request)
    {

        $course = Course::find($request->get('course_id'));
        $user = auth()->user();
        $payment = new Payment();
        $cvc = $request->get('cvc');
        $expires = $request->get('expires');
        $name = $request->get('name');
        $payment->user_id = $user->id;
        $payment->purpose = "payment_for_course";
        $payment->amount = $request->get('amount');
        $payment->credit_card_number = $request->get('credit_card_number');
        $payment->save();
        $user->courses()->attach($course);
        return redirect('/mycourses')->with('payment_recived');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
