@extends('layouts.app')

@section('content')
    <div class="main-content mx-auto">
        <div class="row">
            <div class="col-md-2 text-start">
                <a  href="{{ url("/") }}" type="button" class="btn btn-warning text-white rounded-circle"><i class="fas fa-arrow-left"></i></a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center main-title animate__animated animate__bounceInUp ">
                <h1 class="text-primary fs-1 fw-bold">Selamat</h1>
                <img class="img-fluid" src="{{ asset('assets/img/img-selamat-01.png') }}" alt="">
            </div>
        </div>

        <div class="row animate__animated animate__fadeInUp">
            <div  class="col-md-12 text-center">
            <p class="fs-3 text-success fw-bold">Kamu Selangkah Lebih Sehat, Dengan Begitu Daya Tahan Tubuhmu & Antibodi(Imun) Jauh Lebih Baik</p>
            
            </div>
        </div>

        
        <div class="row mt-4 animate__animated animate__fadeInUp">
            <div  class="col-md-12 text-center align-middle">
            <span class="fs-3 text-primary d-inline-block align-middle fw-bold">Yuk, cari tau lebih dalam tentang vaksin covid-19</span>
            <a href="{{ route('tentang-vaksin.index') }}" class="btn btn-primary rounded-pill fs-5 d-inline-block align-middle  my-2">Selengkapnya</a>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-12 text-center">
                <a  href="#waspada-hoax" type="button" class="btn btn-success text-white rounded-circle"><i class="fas fa-arrow-down"></i></a>
            </div>
        </div>
    </div>

    @include('layouts.includes.hoax')
@endsection