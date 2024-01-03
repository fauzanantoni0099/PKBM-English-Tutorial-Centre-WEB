<?php

namespace App\Http\Controllers;

use App\Folup;
use App\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FolupController extends Controller
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
            $folups = Folup::where('name','LIKE',"%$query%")->paginate();
        }
        else
        {
            $folups = Folup::latest()->paginate();
        }

        return view('backend.folups.index',compact('folups'));
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
                'required'=>'Wajib Diisi!'
            ];
            $request->validate([
                'name'=>'required',
                'phone'=>'required',
                'description'=>'required',
            ],$message);
            $folup = Folup::create([
                'name'=>$request->name,
                'phone'=>$request->phone,
                'description'=>$request->description,
            ]);
            DB::commit();
            toast('Data Berhasil Disimpan!!','success');
            return redirect()->route('folup.index',$folup);
        }
        catch (\Exception $exception)
        {
            DB::rollBack();
            toast('Data Gagal Disimpan!!','error');
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Folup  $folup
     * @return \Illuminate\Http\Response
     */
    public function show(Folup $folup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Folup  $folup
     * @return \Illuminate\Http\Response
     */
    public function edit(Folup $folup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Folup  $folup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Folup $folup)
    {
        try {
            $message = [
                'required'=>'Wajib Diisi!'
            ];
            $request->validate([
                'name'=>'required',
                'phone'=>'required',
                'description'=>'required',
            ],$message);
            $folup->update([
                'name'=>$request->name,
                'phone'=>$request->phone,
                'description'=>$request->description,
            ]);
            DB::commit();
            toast('Data Berhasil Diedit!!','success');
            return redirect()->route('folup.index',$folup);
        }
        catch (\Exception $exception)
        {
            DB::rollBack();
            toast('Data Gagal Diedit!!','error');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Folup  $folup
     * @return \Illuminate\Http\Response
     */
    public function destroy(Folup $folup)
    {
        try {
            $folup->delete();
            DB::commit();
            toast('Data Berhasil Dihapus!!','success');
            return redirect()->route('folup.index',$folup);
        }
        catch (\Exception $exception)
        {
            DB::rollBack();
            toast('Data Gagal Dihapus!!','error');
            return back();
        }
    }
}
