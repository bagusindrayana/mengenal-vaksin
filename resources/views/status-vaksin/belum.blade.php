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
                <a href="curhat.html" class="btn btn-success my-2 fs-5 d-inline-block align-middle">Curhat</a>    
            </div>
        </div>
        <div class="row mt-4 animate__animated animate__fadeInUp">
            <div  class="col-md-12 text-center align-middle">
            <span class="fs-3 text-primary d-inline-block align-middle fw-bold">Yuk, cari tau lebih dalam tentang vaksin covid-19</span>
            <a href="{{ route('tentang-vaksin.index') }}" class="btn btn-primary rounded-pill fs-5 d-inline-block align-middle my-2">Selengkapnya</a>
            
            </div>
        
        </div>
    </div>
@endsection