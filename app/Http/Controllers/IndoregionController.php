<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;

class IndoregionController extends Controller
{
    public function from()
    {
        $provinces = Province::all();
        return view('from',compact('provinces'));
    }
    public function getkabupaten(Request $request)
    {
        $id_province = $request->id_province;

        $regencies = Regency::where('province_id',$id_province)->get();

        foreach ($regencies as $regency){
            echo "<option value='$regency->id'>$regency->name</option>";
        }
    }
}
