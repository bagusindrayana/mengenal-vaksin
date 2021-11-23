<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Curhat;
use Illuminate\Http\Request;

class CurhatController extends Controller
{
    public function index()
    {
        $curhats = Curhat::paginate(10);
        return view('admin.curhat.index',compact('curhats'));
    }
}
