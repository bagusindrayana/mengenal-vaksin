<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Curhat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CurhatController extends Controller
{
    public function index()
    {
        return view('curhat.index');
    }

    public function store(Request $request)
    {
        $curhat = Curhat::where('ip',Helper::get_client_ip())->first();
        if($curhat){
            return redirect()->back()->with('error', 'Kamu sudah pernah curhat sebelumnya')->withInput($request->all());
        } else {
            DB::beginTransaction();
            try {
                $curhat = new Curhat;
                $curhat->ip = Helper::get_client_ip();
                $curhat->user_agent = Helper::get_user_agent();
                $curhat->isi_curhat = $request->isi_curhat;
                $curhat->save();
                DB::commit();
                return redirect()->back()->with('success', 'Curhatan kamu telah terkirim');
            } catch (\Throwable $th) {
                return redirect()->back()->with('error', 'Curhatan kamu gagal terkirim :( : '.$th->getMessage())->withInput($request->all());
            }
        }
    }
}
