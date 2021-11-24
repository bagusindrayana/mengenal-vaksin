<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Informasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $informasis = Informasi::paginate(10);
        return view('admin.informasi.index',compact('informasis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.informasi.create');
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
            'nama_informasi' => 'required',
            'isi_informasi' => 'required',
        ]);
        
        DB::beginTransaction();
        try {
            $gambar_informasi = '/assets/img/daniel-schludi-ZeMRI9vO71o-unsplash.jpg';
            if($request->has('gambar_informasi')){
                $local_gambar_informasi = $request->gambar_informasi->store('gambar/informasi','public');
                $uploadedfile = fopen(public_path($local_gambar_informasi), 'r');  
                $name = 'informasi/' . $request->gambar_informasi->getClientOriginalName();
                $uploadedObject  = app('firebase.storage')->getBucket()->upload($uploadedfile, ['name' => $name]); 
                $gambar_informasi = "https://firebasestorage.googleapis.com/v0/b/info-covid-3bf81.appspot.com/o/".urlencode($name)."?alt=media";
                unlink(public_path($local_gambar_informasi)); 
                
            }
            $informasi = new Informasi;
            $informasi->nama_informasi = $request->nama_informasi;
            $informasi->isi_informasi = $request->isi_informasi;
            $informasi->gambar_informasi = $gambar_informasi;
            $informasi->jenis_informasi = $request->jenis_informasi;
            $informasi->slug = \Str::slug($request->nama_informasi);
            $informasi->save();
            DB::commit();
            return redirect()->route('informasi.index')->with('success','Data berhasil ditambahkan');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back()->with('error','Data gagal ditambahkan : '.$th->getMessage())->withInpus($request->all());
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Informasi  $informasi
     * @return \Illuminate\Http\Response
     */
    public function show(Informasi $informasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Informasi  $informasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Informasi $informasi)
    {   
        return view('admin.informasi.edit',['data'=>$informasi]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Informasi  $informasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Informasi $informasi)
    {   
        $request->validate([
            'nama_informasi' => 'required',
            'isi_informasi' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $gambar_informasi = $informasi->gambar_informasi;
            if($request->has('gambar_informasi')){
                $local_gambar_informasi = $request->gambar_informasi->store('gambar/informasi','public');
                $uploadedfile = fopen(public_path($local_gambar_informasi), 'r');  
                $name = 'informasi/' . $request->gambar_informasi->getClientOriginalName();
                $uploadedObject  = app('firebase.storage')->getBucket()->upload($uploadedfile, ['name' => $name]); 
                $gambar_informasi = "https://firebasestorage.googleapis.com/v0/b/info-covid-3bf81.appspot.com/o/".urlencode($name)."?alt=media";
                unlink(public_path($local_gambar_informasi));
            }
            $informasi->nama_informasi = $request->nama_informasi;
            $informasi->isi_informasi = $request->isi_informasi;
            $informasi->gambar_informasi = $gambar_informasi;
            $informasi->slug = \Str::slug($request->nama_informasi);
            $informasi->jenis_informasi = $request->jenis_informasi;
            $informasi->save();
            
            DB::commit();
            return redirect()->route('informasi.index')->with('success','Data berhasil diubah');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back()->with('error','Data gagal diubah : '.$th->getMessage())->withInpus($request->all());
        }
        
        

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Informasi  $informasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Informasi $informasi)
    {   
        DB::beginTransaction();
        try {
            $informasi->delete();
            DB::commit();
            return redirect()->route('informasi.index')->with('success','Data berhasil dihapus');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back()->with('error','Data gagal dihapus : '.$th->getMessage());
        }
    }
}
