<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Room;
use App\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoomController extends Controller
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
            $rooms = Room::where('name','LIKE',"%$query%")->paginate();
        }
        else
        {
            $rooms = Room::latest()->paginate();
        }

        return view('backend.rooms.index',compact('rooms','employees'));
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
                'required'=>'Wajib Di Isi!!'
            ];
            $request->validate([
                'employee_id'=>'required',
                'name'=>'required',
                'room'=>'required',
                'description'=>'required',
            ],$message);
            $room = Room::create([
                'employee_id'=>$request->employee_id,
                'name'=>$request->name,
                'room'=>$request->room,
                'description'=>$request->description,
                'ujian'=>$request->input('ujian') ?: null,
                'rapor'=>$request->input('rapor') ?: null,
                'wisuda'=>$request->input('wisuda') ?: null
            ]);
            DB::commit();
            toast('Data berhasil ditambah','success');
            return redirect()->route('room.index',$room);
        }
        catch (\Exception $exception)
        {
            DB::rollBack();
            toast('Data gagal ditambah','error');
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        $room->update([
            'employee_id'=>$request->employee_id,
            'name'=>$request->name,
            'room'=>$request->room,
            'description'=>$request->description,
            'ujian'=>$request->input('ujian') ?: null,
            'rapor'=>$request->input('rapor') ?: null,
            'wisuda'=>$request->input('wisuda') ?: null
        ]);
        return redirect()->route('room.index',$room);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        try {

            $room->delete();
            DB::commit();
            toast('Data berhasil dihapus','success');
            return redirect()->route('room.index',$room);
        }
        catch (\Exception $exception)
        {
            DB::rollBack();
            toast('Data gagal dihapus','error');
            return back();
        }
    }
    public function jadwal(Request $request, Room $room)
    {

    }
}
