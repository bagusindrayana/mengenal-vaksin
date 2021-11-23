@extends('layouts.app')

@push('scripts')
    <script>
        function closeAlert() {
            document.getElementById("container-alert").classList.add("animate__fadeOut");
            setTimeout(() => {
                document.getElementById("container-alert").style.display = "none"; 
            }, 1000);
        }
    </script>
@endpush

@push('styles')
<style>
    @-webkit-keyframes trophy {
        0% {
            transform: translateY(500px);
            opacity: 0;
        }

        35% {
            opacity: 0;
        }

        100% {
            transform: translateY(0px);
            opacity: 1;
        }
    }

    @keyframes trophy {
        0% {
            transform: translateY(500px);
            opacity: 0;
        }

        35% {
            opacity: 0;
        }

        100% {
            transform: translateY(0px);
            opacity: 1;
        }
    }

    @-webkit-keyframes fly--up {
        0% {
            transform: translateY(10px);
            opacity: 0;
        }

        60% {
            opacity: 1;
        }

        80% {
            transform: translateY(-20vw);
        }

        100% {
            transform: translateY(-15vw);
            opacity: 0;
        }
    }

    @keyframes fly--up {
        0% {
            transform: translateY(10px);
            opacity: 0;
        }

        60% {
            opacity: 1;
        }

        80% {
            transform: translateY(-20vw);
        }

        100% {
            transform: translateY(-15vw);
            opacity: 0;
        }
    }

    @-webkit-keyframes fly--down {
        0% {
            transform: translateY(-10px);
            opacity: 0;
        }

        60% {
            opacity: 1;
        }

        80% {
            transform: translateY(20vw);
        }

        100% {
            transform: translateY(15vw);
            opacity: 0;
        }
    }

    @keyframes fly--down {
        0% {
            transform: translateY(-10px);
            opacity: 0;
        }

        60% {
            opacity: 1;
        }

        80% {
            transform: translateY(20vw);
        }

        100% {
            transform: translateY(15vw);
            opacity: 0;
        }
    }

    @-webkit-keyframes fly--left {
        0% {
            transform: translateX(10px);
            opacity: 0;
        }

        60% {
            opacity: 1;
        }

        80% {
            transform: translateX(-35vw);
        }

        100% {
            transform: translateX(-180px);
            opacity: 0;
        }
    }

    @keyframes fly--left {
        0% {
            transform: translateX(10px);
            opacity: 0;
        }

        60% {
            opacity: 1;
        }

        80% {
            transform: translateX(-35vw);
        }

        100% {
            transform: translateX(-180px);
            opacity: 0;
        }
    }

    @-webkit-keyframes fly--right {
        0% {
            transform: translateX(-10px);
            opacity: 0;
        }

        60% {
            opacity: 1;
        }

        80% {
            transform: translateX(35vw);
        }

        100% {
            transform: translateX(180px);
            opacity: 0;
        }
    }

    @keyframes fly--right {
        0% {
            transform: translateX(-10px);
            opacity: 0;
        }

        60% {
            opacity: 1;
        }

        80% {
            transform: translateX(35vw);
        }

        100% {
            transform: translateX(180px);
            opacity: 0;
        }
    }

    @-webkit-keyframes fly--up--left {
        0% {
            transform: rotate(135deg) translate(0vw, 0vw);
            opacity: 0;
        }

        60% {
            opacity: 1;
        }

        100% {
            transform: rotate(135deg) translate(-3vw, 20vw);
            opacity: 0;
        }
    }

    @keyframes fly--up--left {
        0% {
            transform: rotate(135deg) translate(0vw, 0vw);
            opacity: 0;
        }

        60% {
            opacity: 1;
        }

        100% {
            transform: rotate(135deg) translate(-3vw, 20vw);
            opacity: 0;
        }
    }

    @-webkit-keyframes fly--up--right {
        0% {
            transform: rotate(45deg);
            opacity: 0;
        }

        60% {
            opacity: 1;
        }

        100% {
            transform: rotate(45deg) translate(-3vw, -20vw);
            opacity: 0;
        }
    }

    @keyframes fly--up--right {
        0% {
            transform: rotate(45deg);
            opacity: 0;
        }

        60% {
            opacity: 1;
        }

        100% {
            transform: rotate(45deg) translate(-3vw, -20vw);
            opacity: 0;
        }
    }

    @-webkit-keyframes fly--down--left {
        0% {
            transform: rotate(45deg) translate(0vw, 0vw);
            opacity: 0;
        }

        60% {
            opacity: 1;
        }

        100% {
            transform: rotate(45deg) translate(-3vw, 20vw);
            opacity: 0;
        }
    }

    @keyframes fly--down--left {
        0% {
            transform: rotate(45deg) translate(0vw, 0vw);
            opacity: 0;
        }

        60% {
            opacity: 1;
        }

        100% {
            transform: rotate(45deg) translate(-3vw, 20vw);
            opacity: 0;
        }
    }

    @-webkit-keyframes fly--down--right {
        0% {
            transform: rotate(135deg) translate(0vw, 0vw);
            opacity: 0;
        }

        60% {
            opacity: 1;
        }

        100% {
            transform: rotate(135deg) translate(0vw, -20vw);
            opacity: 0;
        }
    }

    @keyframes fly--down--right {
        0% {
            transform: rotate(135deg) translate(0vw, 0vw);
            opacity: 0;
        }

        60% {
            opacity: 1;
        }

        100% {
            transform: rotate(135deg) translate(0vw, -20vw);
            opacity: 0;
        }
    }


    #container-alert {
        overflow: hidden;
        position: fixed;
        width: 100vw;
        height: 100vh;
        z-index: 99999;
        background-color: rgba(15, 15, 15, 0.7);
        top: 0;
        bottom: 0;
    }

    .trophy {
        z-index: 1;
        background-color: #fff;
        height: 100%;
        width: 100%;
        border-radius: 100%;
        -webkit-animation: trophy 0.5s 1 forwards;
        animation: trophy 0.5s 1 forwards;
        text-align: center;
    }

    .action {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .action .confetti--purple,
    .action .confetti {
        z-index: -1;
        position: absolute;
        height: 50px;
        width: 10px;
        border-radius: 10px;
        -webkit-animation-fill-mode: forwards;
        animation-fill-mode: forwards;
        -webkit-animation-duration: 0.75s;
        animation-duration: 0.75s;
        -webkit-animation-iteration-count: 1;
        animation-iteration-count: 1;
        transform-origin: center middle;
        opacity: 0;
    }

    .action .confetti {
        top: 0;
        left: calc(50% - 5px);
        background-color: #FFEA00;
        -webkit-animation-name: fly--up;
        animation-name: fly--up;
        -webkit-animation-delay: 0.35s;
        animation-delay: 0.35s;
    }

    .action .confetti.two {
        top: auto;
        bottom: 0;
        -webkit-animation-name: fly--down;
        animation-name: fly--down;
    }

    .action .confetti.three,
    .action .confetti.four {
        top: calc(50% - 5px);
        left: calc(50% - 25px);
        height: 10px;
        width: 50px;
        -webkit-animation-name: fly--left;
        animation-name: fly--left;
    }

    .action .confetti.four {
        -webkit-animation-name: fly--right;
        animation-name: fly--right;
    }

    .action .confetti--purple {
        background-color: #6200EA;
        -webkit-animation-name: fly--up--left;
        animation-name: fly--up--left;
        transform: rotate(135deg);
        -webkit-animation-delay: 0.5s;
        animation-delay: 0.5s;
        left: 20%;
        top: 20%;
    }

    .action .confetti--purple.two {
        -webkit-animation-name: fly--up--right;
        animation-name: fly--up--right;
        left: auto;
        right: 20%;
        transform: rotate(45deg);
    }

    .action .confetti--purple.three {
        top: auto;
        bottom: 20%;
        transform: rotate(45deg);
        -webkit-animation-name: fly--down--left;
        animation-name: fly--down--left;
    }

    .action .confetti--purple.four {
        top: auto;
        bottom: 20%;
        left: auto;
        right: 20%;
        transform: rotate(135deg);
        -webkit-animation-name: fly--down--right;
        animation-name: fly--down--right;
    }
</style>
@endpush

@section('content')
    @if (isset($wrongAnswer) && count($wrongAnswer) == 0)
        <div id="container-alert" class="animate__animated">
            <div class="row">
                <div class="col-md-6 mx-auto p-3 py-5">
                    <div class="bg-white rounded-pill p-3 text-center my-2">
                        <h1 class="text-warning">Yay Jawabanmu Benar Semua</h1>
                    </div>
                </div>
            </div>
            <div class="action">
                
                <div class="trophy text-warning fs-4">
                    <i class="fas fa-check-circle bg-white rounded-circle  fa-10x position-absolute top-50 start-50 translate-middle" ></i>
                </div>
                <div class="confetti"></div>
                <div class="confetti two"></div>
                <div class="confetti three"></div>
                <div class="confetti four"></div>
                <div class="confetti--purple"></div>
                <div class="confetti--purple two"></div>
                <div class="confetti--purple three"></div>
                <div class="confetti--purple four"></div>
            </div>

            <div class="row position-absolute bottom-0 start-50 translate-middle-x">
                <div class="col-md-2 text-center p-5">
                    <button type="button" onclick="closeAlert()" class="btn btn-danger text-white rounded-circle close-container-alert"><i class="fas fa-times"></i></button>
                </div>
            </div>
        </div>
        
    @endif

    @if (isset($wrongAnswer) && count($wrongAnswer) > 0)
        <div id="container-alert" class="animate__animated">
            <div class="row">
                <div class="col-md-6 mx-auto p-3 py-5">
                    <div class="bg-white rounded-pill p-3 text-center my-2">
                        <h2 class="text-danger">Yah jawabannmu ada yang salah :(</h2>
                    </div>
                </div>
            </div>
            <div class="action">
                
                <div class="trophy text-danger fs-4">
                    <i class="fas fa-times-circle bg-white rounded-circle  fa-10x position-absolute top-50 start-50 translate-middle" ></i>
                </div>
                {{-- <div class="confetti"></div>
                <div class="confetti two"></div>
                <div class="confetti three"></div>
                <div class="confetti four"></div>
                <div class="confetti--purple"></div>
                <div class="confetti--purple two"></div>
                <div class="confetti--purple three"></div>
                <div class="confetti--purple four"></div> --}}
            </div>

            <div class="row position-absolute bottom-0 start-50 translate-middle-x">
                <div class="col-md-2 text-center p-5">
                    <button type="button" onclick="closeAlert()" class="btn btn-danger text-white rounded-circle close-container-alert"><i class="fas fa-times"></i></button>
                </div>
            </div>
        </div>
        
    @endif

    <div class="main-content mx-auto pt-5" data-aos="fade-up" >
        <div class="row">
            <div class="col-md-2 text-start">
                <a  href="{{ route('tentang-vaksin.index') }}" type="button" class="btn btn-warning text-white rounded-circle"><i class="fas fa-arrow-left"></i></a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center text-primary py-3">
                <p class="fs-2 fw-bold">Hasil Quiz Pemahaman Vaksinasi Covid-19</p>
            </div>
        </div>
        <div class="row animate__animated animate__fadeInUp fs-4 fw-bold my-5">
            <div  class="col-md-6 mx-auto">
                <div class="row  @if ($score <= 50)
                    text-danger
                @elseif ($score > 50 && $score <= 75)
                    text-warning
                @else
                    text-success
                @endif">
                    <div class="col-6 text-end">
                        Skor : 
                    </div>
                    <div class="col-6 text-start">
                        {{ round($score, 2) }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 text-end">
                        Jumlah Soal : 
                    </div>
                    <div class="col-6 text-start">
                        {{ count($quizs) }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 text-end">
                        Benar : 
                    </div>
                    <div class="col-6 text-start">
                        {{ count($correctAnswer) }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 text-end">
                        Salah : 
                    </div>
                    <div class="col-6 text-start">
                        {{ count($wrongAnswer) }}
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-5">
            <div class="col-md-12 text-center">
                <a href="#result" class="btn btn-primary rounded-pill fs-3 px-5">
                    Lihat Jawaban Quiz <i class="fas fa-arrow-down"></i>
                </a>
            </div>
        </div>
        
    </div>
    <div class="main-content mx-auto" id="result" data-aos="fade-up">
        
        <div class="row">
            <div class="col-md-12 text-center text-primary py-3">
                <p class="fs-1 fw-bold">Quiz Pemahaman Vaksinasi Covid-19</p>
            </div>
        </div>
        <form action="#" method="POST">
            @csrf
            <div class="row mb-3">
                <div class="col-md-12">
                    @foreach ($quizs as $quiz)
                        <div class="card my-3 @if (isset($wrongAnswer) && in_array($quiz->id,$wrongAnswer))
                            bg-danger text-white
                        @endif  @if (isset($correctAnswer) && in_array($quiz->id,$correctAnswer))
                        bg-success text-white
                    @endif" >
                            <div class="card-header">
                                <div class="fw-bold">{!! $quiz->soal !!}</div>
                            </div>
                            <div class="card-body">
                                @foreach ($quiz->QuizPilihan as $pilihan)
                                    <div class="form-check mx-3">
                                        <input readonly class="form-check-input" type="radio" @if (isset($myAnswer) && $myAnswer[$quiz->id] == $pilihan->id)
                                        checked
                                    @endif required name="pilihan[{{ $quiz->id }}]" id="pilihan_{{ $quiz->id }}_{{ $pilihan->id }}" value="{{ $pilihan->id }}">
                                        <label class="form-check-label" for="pilihan_{{ $quiz->id }}_{{ $pilihan->id }}">
                                            {{ $pilihan->pilihan }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <a type="submit" href="{{ route('quiz-vaksin.index') }}" class="btn btn-warning rounded-pill fs-3 px-4 py-2">Ulangi Quiz</a>
                </div>
            </div>
            
        </form>


        

        
    </div>
    
@endsection