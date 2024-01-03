<?php

namespace App\Http\Controllers;

use App\Carrier;
use App\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarrierController extends Controller
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
            $carriers = Carrier::where('name','LIKE',"%$query%")->paginate();
        }
        else
        {
            $carriers = Carrier::latest()->paginate();
        }

        return view('backend.carriers.index',compact('carriers'));
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
                'name'=>'required',
                'description'=>'required',
            ],$message);
            $carrier = Carrier::create([
                'name'=>$request->name,
                'description'=>$request->description
            ]);

            if ($request->name_path)
            {
                $file = $request->file('name_path');
                $fileName = $file->getClientOriginalName();
                $file->move(public_path('images'),$fileName);
                $fileLocation ='images/'.$fileName;

                if(!$carrier->images()->exists())
                {
                    $carrier->images()->create([
                        'name_path'=>$fileLocation,
                        'imageable_id'=>$carrier->id,
                        'imageable_type'=>Carrier::class
                    ]);
                }
                else
                {
                    $carrier->images()->update([
                        'name_path'=>$fileLocation,
                        'imageable_id'=>$carrier->id,
                        'imageable_type'=>Carrier::class
                    ]);
                }

            }

            toast('Data berhasil disimpan!!','success');
            DB::commit();
            return redirect()->route('carrier.index',$carrier);
        }
        catch (\Exception $exception)
        {
            toast('Data gagal disimpan!!','error');
            DB::rollBack();
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Carrier  $carrier
     * @return \Illuminate\Http\Response
     */
    public function show(Carrier $carrier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Carrier  $carrier
     * @return \Illuminate\Http\Response
     */
    public function edit(Carrier $carrier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Carrier  $carrier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carrier $carrier)
    {
        try {
            $message = [
                'required'=>'Wajib Diisi!!'
            ];
            $request->validate([
                'name'=>'required',
                'description'=>'required',
            ],$message);
            $carrier->update([
                'name'=>$request->name,
                'description'=>$request->description
            ]);

            if ($request->name_path)
            {
                $file = $request->file('name_path');
                $fileName = $file->getClientOriginalName();
                $file->move(public_path('images'),$fileName);
                $fileLocation ='images/'.$fileName;

                if(!$carrier->images()->exists())
                {
                    $carrier->images()->create([
                        'name_path'=>$fileLocation,
                        'imageable_id'=>$carrier->id,
                        'imageable_type'=>Carrier::class
                    ]);
                }
                else
                {
                    $carrier->images()->update([
                        'name_path'=>$fileLocation,
                        'imageable_id'=>$carrier->id,
                        'imageable_type'=>Carrier::class
                    ]);
                }

            }

            toast('Data berhasil diedit!!','success');
            DB::commit();
            return redirect()->route('carrier.index',$carrier);
        }
        catch (\Exception $exception)
        {
            toast('Data gagal diedit!!','error');
            DB::rollBack();
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Carrier  $carrier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carrier $carrier)
    {
        try {
            $carrier->delete();
            $carrier->images()->delete();
            toast('Data berhasil dihapus!!','success');
            DB::commit();
            return redirect()->route('carrier.index',$carrier);
        }
        catch (\Exception $exception)
        {
            toast('Data gagal dihapus!!','error');
            DB::rollBack();
            return back();
        }
    }
}
