<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vaksin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VaksinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $vaksins = Vaksin::paginate(10);
        return view('admin.vaksin.index',compact('vaksins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.vaksin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_vaksin' => 'required',
            'deskripsi_vaksin' => 'required',
        ]);
        
        DB::beginTransaction();
        try {
            $gambar_vaksin = '/assets/img/daniel-schludi-ZeMRI9vO71o-unsplash.jpg';
            if($request->has('gambar_vaksin')){
                $local_gambar_vaksin = $request->gambar_vaksin->store('gambar/vaksin','public');
                $uploadedfile = fopen(public_path($local_gambar_vaksin), 'r');  
                $name = 'vaksin/' . $request->gambar_vaksin->getClientOriginalName();
                $uploadedObject  = app('firebase.storage')->getBucket()->upload($uploadedfile, ['name' => $name]); 
                $gambar_vaksin = "https://firebasestorage.googleapis.com/v0/b/info-covid-3bf81.appspot.com/o/".urlencode($name)."?alt=media";
                unlink(public_path($local_gambar_vaksin)); 
                
            }
            $vaksin = new Vaksin;
            $vaksin->nama_vaksin = $request->nama_vaksin;
            $vaksin->deskripsi_vaksin = $request->deskripsi_vaksin;
            $vaksin->gambar_vaksin = $gambar_vaksin;
            $vaksin->slug = \Str::slug($request->nama_vaksin);
            $vaksin->save();
            DB::commit();
            return redirect()->route('vaksin.index')->with('success','Data berhasil ditambahkan');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back()->with('error','Data gagal ditambahkan : '.$th->getMessage())->withInpus($request->all());
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vaksin  $vaksin
     * @return \Illuminate\Http\Response
     */
    public function show(Vaksin $vaksin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vaksin  $vaksin
     * @return \Illuminate\Http\Response
     */
    public function edit(Vaksin $vaksin)
    {   
        return view('admin.vaksin.edit',['data'=>$vaksin]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vaksin  $vaksin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vaksin $vaksin)
    {   
        $request->validate([
            'nama_vaksin' => 'required',
            'deskripsi_vaksin' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $gambar_vaksin = $vaksin->gambar_vaksin;
            if($request->has('gambar_vaksin')){
                $local_gambar_vaksin = $request->gambar_vaksin->store('gambar/vaksin','public');
                $uploadedfile = fopen(public_path($local_gambar_vaksin), 'r');  
                $name = 'vaksin/' . $request->gambar_vaksin->getClientOriginalName();
                $uploadedObject  = app('firebase.storage')->getBucket()->upload($uploadedfile, ['name' => $name]); 
                $gambar_vaksin = "https://firebasestorage.googleapis.com/v0/b/info-covid-3bf81.appspot.com/o/".urlencode($name)."?alt=media";
                unlink(public_path($local_gambar_vaksin));
            }
            $vaksin->nama_vaksin = $request->nama_vaksin;
            $vaksin->deskripsi_vaksin = $request->deskripsi_vaksin;
            $vaksin->gambar_vaksin = $gambar_vaksin;
            $vaksin->slug = \Str::slug($request->nama_vaksin);
            $vaksin->save();
            
            DB::commit();
            return redirect()->route('vaksin.index')->with('success','Data berhasil diubah');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back()->with('error','Data gagal diubah : '.$th->getMessage())->withInpus($request->all());
        }
        
        

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vaksin  $vaksin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vaksin $vaksin)
    {   
        DB::beginTransaction();
        try {
            $vaksin->delete();
            DB::commit();
            return redirect()->route('vaksin.index')->with('success','Data berhasil dihapus');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back()->with('error','Data gagal dihapus : '.$th->getMessage());
        }
    }
}
