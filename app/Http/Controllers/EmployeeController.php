<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->input('query'))
        {
            $query = $request->input('query');

            $employees = Employee::where('name', 'LIKE', "%$query%")->paginate();
        }
        else
        {
            $employees = Employee::latest()->paginate();
        }


        return view('backend.employees.index',compact('employees'));
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
                'required'=>'Wajib di isi !!'
            ];
            $request->validate([
                'name'=>'required',
                'gender'=>'required',
                'birth_date'=>'required',
                'religion'=>'required',
                'position'=>'required',
                'kata'=>'required',
                'sosmed'=>'required',
                'entered_date'=>'required',
                'phone'=>'required',
                'address'=>'required',
                'name_path'=>'|mimes:pdf,jpeg,png,jpg'
            ],$message);

            $employee = Employee::create([
                'name'=>$request->name,
                'gender'=>$request->gender,
                'birth_date'=>$request->birth_date,
                'religion'=>$request->religion,
                'kata'=>$request->kata,
                'sosmed'=>$request->sosmed,
                'position'=>$request->position,
                'entered_date'=>$request->entered_date,
                'phone'=>$request->phone,
                'address'=>$request->address
            ]);
                if ($request->name_path)
                {
                    $file = $request->file('name_path');
                    $fileName = $file->getClientOriginalName();
                    $file->move(public_path('images'),$fileName);
                    $fileLocation ='images/'.$fileName;

                    if(!$employee->images()->exists())
                    {
                        $employee->images()->create([
                            'name_path'=>$fileLocation,
                            'imageable_id'=>$employee->id,
                            'imageable_type'=>Employee::class
                        ]);
                    }
                    else
                    {
                        $employee->images()->update([
                            'name_path'=>$fileLocation,
                            'imageable_id'=>$employee->id,
                            'imageable_type'=>Employee::class
                        ]);
                    }

                }
            toast('Data karyawan berhasil disimpan!!','success');
            DB::commit();
            return redirect()->route('employee.index',$employee);
        }
        catch (Exception $exception)
        {
            toast('Data karyawan gagal disimpan!!','error');
            DB::rollBack();
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        try {
            $message = [
                'required'=>'Wajib di isi !!'
            ];
            $request->validate([
                'name'=>'required',
                'gender'=>'required',
                'birth_date'=>'required',
                'religion'=>'required',
                'position'=>'required',
                'entered_date'=>'required',
                'sosmed'=>'required',
                'kata'=>'required',
                'phone'=>'required',
                'address'=>'required',
                'name_path'=>'|mimes:pdf,jpeg,png,jpg'
                ],$message);

            $employee->update([
                'name'=>$request->name,
                'gender'=>$request->gender,
                'birth_date'=>$request->birth_date,
                'religion'=>$request->religion,
                'position'=>$request->position,
                'sosmed'=>$request->sosmed,
                'kata'=>$request->kata,
                'entered_date'=>$request->entered_date,
                'phone'=>$request->phone,
                'address'=>$request->address
            ]);
            if($request->name_path)
            {
                $file = $request->file('name_path');
                $fileName = $file->getClientOriginalName();
                $file->move(public_path('images'),$fileName);
                $fileLocation ='images/'.$fileName;
                if (!$employee->images()->exists())
                {
                    $employee->images()->create([
                        'name_path'=>$fileLocation,
                        'imageable_id'=>$employee->id,
                        'imageable_type'=>Employee::class
                    ]);
                }
                else
                {
                    $employee->images()->update([
                        'name_path'=>$fileLocation,
                        'imageable_id'=>$employee->id,
                        'imageable_type'=>Employee::class
                    ]);
                }
            }
            toast('Data karyawan berhasil diedit!!','success');
            DB::commit();
            return redirect()->route('employee.index',$employee);
        }
        catch (Exception $exception)
        {
            toast('Data karyawan gagal diedit!!','error');
            DB::rollBack();
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        try {
            $employee->delete();
            $employee->images()->delete();
            toast('Data karyawan berhasil dihapus!!','success');
            DB::commit();
            return redirect()->route('employee.index',$employee);
        }
        catch (Exception $exception)
        {
            toast('Data Karyawan gagal dihapus!!','error');
            DB::rollBack();
            return back();
        }
    }
}
