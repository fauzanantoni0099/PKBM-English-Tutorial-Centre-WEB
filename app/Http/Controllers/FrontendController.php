<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Carrier;
use App\Employee;
use App\Gallery;
use App\Program;
use App\Study;
use App\Testimonial;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::latest()->take(6)->get();
        $activities = Activity::latest()->take(2)->get();
        $programs = Program::latest();
        $testimonials = Testimonial::all();
        $studies = Study::all();
        $employees = Employee::count();

        return view('frontend.index',compact('programs','galleries','activities','testimonials','studies','employees'));
    }
    public function staff()
    {
        $galleries = Gallery::latest()->take(6)->get();
        $employees = Employee::latest()->get();
        return view('frontend.staff',compact('employees','galleries'));
    }
    public function news()
    {
        $galleries = Gallery::latest()->take(6)->get();
        $activities = Activity::latest()->paginate();
        return view('frontend.news',compact('activities','galleries'));
    }
    public function gallery()
    {
        $galleries = Gallery::latest()->take(6)->get();
        $galleriess = Gallery::latest()->paginate();
        return view('frontend.gallery',compact('galleries','galleriess'));
    }
    public function about()
    {
        $galleries = Gallery::latest()->take(6)->get();
        $carriers = Carrier::latest()->get();
        return view('frontend.about',compact('carriers','galleries'));
    }
    public function contact()
    {
        $galleries = Gallery::latest()->take(6)->get();
        return view('frontend.contact',compact('galleries'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
