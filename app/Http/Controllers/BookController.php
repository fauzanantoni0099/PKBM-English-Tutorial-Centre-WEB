<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
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
            $books = Book::where('name','LIKE',"%$query%")->paginate();
        }
        else
        {
            $books = Book::latest()->paginate();
        }

        return view('backend.books.index',compact('books'));
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
                'stock'=>'required'
            ],$message);

            $book = Book::create([
                'name'=>$request->name,
                'description'=>$request->description,
                'stock'=>$request->stock
            ]);
            toast('Data buku berhasil disimpan','success');
            DB::commit();
            return redirect()->route('book.index',$book);
        }
        catch (\Exception $exception)
        {
            toast('Data buku gagal disimpan!!','error');
            DB::rollBack();
            return back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        try {
            $message = [
                'required'=>'Wajib Diisi!!'
            ];
            $request->validate([
                'name'=>'required',
                'description'=>'required',
                'stock'=>'required'
            ],$message);

            $book->update([
                'name'=>$request->name,
                'description'=>$request->description,
                'stock'=>$request->stock
            ]);
            toast('Data buku berhasil diedit!!','success');
            DB::commit();
            return redirect()->route('book.index',$book);
        }
        catch (\Exception $exception)
        {
            toast('Data buku gagal diedit!!','error');
            DB::rollBack();
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        try {
            $book->delete();
            toast('Data buku berhasil dihapus','success');
            DB::commit();
            return redirect()->route('book.index',$book);
        }
        catch (\Exception $exception)
        {
            toast('Data buku gagal dihapus!!','error');
            DB::rollBack();
            return back();
        }
    }
}
