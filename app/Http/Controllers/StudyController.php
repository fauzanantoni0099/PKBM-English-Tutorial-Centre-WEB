<?php

namespace App\Http\Controllers;

use App\Study;
use App\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudyController extends Controller
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
            $studies = Study::where('name','LIKE',"%$query%")->paginate();
        }
        else
        {
            $studies = Study::latest()->paginate();
        }

        return view('backend.studies.index',compact('studies'));
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
                'required'=>'Wajib Di Isi'
            ];
            $request->validate([
                'name'=>'required',
                'lesson'=>'required',
                'price'=>'required',
                'description'=>'required',
            ],$message);

            $study = Study::create([
                'name'=>$request->name,
                'lesson'=>$request->lesson,
                'price'=>$request->price,
                'description'=>$request->description,
            ]);

            if ($request->name_path) {
                $file = $request->file('name_path');
                $fileName = $file->getClientOriginalName();
                $file->move(public_path('images'), $fileName);
                $fileLocation = 'images/' . $fileName;

                if (!$study->images()->exists()) {
                    $study->images()->create([
                        'name_path' => $fileLocation,
                        'imageable_id' => $study->id,
                        'imageable_type' => Study::class
                    ]);
                } else {
                    $study->images()->update([
                        'name_path' => $fileLocation,
                        'imageable_id' => $study->id,
                        'imageable_type' => Study::class
                    ]);
                }
            }
            DB::commit();
            toast('Data study berhasil di simpan!!','success');
            return redirect()->route('study.index',$study);

        }
        catch (\Exception $exception)
        {
            toast('Data study gagal di simpan!!','error');
            DB::rollBack();
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Study  $study
     * @return \Illuminate\Http\Response
     */
    public function show(Study $study)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Study  $study
     * @return \Illuminate\Http\Response
     */
    public function edit(Study $study)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Study  $study
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Study $study)
    {
        try {
            $message = [
                'required'=>'Wajib Di Isi'
            ];
            $request->validate([
                'name'=>'required',
                'lesson'=>'required',
                'price'=>'required',
                'description'=>'required',
            ],$message);

            $study->update([
                'name'=>$request->name,
                'lesson'=>$request->lesson,
                'price'=>$request->price,
                'description'=>$request->description,
            ]);

            if ($request->name_path) {
                $file = $request->file('name_path');
                $fileName = $file->getClientOriginalName();
                $file->move(public_path('images'), $fileName);
                $fileLocation = 'images/' . $fileName;

                if (!$study->images()->exists()) {
                    $study->images()->create([
                        'name_path' => $fileLocation,
                        'imageable_id' => $study->id,
                        'imageable_type' => Study::class
                    ]);
                } else {
                    $study->images()->update([
                        'name_path' => $fileLocation,
                        'imageable_id' => $study->id,
                        'imageable_type' => Study::class
                    ]);
                }
            }
            DB::commit();
            toast('Data study berhasil di edit!!','success');
            return redirect()->route('study.index',$study);

        }
        catch (\Exception $exception)
        {
            toast('Data study gagal di edit!!','error');
            DB::rollBack();
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Study  $study
     * @return \Illuminate\Http\Response
     */
    public function destroy(Study $study)
    {
        try {
            $study->delete();
            $study->images()->delete();
            DB::commit();
            toast('Data study berhasil di hapus!!','success');
            return redirect()->route('study.index',$study);

        }
        catch (\Exception $exception)
        {
            toast('Data study gagal di hapus!!','error');
            DB::rollBack();
            return back();
        }
    }
}
