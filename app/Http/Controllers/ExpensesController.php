<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Expenses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expensess = Expenses::latest()->paginate();
        $employees = Employee::all();

        return view('backend.expenses.index',compact('expensess','employees'));
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
                'required'=>'Wajib Diisi!!'
            ];
            $request->validate([
                'date'=>'required',
                'employee_id'=>'required',
                'name'=>'required',
                'price'=>'required',
                'quantity'=>'required'
            ],$message);

            $expenses = Expenses::create([
                'date'=>$request->date,
                'employee_id'=>$request->employee_id,
                'name'=>$request->name,
                'price'=>$request->price,
                'quantity'=>$request->quantity,
                'total'=>$request->price * $request->quantity,
            ]);
            toast('Data expenses berhasil ditambah!!','success');
            DB::commit();
            return redirect()->route('expenses.index',$expenses);
        }
        catch (Exception $exception)
        {
            toast('Data expenses gagal ditambah!!','error');
            DB::rollBack();
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Expenses  $expenses
     * @return \Illuminate\Http\Response
     */
    public function show(Expenses $expenses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Expenses  $expenses
     * @return \Illuminate\Http\Response
     */
    public function edit(Expenses $expenses)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Expenses  $expenses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expenses $expense)
    {
        try {
            $expense->update([
                'date'=>$request->date,
                'employee_id'=>$request->employee_id,
                'name'=>$request->name,
                'price'=>$request->price,
                'quantity'=>$request->quantity,
                'total'=>$request->price * $request->quantity
            ]);
            toast('Data expenses berhasil diedit!!','success');
            DB::commit();
            return redirect()->route('expenses.index',$expense);
        }
        catch (Exception $exception)
        {
            toast('Data expenses gagal diedit!!','error');
            DB::rollBack();
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Expenses  $expenses
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expenses $expense)
    {
        try {
            $expense->delete();
            toast('Data expenses berhasil dihapus!!','success');
            DB::commit();
            return redirect()->route('expenses.index',$expense);
        }
        catch (Exception $exception)
        {
            toast('Data expenses gagal dihapus!!','error');
            DB::rollBack();
            return back();
        }
    }
}
