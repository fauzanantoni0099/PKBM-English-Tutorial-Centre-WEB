<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Overtime;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OvertimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $overtimes = Overtime::latest()->paginate();
        $employees = Employee::all();

        return view('backend.overtimes.index',compact('overtimes','employees'));
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
            $start = $request->input('start');
            $stop = $request->input('stop');
            $waktuMulai = Carbon::parse($start);
            $waktuSelesai =Carbon::parse($stop);
            $selisihJam = $waktuMulai->diff($waktuSelesai);
            $result = $selisihJam->format('%h');
            $overtime = Overtime::create([
                'date'=>$request->date,
                'employee_id'=>$request->employee_id,
                'description'=>$request->description,
                'start'=>$waktuMulai,
                'stop'=>$waktuSelesai,
                'total'=>$result
            ]);
            toast('Data over time berhasil ditambah!!','success');
            DB::commit();
            return redirect()->route('overtime.index',$overtime);
        }
        catch (\Exception $exception)
        {
            toast('Data over time gagal ditambah!!','error');
            DB::rollBack();
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Overtime  $overtime
     * @return \Illuminate\Http\Response
     */
    public function show(Overtime $overtime)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Overtime  $overtime
     * @return \Illuminate\Http\Response
     */
    public function edit(Overtime $overtime)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Overtime  $overtime
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Overtime $overtime)
    {
        try {
            $start = $request->input('start');
            $stop = $request->input('stop');
            $waktuMulai = Carbon::parse($start);
            $waktuSelesai = Carbon::parse($stop);
            $selisihJam = $waktuMulai->diff($waktuSelesai);
            $result = $selisihJam->format('%h');
            $overtime->update([
                'date'=>$request->date,
                'employee_id'=>$request->employee_id,
                'description'=>$request->description,
                'start'=>$waktuMulai,
                'stop'=>$waktuSelesai,
                'total'=>$result
            ]);
            toast('Data over time berhasil diedit!!','success');
            DB::commit();
            return redirect()->route('overtime.index',$overtime);
        }
        catch (\Exception $exception)
        {
            toast('Data over time gagal diedit!!','error');
            DB::rollBack();
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Overtime  $overtime
     * @return \Illuminate\Http\Response
     */
    public function destroy(Overtime $overtime)
    {
        try {
            $overtime->delete();

            toast('Data over time berhasil dihapus!!','success');
            DB::commit();
            return redirect()->route('overtime.index',$overtime);
        }
        catch (\Exception $exception)
        {
            toast('Data over time gagal dihapus!!','error');
            DB::rollBack();
            return back();
        }
    }
}
