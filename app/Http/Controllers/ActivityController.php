<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Customer;
use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActivityController extends Controller
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
            $activities = Activity::where('name','LIKE',"%$query%")->paginate();
        }
        else{
            $activities = Activity::latest()->paginate();
        }
        return view('backend.activities.index',compact('activities','employees'));
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
                'name'=>'required',
                'employee_id'=>'required',
                'date'=>'required',
                'description'=>'required',
            ],$message);
            $activity = Activity::create([
                'name'=>$request->name,
                'employee_id'=>$request->employee_id,
                'date'=>$request->date,
                'description'=>$request->description,
            ]);
            if ($request->name_path) {
                $file = $request->file('name_path');
                $fileName = $file->getClientOriginalName();
                $file->move(public_path('images'), $fileName);
                $fileLocation = 'images/' . $fileName;

                if (!$activity->images()->exists()) {
                    $activity->images()->create([
                        'name_path' => $fileLocation,
                        'imageable_id' => $activity->id,
                        'imageable_type' => Activity::class
                    ]);
                } else {
                    $activity->images()->update([
                        'name_path' => $fileLocation,
                        'imageable_id' => $activity->id,
                        'imageable_type' => Activity::class
                    ]);
                }
            }
            DB::commit();
            toast('Data activity berhasil disimpan!!','success');
            return redirect()->route('activity.index',$activity);
        }
        catch (\Exception $exception)
        {
            DB::rollBack();
            toast('Data activity gagal disimpan!!','error');
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $activity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function edit(Activity $activity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activity $activity)
    {
        try {
            $message = [
                'required'=>'Wajib Di isi!!'
            ];
            $request->validate([
                'name'=>'required',
                'employee_id'=>'required',
                'date'=>'required',
                'description'=>'required',
            ],$message);
            $activity->update([
                'name'=>$request->name,
                'employee_id'=>$request->employee_id,
                'date'=>$request->date,
                'description'=>$request->description,
            ]);
            if ($request->name_path)
            {
                $file = $request->input('name_path');
                $fileName = $file->getClientOriginalName();
                $file->move(public_path('images'),$fileName);
                $fileLocation = 'images/'.$fileName;

                if (!$activity->images()->exists())
                {
                    $activity->images()->create([
                        'name_path'=>$fileLocation,
                        'imageable_id'=>$activity->id,
                        'imageable_type'=>Activity::class
                    ]);
                }
                else
                {
                    $activity->images()->update([
                        'name_path'=>$fileLocation,
                        'imageable_id'=>$activity->id,
                        'imageable_type'=>Activity::class
                    ]);
                }
            }
            DB::commit();
            toast('Data activity berhasil diedit!!','success');
            return redirect()->route('activity.index',$activity);
        }
        catch (\Exception $exception)
        {
            DB::rollBack();
            toast('Data activity gagal diedit!!','error');
            return back();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $activity)
    {
        try {
            $activity->delete();
            $activity->images()->delete();

            DB::commit();
            toast('Data berhasil dihapus!!','success');
            return back();
        }
        catch (\Exception $exception)
        {
            DB::rollBack();
            toast('Data gagal dihapus','error');
            return back();
        }
    }
}
