<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Vaksin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuizController extends Controller
{   

    public function index()
    {
        $quizs = Quiz::inRandomOrder()->get();
        return view('quiz.index',compact('quizs'));
    }

    public function jawabAll(Request $request)
    {   
        DB::beginTransaction();
        try {
            $quizs = Quiz::inRandomOrder()->get();
            $jumlahSoal =count($quizs);
            $myAnswer = $request->pilihan;
            $correctAnswer = [];
            $wrongAnswer = [];
            foreach ($request->pilihan as $key => $value) {
                $quiz = Quiz::find($key);
                if($quiz->pilihan_benar == $value){
                    $correctAnswer[] = $quiz->id;
                } else {
                    $wrongAnswer[] = $quiz->id;
                }
            }
            $score = count($correctAnswer)/$jumlahSoal*100;
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back()->with('error', 'Jawaban kamu gagal terkirim :( : '.$th->getMessage())->withInput($request->all());
        }

        return view('quiz.result',compact('quizs','correctAnswer','wrongAnswer','myAnswer','score'));
    }

    public function show($slug)
    {
        $vaksin = Vaksin::with('Quiz')->where('slug',$slug)->first();
        if(!$vaksin){
            abort(404);
        }
        return view('quiz.show',compact('vaksin'));
    }

    public function jawab(Request $request,$slug)
    {
        $vaksin = Vaksin::with('Quiz')->where('slug',$slug)->first();
        if(!$vaksin){
            abort(404);
        }
        $jumlahSoal = $vaksin->quiz->count();
        $myAnswer = $request->pilihan;
        $correctAnswer = [];
        $wrongAnswer = [];
        foreach ($request->pilihan as $key => $value) {
            $quiz = Quiz::find($key);
            if($quiz->pilihan_benar == $value){
                $correctAnswer[] = $quiz->id;
            } else {
                $wrongAnswer[] = $quiz->id;
            }
        }

        // if($jumlahSoal == count($correctAnswer)){
        //     echo "okoc";
        // } else {
        //     echo "salah";
        // }

        return view('quiz.show',compact('vaksin','correctAnswer','wrongAnswer','myAnswer'));
    }
}
