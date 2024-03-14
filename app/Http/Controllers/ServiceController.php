<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Employee;
use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
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
        if ($request->input('query'))
        {
            $search = $request->input('query');
            $services = Service::whereHas('employee',function ($query) use ($search){
                                    $query->where('name', 'like', '%' . $search . '%');})
                                ->orWhereHas('customer',function ($query) use ($search){
                                    $query->where('name', 'like', '%' . $search . '%');})
                                ->get();
        }
        else
        {
            $services = Service::all();
        }

        return view('backend.services.index',compact('services','customers','employees'));
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
                'Required' => 'Wajib Diisi'
            ];
            $request->validate([
                'employee_id'=>'required',
                'customer_id'=>'required',
                'class'=>'required',
                'date'=>'required',
            ],$message);
            $service = Service::create([
                'employee_id'=>$request->employee_id,
                'customer_id'=>$request->customer_id,
                'class'=>$request->class,
                'date'=>$request->date,
                'description'=>$request->description,
            ]);
            DB::commit();
            toast('Data berhasil disimpan!!','success');
            return redirect()->route('service.index',$service);
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
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        try {
            $message = [
                'Required' => 'Wajib Diisi'
            ];
            $request->validate([
                'employee_id'=>'required',
                'customer_id'=>'required',
                'class'=>'required',
                'date'=>'required',
            ],$message);
            $service->update([
                'employee_id'=>$request->employee_id,
                'customer_id'=>$request->customer_id,
                'class'=>$request->class,
                'date'=>$request->date,
                'description'=>$request->description,
            ]);
            DB::commit();
            toast('Data berhasil diedit!!','success');
            return redirect()->route('service.index',$service);
        }
        catch (\Exception $exception)
        {
            DB::rollBack();
            toast('Data gagal diedit!!','error');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        try {
            $service->delete();
            DB::commit();
            toast('Data berhasil dihapus!!','success');
            return back();
        }
        catch (\Exception $exception)
        {
            DB::rollBack();
            toast('Data gagal dihapus!!','error');
            return back();
        }
    }
}
