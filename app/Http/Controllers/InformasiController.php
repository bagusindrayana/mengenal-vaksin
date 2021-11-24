<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use Illuminate\Http\Request;

class InformasiController extends Controller
{
    public function show($slug)
    {
        $informasi = Informasi::where('slug', $slug)->first();
        if(!$informasi){
            abort(404);
        }
        return view('informasi.show', compact('informasi'));
    }
}
