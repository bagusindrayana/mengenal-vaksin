<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $users = User::paginate(10);
        return view('admin.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
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
            'nama_user' => 'required',
            'isi_user' => 'required',
        ]);
        
        DB::beginTransaction();
        try {
            $datas = $request->all();
            $datas['password'] = bcrypt($request->password);
            $user = User::create($datas);
            DB::commit();
            return redirect()->route('user.index')->with('success','Data berhasil ditambahkan');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back()->with('error','Data gagal ditambahkan : '.$th->getMessage())->withInpus($request->all());
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {   
        return view('admin.user.edit',['data'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {   
        $request->validate([
            'nama_user' => 'required',
            'isi_user' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $datas = $request->all();
            if($request->has('password')){
                $datas['password'] = bcrypt($request->password);
            }
            $user->update($datas);
            
            DB::commit();
            return redirect()->route('user.index')->with('success','Data berhasil diubah');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back()->with('error','Data gagal diubah : '.$th->getMessage())->withInpus($request->all());
        }
        
        

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {   
        DB::beginTransaction();
        try {
            $user->delete();
            DB::commit();
            return redirect()->route('user.index')->with('success','Data berhasil dihapus');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back()->with('error','Data gagal dihapus : '.$th->getMessage());
        }
    }
}
