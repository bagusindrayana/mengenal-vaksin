<?php

namespace App\Http\Controllers;

use App\Models\Vaksin;
use Illuminate\Http\Request;

class TentangVaksinController extends Controller
{
    public function index()
    {   
        $vaksins = Vaksin::all();
        return view('tentang-vaksin.index',compact('vaksins'));
    }

    public function show($slug)
    {
        $vaksin = Vaksin::where('slug',$slug)->first();
        return view('tentang-vaksin.show',compact('vaksin'));
    }
}
