<?php

namespace App\Http\Controllers;

use App\Certificate;
use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $certificates = Certificate::latest()->paginate();
        $customers = Customer::latest()->paginate();

        return view('backend.certificates.index',compact('certificates','customers'));
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
                'required'=>'Wajib diisi!!'
            ];
            $request->validate([
                'order_date'=>'required',
                'customer_id'=>'required',
                'certificate_type'=>'required',
                'exam_date'=>'required',
                'expired_date'=>'required',
                'score'=>'required',
                'print_date'=>'required',
                'collection_date'=>'required',
                'status'=>'required',
                'description'=>'required'
            ],$message);

            $certificate = Certificate::create([
                'order_date'=>$request->order_date,
                'customer_id'=>$request->customer_id,
                'certificate_type'=>$request->certificate_type,
                'exam_date'=>$request->exam_date,
                'expired_date'=>$request->expired_date,
                'score'=>$request->score,
                'print_date'=>$request->print_date,
                'collection_date'=>$request->collection_date,
                'status'=>$request->status,
                'description'=>$request->description
            ]);
            toast('Data sertifikat berhasil disimpan!!','success');
            DB::commit();
            return redirect()->route('certificate.index',$certificate);
        }
        catch (Exception $exception)
        {
            toast('Data sertifikat gagal disimpan!!','error');
            DB::rollBack();
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function show(Certificate $certificate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function edit(Certificate $certificate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Certificate $certificate)
    {
        try {
            $message = [
                'required'=>'Wajib diisi!!'
            ];
            $request->validate([
                'order_date'=>'required',
                'customer_id'=>'required',
                'certificate_type'=>'required',
                'exam_date'=>'required',
                'expired_date'=>'required',
                'score'=>'required',
                'print_date'=>'required',
                'collection_date'=>'required',
                'status'=>'required',
                'description'=>'required'
            ],$message);

            $certificate->update([
                'order_date'=>$request->order_date,
                'customer_id'=>$request->customer_id,
                'certificate_type'=>$request->certificate_type,
                'exam_date'=>$request->exam_date,
                'expired_date'=>$request->expired_date,
                'score'=>$request->score,
                'print_date'=>$request->print_date,
                'collection_date'=>$request->collection_date,
                'status'=>$request->status,
                'description'=>$request->description
            ]);
            toast('Data sertifikat berhasil diedit!!','success');
            DB::commit();
            return redirect()->route('certificate.index',$certificate);
        }
        catch (Exception $exception)
        {
            toast('Data sertifikat gagal diedit!!','error');
            DB::rollBack();
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Certificate $certificate)
    {
        try {
            $certificate->delete();
            toast('Data certificate berhasil dihapus!!','success');
            DB::commit();
            return redirect()->route('certificate.index',$certificate);
        }
        catch (Exception $exception)
        {
            toast('Data certificate gagal dihapus!!','error');
            DB::rollBack();
            return back();
        }
    }
}
