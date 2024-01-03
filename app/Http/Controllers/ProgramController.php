<?php

namespace App\Http\Controllers;

use App\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programs = Program::latest()->paginate();

        return view('backend.programs.index',compact('programs'));
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
        try {
            $message = [
                'required'=>'Wajib disi!!'
            ];
            $request->validate([
                'name'=>'required',
                'description'=>'required'
            ],$message);

            $program = Program::create([
                'name'=>$request->name,
                'description'=>$request->description
            ]);
            toast('Data program berhasil ditambah!!','success');
            DB::commit();
            return redirect()->route('program.index',$program);
        }
        catch (Exception $exception)
        {
            toast('Data program gagal ditambah!!','error');
            DB::rollBack();
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function show(Program $program)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function edit(Program $program)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Program $program)
    {
        try {
            $program ->update([
                'name'=>$request->name,
                'description'=>$request->description
            ]);
            toast('Data program berhasil diedit!!','success');
            DB::commit();
            return redirect()->route('program.index',$program);
        }
        catch (Exception $exception)
        {
            toast('Data program gagal diedit!!','error');
            DB::rollBack();
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function destroy(Program $program)
    {
        try {
            $program->delete();
            toast('Data program berhasil dihapus!!','success');
            DB::commit();
            return redirect()->route('program.index',$program);
        }
        catch (Exception $exception)
        {
            toast('Data program gagal dihapus!!','error');
            DB::rollBack();
            return back();
        }
    }
}
