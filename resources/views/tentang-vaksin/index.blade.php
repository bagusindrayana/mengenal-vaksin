@extends('layouts.app')

@section('content')
    <div class="main-content mx-auto pt-5">
        <div class="row">
            <div class="col-md-2 text-start">
                <a  href={{ url("/") }} type="button" class="btn btn-warning text-white rounded-circle"><i class="fas fa-arrow-left"></i></a>
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

        <!-- <div class="row mt-4 animate__animated animate__fadeInUp">
            <div  class="col-md-6 question-section py-2">
            <p class="fs-5 text-primary fw-bold">Apakah Kamu Sudah Vaksin ?</p>
            
            </div>
            <div class="col-md-6 button-section">
                <a href="sudah-vaksin.html" class="btn btn-primary rounded-pill py-2 px-4 fs-5 mx-2">Sudah</a>
                <a href="belum-vaksin.html" class="btn btn-danger rounded-pill  py-2 px-4 fs-5 mx-2">Belum</a>
            </div>
        </div> -->
    </div>

    <div class="main-content mx-auto pt-5">
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
        
    </div>

    <div class="main-content mx-auto pt-5">
        <div class="row mb-3">
            <div class="col-md-12 text-center align-middle  animate__animated animate__bounceInLeft">
                <h1 class="text-primary d-inline-block align-middle fs-2">Yuk Mengenal Macam-Macam Vaksin Covid-19 Yang Ada Di Indonesia</h1>
            </div>
        </div>

        <div class="row ">
            
            @foreach ($vaksins as $vaksin)
                <div class="col-md-4 mb-5">
                    <div class="card ">
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
    </div>
@endsection