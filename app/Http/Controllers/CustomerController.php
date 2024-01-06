<?php

namespace App\Http\Controllers;

use App\Book;
use App\Customer;
use App\Employee;
use App\Order;
use App\Product;
use App\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Psy\Util\Str;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $employees = Employee::latest()->paginate();
        $programs = Program::latest()->paginate();
        $books = Book::all();
        $customerss = Customer::count();
        if ($request->input('query'))
        {
            $query = $request->input('query');
            $customers = Customer::where('name','LIKE',"%$query%")->paginate();
        }
        else
        {
            $customers = Customer::latest()->paginate();
        }


        return view('backend.customers.index',compact('customers','customerss','employees','books','programs'));
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
                'required'=>'Wajib disi!!'
            ];
            $request->validate([
                'date'=>'required',
                'employee_id'=>'required',
                'program_id'=>'required',
                'book_id'=>'required',
                'class_room'=>'required',
                'price_class'=>'required',
                'register'=>'required',
                'status_customer'=>'required',
                'name'=>'required',
                'gender'=>'required',
                'birth_date'=>'required',
                'school'=>'required',
                'address'=>'required',
                'phone'=>'required',
                'status'=>'required',
                'payment_status'=>'required',
                'payment_price'=>'required',
                'name_path' => 'required|file|mimes:jpeg,png,pdf,jpg'
            ],$message);

            if ($request->input('status_customer') == 'Siswa')
            {
                $npsn = str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT);
            }
            else
            {
                $npsn = "-";
            }

            $customer = Customer::create([
                'npsn'=> $npsn,
                'date'=>$request->date,
                'employee_id'=>$request->employee_id,
                'program_id'=>$request->program_id,
                'book_id'=>$request->book_id,
                'class_room'=>$request->class_room,
                'price_class'=>$request->price_class,
                'register'=>$request->register,
                'status_customer'=>$request->status_customer,
                'name'=>$request->name,
                'gender'=>$request->gender,
                'birth_date'=>$request->birth_date,
                'school'=>$request->school,
                'address'=>$request->address,
                'phone'=>$request->phone,
                'status'=>$request->status,
                'payment_status'=>$request->payment_status,
                'payment_price'=>$request->payment_price,
                'remaining_payment'=>$request->payment_price - $request->price_class,
            ]);


            if ($name_path=$request->input('name_path'))
            {
                $file = $request->file('name_path');
                $fileName = $file->getClientOriginalName();
                $file->move(public_path('images'),$fileName);
                $fileLocation ='images/'.$fileName;

                $customer->images()->create([
                     $name_path =>$fileLocation,
                    'imageable_id'=>$customer->id,
                    'imageable_type'=>Customer::class
                ]);
            }
            $book = Book::find($request->book_id);
            if ($customer->payment_status == 'lunas')
            {
                $ss = 1;
                $book->decrement('stock',$ss);
            }

            toast('Data kostumer berhasil disimpan!!','success');
            DB::commit();
            return redirect()->route('customer.index',$customer);
        }
        catch (Exception $exception)
        {
            toast('Data kostumer gagal disimpan!!','error');
            DB::commit();
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        try {
            $message = [
                'required'=>'Wajib disi!!'
            ];
            $request->validate([
                'date'=>'required',
                'employee_id'=>'required',
                'program_id'=>'required',
                'book_id'=>'required',
                'class_room'=>'required',
                'price_class'=>'required',
                'register'=>'required',
                'status_customer'=>'required',
                'name'=>'required',
                'gender'=>'required',
                'birth_date'=>'required',
                'school'=>'required',
                'address'=>'required',
                'phone'=>'required',
                'status'=>'required',
                'payment_status'=>'required',
                'payment_price'=>'required',
                'name_path' => 'required|file|mimes:jpeg,png,pdf,jpg'
            ],$message);

            $customer->update([
                'date'=>$request->date,
                'employee_id'=>$request->employee_id,
                'program_id'=>$request->program_id,
                'book_id'=>$request->book_id,
                'class_room'=>$request->class_room,
                'price_class'=>$request->price_class,
                'register'=>$request->register,
                'status_customer'=>$request->status_customer,
                'name'=>$request->name,
                'gender'=>$request->gender,
                'birth_date'=>$request->birth_date,
                'school'=>$request->school,
                'address'=>$request->address,
                'phone'=>$request->phone,
                'status'=>$request->status,
                'payment_status'=>$request->payment_status,
                'payment_price'=>$request->payment_price,
                'remaining_payment'=>$request->payment_price - $request->price_class,
            ]);

            if ($request->name_path)
            {
                $file = $request->file('name_path');
                $fileName = $file->getClientOriginalName();
                $file->move('images',$fileName);
                $fileLocation ='images/'.$fileName;

                if(!$customer->images()->exists())
                {
                    $customer->images()->create([
                        'name_path'=>$fileLocation,
                        'imageable_id'=>$customer->id,
                        'imageable_type'=>Customer::class
                    ]);
                }
                else
                {
                    $customer->images()->update([
                        'name_path'=>$fileLocation,
                        'imageable_id'=>$customer->id,
                        'imageable_type'=>Customer::class
                    ]);
                }

            }
            $book = Book::find($request->book_id);
            if ($customer->payment_status == 'belum dibayar')
            {
                $ss = 1;
                $book->increment('stock',$ss);
            }

            toast('Data kostumer berhasil diedit!!','success');
            DB::commit();
            return redirect()->route('customer.index',$customer);
        }
        catch (Exception $exception)
        {
            toast('Data kostumer gagal diedit!!','error');
            DB::commit();
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        try {
            $customer->delete();
            $customer->images()->delete();

            toast('Data kostomer berhasil dihapus!!','success');
            DB::commit();
            return redirect()->route('customer.index',$customer);
        }
        catch (Exception $exception)
        {
            toast('Data kostomer gagal dihapus!!','error');
            DB::rollBack();
            return back();
        }
    }
    public function siswa()
    {
        $customers = Customer::where('status_customer','Siswa')->latest()->paginate();

        return view('backend.tables.siswa',compact('customers'));
    }
    public function nonSiswa()
    {
        $customers = Customer::where('status_customer','Non Siswa')->latest()->paginate();

        return view('backend.tables.nonsiswa',compact('customers'));
    }
    public function incomingDaily()
    {
        $tanggal = request()->input('tanggal');
        $customers =Customer::latest()->whereDate('created_at',$tanggal)->get();
        return view('backend.incomings.incomingdaily',compact('customers','tanggal'));
    }
    public function incomingMonthly()
    {
        $bulan = request()->input('bulan');
        $tahun = request()->input('tahun');
        $customers =Customer::latest()->whereMonth('created_at',$bulan)->whereYear('created_at',$tahun)->get();

        return view('backend.incomings.incomingmonthly',compact('customers','bulan','tahun'));
    }
    public function incomingAnnual()
    {
        $tahun = request()->input('tahun');
        $customers =Customer::latest()->whereYear('created_at',$tahun)->get();
        return view('backend.incomings.incomingannual',compact('customers','tahun'));
    }
}
