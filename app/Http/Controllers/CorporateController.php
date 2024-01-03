<?php

namespace App\Http\Controllers;

use App\Corporate;
use App\Customer;
use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CorporateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        $customers = Customer::all();
        $corporates = Corporate::latest()->paginate();

        return view('backend.corporates.index',compact('employees','customers','corporates'));
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
                'required'=>'Wajib DIisi'
            ];
            $request->validate([
                'date'=>'required',
                'employee_id'=>'required',
                'customer_id'=>'required',
                'program_name'=>'required',
                'program_head'=>'required',
            ],$message);

            $corporate = Corporate::create([
                'date'=>$request->date,
                'employee_id'=>$request->employee_id,
                'customer_id'=>$request->customer_id,
                'program_name'=>$request->program_name,
                'program_head'=>$request->program_head,
            ]);
            toast('Data corporate berhasil ditambah!!','success');
            DB::commit();
            return redirect()->route('corporate.index',$corporate);
        }
        catch (Exception $exception)
        {
            toast('Data corporate gagal disimpan!!','error');
            DB::rollBack();
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Corporate  $corporate
     * @return \Illuminate\Http\Response
     */
    public function show(Corporate $corporate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Corporate  $corporate
     * @return \Illuminate\Http\Response
     */
    public function edit(Corporate $corporate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Corporate  $corporate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Corporate $corporate)
    {
        try {
            $message = [
                'required'=>'Wajib DIisi'
            ];
            $request->validate([
                'date'=>'required',
                'employee_id'=>'required',
                'customer_id'=>'required',
                'program_name'=>'required',
                'program_head'=>'required',
            ],$message);

            $corporate->update([
                'date'=>$request->date,
                'employee_id'=>$request->employee_id,
                'customer_id'=>$request->customer_id,
                'program_name'=>$request->program_name,
                'program_head'=>$request->program_head,
            ]);
            toast('Data corporate berhasil diedit!!','success');
            DB::commit();
            return redirect()->route('corporate.index',$corporate);
        }
        catch (Exception $exception)
        {
            toast('Data corporate gagal diedit!!','error');
            DB::rollBack();
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Corporate  $corporate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Corporate $corporate)
    {
        try {
            $corporate->delete();
            toast('Data corporate berhasil dihapus!!','success');
            DB::commit();
            return redirect()->route('corporate.index',$corporate);
        }
        catch (Exception $exception)
        {
            toast('Data corporate gagal dihapus!!');
            DB::rollBack();
            return back();
        }
    }
}
