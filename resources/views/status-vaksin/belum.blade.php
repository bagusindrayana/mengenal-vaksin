@extends('layouts.app')

@section('content')
    <div class="main-content mx-auto">
        <div class="row">
            <div class="col-md-2 text-start">
                <a  href={{ url("/") }} type="button" class="btn btn-warning text-white rounded-circle"><i class="fas fa-arrow-left"></i></a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center main-title animate__animated animate__bounceInDown ">
                <h1 class="text-primary fs-1">Sayang Sekali Kamu Belum Vaksin</h1>
                <img class="img-fluid" src="{{ asset('assets/img/file 1.png') }}" alt="">
            </div>
        </div>

        <div class="row animate__animated animate__fadeInUp">
            <div  class="col-md-12 text-center">
            <p class="fs-3 text-danger fw-bold">Padahal dengan vaksin dapat meningkatkan imunitas daya tahan tubuh kamu dalam menangkal virus</p>
            
            </div>
        </div>

        <div class="row mt-4 mx-auto justify-content-center animate__animated animate__fadeInUp curhat-section">
            <div  class="col-md-4 text-end align-middle">
            <span class="fs-5 text-success d-inline-block align-middle fw-bold">Kasih Tau Dong Kenapa Kamu<br>Belum/Tidak Mau Di Vaksin</span>
            
            </div>
            <div class="col-md-2 text-start align-middle">
                <a href="{{ route('curhat.index') }}" class="btn btn-success my-2 fs-5 d-inline-block align-middle">Curhat</a>    
            </div>
        </div>
        <div class="row mt-4 animate__animated animate__fadeInUp">
            <div  class="col-md-12 text-center align-middle">
            <span class="fs-3 text-primary d-inline-block align-middle fw-bold">Yuk, cari tau lebih dalam tentang vaksin covid-19</span>
            <a href="{{ route('tentang-vaksin.index') }}" class="btn btn-primary rounded-pill fs-5 d-inline-block align-middle my-2">Selengkapnya</a>
            
            </div>
        
        </div>

        <div class="row mt-5">
            <div class="col-md-12 text-center">
                <a  href="#waspada-hoax" type="button" class="btn btn-success text-white rounded-circle"><i class="fas fa-arrow-down"></i></a>
            </div>
        </div>
    </div>

    <div class="main-content mx-auto" id="waspada-hoax" style="background-image: url('{{ asset('assets/img/wave_red.svg') }}')">
        <div class="row mb-3">
            <div class="col-md-4 text-center mx-auto bg-danger p-1 rounded">
                <div class="bg-white p-1 rounded text-white">
                    <div class="bg-danger p-5 rounded text-white">
                        <h1 class="fs-1 fw-bold">WASPADA HOAX</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-6 mx-auto text-center">
                <p class="fs-3 text-danger fw-bold">Berita Hoax Atau Berita Palsu Yang Menyesatkan</p>
            </div>
        </div>

        <div class="row ">
            
            @foreach (Helper::getHoax() as $hoax)
                <div class="col-md-4 mb-5">
                    <div class="card " data-aos="flip-left">
                        <div class="card-img-top gambar-vaksin" style="background-image: url('{{ $hoax->gambar_informasi ?? '/assets/img/daniel-schludi-ZeMRI9vO71o-unsplash.jpg' }}');">
                            <!-- <img src="" alt="..."> -->
                        </div>
                        <div class="card-body">
                        <h5 class="card-title">{{ $hoax->nama_informasi }}</h5>
                        <p class="card-text">{{ mb_strimwidth(strip_tags($hoax->isi_informasi),0,150,"...") }}</p>
                        <a href="{{ route('informasi.show',$hoax->slug) }}" class="btn btn-danger">Selengkapnya</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        
    </div>
@endsection