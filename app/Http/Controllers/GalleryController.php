<?php

namespace App\Http\Controllers;

use App\Carrier;
use App\Gallery;
use App\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GalleryController extends Controller
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
            $galleries = Gallery::where('name','LIKE',"%$query%")->paginate();
        }
        else
        {
            $galleries = Gallery::latest()->paginate();
        }

        return view('backend.galleries.index',compact('galleries'));
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
                'name_path'=>'required',
            ],$message);
            $gallery = Gallery::create([
                'name'=>$request->name,
                'description'=>$request->description
            ]);

            $file = $request->file('name_path');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('images'),$fileName);
            $fileLocation ='images/'.$fileName;
                $gallery->images()->create([
                    'name_path'=>$fileLocation,
                    'imageable_id'=>$gallery->id,
                    'imageable_type'=>Gallery::class
                ]);

            toast('Data Gallery berhasil ditambah!!','success');
            DB::commit();
            return redirect()->route('gallery.index',$gallery);
        }
        catch (\Exception $exception)
        {
            toast('Data Gallery gagal ditambah!!','error');
            DB::rollBack();
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        try {
            $message = [
                'required'=>'Wajib Diisi!!'
            ];
            $request->validate([
                'name'=>'required',
                'description'=>'required',
            ],$message);
            $gallery->update([
                'name'=>$request->name,
                'description'=>$request->description
            ]);

            if ($request->name_path)
            {
                $file = $request->file('name_path');
                $fileName = $file->getClientOriginalName();
                $file->move(public_path('images'),$fileName);
                $fileLocation ='images/'.$fileName;

                if(!$gallery->images()->exists())
                {
                    $gallery->images()->create([
                        'name_path'=>$fileLocation,
                        'imageable_id'=>$gallery->id,
                        'imageable_type'=>Gallery::class
                    ]);
                }
                else
                {
                    $gallery->images()->update([
                        'name_path'=>$fileLocation,
                        'imageable_id'=>$gallery->id,
                        'imageable_type'=>Gallery::class
                    ]);
                }

            }

            toast('Data Gallery berhasil diedit!!','success');
            DB::commit();
            return redirect()->route('gallery.index',$gallery);
        }
        catch (\Exception $exception)
        {
            toast('Data Gallery gagal diedit!!','error');
            DB::rollBack();
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        $gallery->delete();
        $gallery->images()->delete();

        return back();
    }
}
