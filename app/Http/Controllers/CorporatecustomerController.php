<?php

namespace App\Http\Controllers;

use App\Corporate;
use App\Corporatecustomer;
use App\Customer;
use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CorporatecustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $customers = Customer::where('status_customer','Siswa')->latest()->paginate();
        $employees = Employee::all();
        $corporates = Corporate::all();
        if ($request->input('query'))
        {
            $search = $request->input('query');
            $corporatecustomers = Corporatecustomer::whereHas('employee',function ($query) use ($search){
                $query->where('name', 'like', '%' . $search . '%');})
                ->orWhereHas('customer',function ($query) use ($search){
                    $query->where('name', 'like', '%' . $search . '%');})
                ->orWhereHas('corporate',function ($query) use ($search){
                    $query->where('program_name', 'like', '%' . $search . '%');})
                ->paginate();
        }
        else
        {
            $corporatecustomers = Corporatecustomer::latest()->paginate();
        }

        return view('backend.corporatecustomers.index',compact('corporatecustomers','corporates','customers','employees'));
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
              'required'=>'Wajib Di isi!!'
            ];
            $request->validate([
                'employee_id'=>'required',
                'corporate_id'=>'required',
                'customer_id'=>'required',
            ],$message);
            $customer_id = $request->input('customer_id');
            $customer = Corporatecustomer::where('customer_id',$customer_id)->first();
            if (!$customer)
            {
                $corporatecustomer = Corporatecustomer::create([
                    'employee_id'=>$request->employee_id,
                    'corporate_id'=>$request->corporate_id,
                    'customer_id'=>$customer_id
                ]);
            }
            DB::commit();
            toast('Data berhasil disimpan','success');
            return redirect()->route('corporatecustomer.index',$corporatecustomer);
        }
        catch (\Exception $exception)
        {
            Corporatecustomer::where('customer_id',$customer_id)->first();
            DB::commit();
            toast('Data Sudah Ada!!','error');
            return back();
        }
        catch (\Exception $exception)
        {
            DB::rollBack();
            toast('Data gagal disimpan!!','error');
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Corporatecustomer  $corporatecustomer
     * @return \Illuminate\Http\Response
     */
    public function show(Corporatecustomer $corporatecustomer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Corporatecustomer  $corporatecustomer
     * @return \Illuminate\Http\Response
     */
    public function edit(Corporatecustomer $corporatecustomer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Corporatecustomer  $corporatecustomer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Corporatecustomer $corporatecustomer)
    {
        try {
            $message = [
                'required'=>'Wajib Di isi!!'
            ];
            $request->validate([
                'employee_id'=>'required',
                'corporate_id'=>'required',
                'customer_id'=>'required',
            ],$message);
            $customer_id = $request->input('customer_id');
            $customer = Corporatecustomer::where('customer_id',$customer_id)->first();
            if (!$customer)
            {
                $corporatecustomer->update([
                    'employee_id'=>$request->employee_id,
                    'corporate_id'=>$request->corporate_id,
                    'customer_id'=>$customer_id
                ]);
            }
            DB::commit();
            toast('Data berhasil disimpan','success');
            return redirect()->route('corporatecustomer.index',$corporatecustomer);
        }
        catch (\Exception $exception)
        {
            Corporatecustomer::where('customer_id',$customer_id)->first();
            DB::commit();
            toast('Data Sudah Ada!!','error');
            return back();
        }
        catch (\Exception $exception)
        {
            DB::rollBack();
            toast('Data gagal disimpan!!','error');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Corporatecustomer  $corporatecustomer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Corporatecustomer $corporatecustomer)
    {
        $corporatecustomer->delete();
        return back();
    }
}
