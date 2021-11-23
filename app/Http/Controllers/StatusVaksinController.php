<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatusVaksinController extends Controller
{
    public function sudah()
    {
        return view('status-vaksin.sudah');
    }

    public function belum()
    {
        return view('status-vaksin.belum');
    }
}
