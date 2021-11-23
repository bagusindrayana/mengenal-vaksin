<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Models\QuizPilihan;
use App\Models\Vaksin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $quizs = Quiz::paginate(10);
        return view('admin.quiz.index',compact('quizs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $vaksins = Vaksin::all();
        return view('admin.quiz.create',compact('vaksins'));
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
            'soal' => 'required',
        ]);
        
        DB::beginTransaction();
        try {
            $pilihan_benar = 0;
            $quiz = new Quiz;
            $quiz->vaksin_id = $request->vaksin_id;
            $quiz->soal = $request->soal;
            $quiz->pilihan_benar = $pilihan_benar;
            $quiz->save();
            
            foreach ($request->pilihan as $index => $pilihan) {
                $pil = new QuizPilihan;
                $pil->pilihan = $pilihan;
                $pil->quiz_id = $quiz->id;
                $pil->save();
                if($index == (int)$request->pilihan_benar){
                    $pilihan_benar = $pil->id;
                }
                
            }
            $quiz->pilihan_benar = $pilihan_benar;
            $quiz->save();
            DB::commit();
            return redirect()->route('quiz.index')->with('success','Data berhasil ditambahkan');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back()->with('error','Data gagal ditambahkan : '.$th->getMessage());
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function show(Quiz $quiz)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function edit(Quiz $quiz)
    {   
        $vaksins = Vaksin::all();
        return view('admin.quiz.edit',['data'=>$quiz,'vaksins'=>$vaksins]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quiz $quiz)
    {   
        $request->validate([
            'soal' => 'required',
           
        ]);

        DB::beginTransaction();
        try {
            
            $quiz->soal = $request->soal;
            $quiz->save();
            
            DB::commit();
            return redirect()->route('quiz.index')->with('success','Data berhasil diubah');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back()->with('error','Data gagal diubah : '.$th->getMessage());
        }
        
        

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quiz $quiz)
    {   
        DB::beginTransaction();
        try {
            $quiz->delete();
            DB::commit();
            return redirect()->route('quiz.index')->with('success','Data berhasil dihapus');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back()->with('error','Data gagal dihapus : '.$th->getMessage());
        }
    }
}
