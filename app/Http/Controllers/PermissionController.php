<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
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
            $permissions = Permission::where('name','LIKE',"%$query%")->paginate();
        }
        else
        {
            $permissions = Permission::latest()->paginate();
        }

        return view('backend.permissions.index',compact('permissions'));
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
                'required'=>'Wajib diisi!'
            ];
                $request->validate([
                    'name' => 'required',
                ],$message);
                Permission::firstOrCreate([
                    'name'=>$request->name
                ]);
                toast('Data berhasil ditambahkan','success');
                DB::commit();
                return redirect()->route('permission.index');
        }
        catch (\Exception $exception)
        {
            toast('Data gagal ditambahkan','error');
            DB::rollBack();
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        try {
            $message = [
                'required'=>'Wajib diisi!'
            ];
            $request->validate([
                'name' => 'required',
            ],$message);
            $permission->update([
                'name'=>$request->name
            ]);
            toast('Data berhasil diubah','success');
            DB::commit();
            return redirect()->route('permission.index');
        }
        catch (\Exception $exception)
        {
            toast('Data gagal diubah','error');
            DB::rollBack();
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        try {
            $permission->delete();
            toast('Data berhasil dihapus','success');
            DB::commit();
            return redirect()->route('permission.index');
        }
        catch (\Exception $exception)
        {
            toast('Data gagal dihapus','error');
            DB::rollBack();
            return back();
        }
    }
}
