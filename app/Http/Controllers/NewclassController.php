<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Employee;
use App\Newclass;
use App\Room;
use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewclassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $customers = Customer::where('status_customer','Siswa')->latest()->paginate();
        $rooms = Room::all();
        if ($request->input('query'))
        {
            $search = $request->input('query');
            $newclasses = Newclass::whereHas('room',function ($query) use ($search){
                $query->where('name', 'like', '%' . $search . '%');})
                ->orWhereHas('customer',function ($query) use ($search){
                    $query->where('name', 'like', '%' . $search . '%');})
                ->paginate();
        }
        else
        {
            $newclasses = Newclass::latest()->paginate();
        }

        return view('backend.newClasses.index',compact('newclasses','rooms','customers'));
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
                'customer_id'=>'required',
                'room_id'=>'required',
                'description'=>'required',
            ],$message);
            $newclass = Newclass::create([
                'customer_id'=>$request->customer_id,
                'room_id'=>$request->room_id,
                'description'=>$request->description
            ]);
            toast('Data New class berhasil disimpan!!','success');
            DB::commit();
            return redirect()->route('newclass.index',$newclass);
        }
        catch (\Exception $exception)
        {
            toast('Data New class gagal disimpan!!','error');
            DB::rollBack();
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Newclass  $newclass
     * @return \Illuminate\Http\Response
     */
    public function show(Newclass $newclass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Newclass  $newclass
     * @return \Illuminate\Http\Response
     */
    public function edit(Newclass $newclass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Newclass  $newclass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Newclass $newclass)
    {
        try {
            $message = [
                'required'=>'Wajib Diisi!!'
            ];
            $request->validate([
                'name_class'=>'required',
                'customer_id'=>'required',
                'start_date'=>'required',
                'description'=>'required'
            ],$message);
            $newclass->update([
                'name_class'=>$request->name_class,
                'customer_id'=>$request->customer_id,
                'start_date'=>$request->start_date,
                'description'=>$request->description
            ]);
            toast('Data New class berhasil diedit!!','success');
            DB::commit();
            return redirect()->route('newclass.index',$newclass);
        }
        catch (\Exception $exception)
        {
            toast('Data New class gagal diedit!!','error');
            DB::rollBack();
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Newclass  $newclass
     * @return \Illuminate\Http\Response
     */
    public function destroy(Newclass $newclass)
    {
        try {

            $newclass->delete();
            toast('Data New class berhasil dihapus!!','success');
            DB::commit();
            return redirect()->route('newclass.index',$newclass);
        }
        catch (\Exception $exception)
        {
            toast('Data New class gagal dihapus!!','error');
            DB::rollBack();
            return back();
        }
    }
}
