<?php

namespace App\Http\Controllers;

use App\Book;
use App\Employee;
use App\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestimonialController extends Controller
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
            $testimonials = Testimonial::where('name','LIKE',"%$query%")->paginate();
        }
        else
        {
            $testimonials = Testimonial::latest()->paginate();
        }

        return view('backend.testimonials.index',compact('testimonials'));
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
                'name'=>'required',
                'job'=>'required',
                'description'=>'required',
                'name_path'=>'|mimes:pdf,jpeg,png,jpg'
            ],$message);
            $testimonial = Testimonial::create([
                'name'=>$request->name,
                'job'=>$request->job,
                'description'=>$request->description,
            ]);
            if ($request->name_path)
            {
                $file = $request->file('name_path');
                $fileName = $file->getClientOriginalName();
                $file->move(public_path('images'),$fileName);
                $fileLocation ='images/'.$fileName;

                if(!$testimonial->images()->exists())
                {
                    $testimonial->images()->create([
                        'name_path'=>$fileLocation,
                        'imageable_id'=>$testimonial->id,
                        'imageable_type'=>Testimonial::class
                    ]);
                }
                else
                {
                    $testimonial->images()->update([
                        'name_path'=>$fileLocation,
                        'imageable_id'=>$testimonial->id,
                        'imageable_type'=>Testimonial::class
                    ]);
                }

            }
            DB::commit();
            toast('Data Testimonial berhasil disimpan!!','success');
            return redirect()->route('testimonial.index',$testimonial);

        }
        catch (\Exception $exception)
        {
            DB::rollBack();
            toast('Data Testimonial gagal disimpan!!','error');
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        try {
            $message = [
                'required'=>'Wajib Di Isi!!'
            ];
            $request->validate([
                'name'=>'required',
                'job'=>'required',
                'description'=>'required',
                'name_path'=>'|mimes:pdf,jpeg,png,jpg'
            ],$message);
            $testimonial->update([
                'name'=>$request->name,
                'job'=>$request->job,
                'description'=>$request->description,
            ]);
            if ($request->name_path)
            {
                $file = $request->file('name_path');
                $fileName = $file->getClientOriginalName();
                $file->move(public_path('images'),$fileName);
                $fileLocation ='images/'.$fileName;

                if(!$testimonial->images()->exists())
                {
                    $testimonial->images()->create([
                        'name_path'=>$fileLocation,
                        'imageable_id'=>$testimonial->id,
                        'imageable_type'=>Testimonial::class
                    ]);
                }
                else
                {
                    $testimonial->images()->update([
                        'name_path'=>$fileLocation,
                        'imageable_id'=>$testimonial->id,
                        'imageable_type'=>Testimonial::class
                    ]);
                }

            }
            DB::commit();
            toast('Data Testimonial berhasil diedit!!','success');
            return redirect()->route('testimonial.index',$testimonial);

        }
        catch (\Exception $exception)
        {
            DB::rollBack();
            toast('Data Testimonial gagal diedit!!','error');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
        try {
            $testimonial->delete();
            $testimonial->images()->delete();
            DB::commit();
            toast('Data Testimonial berhasil dihapus!!','success');
            return redirect()->route('testimonial.index',$testimonial);

        }
        catch (\Exception $exception)
        {
            DB::rollBack();
            toast('Data Testimonial gagal dihapus!!','error');
            return back();
        }
    }
}
