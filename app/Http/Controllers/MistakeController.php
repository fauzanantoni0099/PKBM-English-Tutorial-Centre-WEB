<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Mistake;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MistakeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $employees = Employee::all();
        if ($request->input('query'))
        {
            $query = $request->input('query');
            $mistakes = Mistake::where('mistake','LIKE',"%$query%")->paginate();
        }
        else
        {
            $mistakes = Mistake::latest()->paginate();
        }

        return view('backend.mistakes.index',compact('mistakes','employees'));
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
                'required'=>'Wajib Diisi'
            ];
            $request->validate([
                'date'=>'required',
                'employee_id'=>'required',
                'mistake'=>'required',
                'description'=>'required'
            ],$message);

            $mistake = Mistake::create([
                'date'=>$request->date,
                'employee_id'=>$request->employee_id,
                'mistake'=>$request->mistake,
                'description'=>$request->description
            ]);
            toast('Data kesalahan berhasil disimpan!!','success');
            DB::commit();
            return redirect()->route('mistake.index',$mistake);
        }
        catch (\Exception $exception)
        {
            toast('Data kesalahan gagal disimpan!!','error');
            DB::rollBack();
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mistake  $mistake
     * @return \Illuminate\Http\Response
     */
    public function show(Mistake $mistake)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mistake  $mistake
     * @return \Illuminate\Http\Response
     */
    public function edit(Mistake $mistake)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mistake  $mistake
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mistake $mistake)
    {
        try {
            $message = [
                'required'=>'Wajib Diisi'
            ];
            $request->validate([
                'date'=>'required',
                'employee_id'=>'required',
                'mistake'=>'required',
                'description'=>'required'
            ],$message);

            $mistake->update([
                'date'=>$request->date,
                'employee_id'=>$request->employee_id,
                'mistake'=>$request->mistake,
                'description'=>$request->description
            ]);
            toast('Data kesalahan berhasil diedit!!','success');
            DB::commit();
            return redirect()->route('mistake.index',$mistake);
        }
        catch (\Exception $exception)
        {
            toast('Data kesalahan gagal diedit!!','error');
            DB::rollBack();
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mistake  $mistake
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mistake $mistake)
    {
        try {
            $mistake->delete();
            toast('Data kesalahan berhasil dihapus!!','success');
            DB::commit();
            return redirect()->route('mistake.index',$mistake);
        }
        catch (\Exception $exception)
        {
            toast('Data kesalahan gagal dihapus!!','error');
            DB::rollBack();
            return back();
        }
    }
}
