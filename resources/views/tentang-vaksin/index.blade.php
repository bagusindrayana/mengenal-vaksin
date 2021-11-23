@extends('layouts.app')

@section('content')
    <div class="main-content mx-auto pt-5" id="apa-itu-vaksin" data-aos="fade-up">
        <div class="row">
            <div class="col-md-2 text-start">
                <a  href="{{ url("/") }}" type="button" class="btn btn-warning text-white rounded-circle"><i class="fas fa-arrow-left"></i></a>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-12 text-center align-middle  animate__animated animate__bounceInLeft">
                <h1 class="text-primary d-inline-block align-middle">Apa itu Vaksin COVID-19 ?</h1>
                <img class="gambar-dokter img-fluid d-inline-block align-middle" src="{{ asset('/assets/img/doctors-concept-illustration_114360-1515-removebg-preview 1.png') }}" alt="">
            </div>
            
        </div>

        <div class="row animate__animated animate__fadeInUp mt-5 pt-5">
            <div  class="col-md-6 text-center  mx-auto justify-content-center align-middle">
                <p class="fs-3 text-success fw-bold">Jadi Vaksin COVID-19 merupakan upaya pemerintah agar masyarakat menjadi lebih produktif dalam menjalankan aktivitas kesehariannya.</p>
            
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-12 text-center">
                <a  href="#manfaat-vaksin" type="button" class="btn btn-success text-white rounded-circle"><i class="fas fa-arrow-down"></i></a>
            </div>
        </div>
    </div>

    <div class="main-content mx-auto pt-5" id="manfaat-vaksin" data-aos="fade-up" >
        <div class="row mt-5 mb-5 pt-5">
            <div class="col-md-12 text-center align-middle  animate__animated animate__bounceInLeft">
                <h1 class="text-primary d-inline-block align-middle">Manfaat Vaksin COVID-19</h1>
                <img class="gambar-dokter img-fluid d-inline-block align-middle" src="{{ asset('/assets/img/check-removebg-preview 1.png') }}" alt="">
            </div>
            
        </div>

        <div class="row animate__animated animate__fadeInUp mt-5 pt-5">
            <div  class="col-md-6 text-start text-success fw-bold fs-4  mx-auto justify-content-center align-middle">
            <ol>
                <li>
                    Mencegah terkena atau mengalami gejala COVID-19 Berat
                </li>
                <li>
                    Melindungi orang lain
                </li>
                <li>
                    Menghentikan penyebaran Covid-19
                </li>
                <li>
                    Membantu melindungi generasi selanjutnya
                </li>
            </ol>
            
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-12 text-center">
                <a  href="#jenis-vaksin" type="button" class="btn btn-success text-white rounded-circle"><i class="fas fa-arrow-down"></i></a>
            </div>
        </div>
        
    </div>

    <div class="main-content mx-auto pt-5" id="jenis-vaksin" data-aos="fade-up">
        <div class="row mb-3">
            <div class="col-md-12 text-center align-middle  animate__animated animate__bounceInLeft">
                <h1 class="text-primary d-inline-block align-middle fs-2 my-5">Yuk Mengenal Macam-Macam Vaksin Covid-19 Yang Ada Di Indonesia</h1>
            </div>
        </div>

        <div class="row ">
            
            @foreach ($vaksins as $vaksin)
                <div class="col-md-4 mb-5">
                    <div class="card " data-aos="flip-left">
                        <div class="card-img-top gambar-vaksin" style="background-image: url('{{ $vaksin->gambar_vaksin ?? '/assets/img/daniel-schludi-ZeMRI9vO71o-unsplash.jpg' }}');">
                            <!-- <img src="" alt="..."> -->
                        </div>
                        <div class="card-body">
                        <h5 class="card-title">{{ $vaksin->nama_vaksin }}</h5>
                        <p class="card-text">{{ mb_strimwidth(strip_tags($vaksin->deskripsi_vaksin),0,150,"...") }}</p>
                        <a href="{{ route('tentang-vaksin.show',$vaksin->slug) }}" class="btn btn-primary">Selengkapnya</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

        <div class="row mt-5">
            <div class="col-md-12 text-center">
                <a  href="#paham-vaksin" type="button" class="btn btn-success text-white rounded-circle"><i class="fas fa-arrow-down"></i></a>
            </div>
        </div>
    </div>

    <div class="main-content mx-auto pt-5" id="paham-vaksin" data-aos="fade-up" >
        
        <div class="row animate__animated animate__fadeInUp mt-5 ">
            <div  class="col-md-6 text-center fw-bold fs-1  mx-auto text-primary">
                Yuk, Uji pemahaman mu tentang vaksinasi Covid-19
            </div>
        </div>
        <div class="row animate__animated animate__fadeInUp my-5 py-5">
            <div  class="col-md-4 text-center text-success fw-bold fs-4  mx-auto ">
                
                <img src="{{ asset('assets/img/vaccine-626x380-removebg-preview 1.png') }}" alt="" class="img-fluid">
            </div>
        </div>

        <div class="row my-5">
            <div class="col-md-12 text-center">
                <a href="{{ route('quiz-vaksin.index') }}" class="btn btn-primary rounded-pill fs-3 px-5">
                    Masuk Quiz <i class="fas fa-question-circle"></i>
                </a>
            </div>
        </div>
        
    </div>
@endsection