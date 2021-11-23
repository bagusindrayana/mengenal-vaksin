@extends('layouts.app')

@section('content')
    <div class="main-content mx-auto">
        <div class="row mt-5">
            <div class="col-md-5 left-side text-end  animate__animated animate__bounceInLeft">
                <img class="gambar-virus img-fluid" src="{{ asset('assets/img/gambar-karikatur-kelambu-removebg-preview.png') }}" alt="" >
            </div>
            <div class="col-md-6 right-side text-center main-title animate__animated animate__bounceInRight ">
                <h1 class="main-text-color">Tak Kenal Maka Tak Kebal</h1>
                <img class="gambar-dokter img-fluid" src="{{ asset('assets/img/vaccine-removebg-preview.png') }}" alt="">
            </div>
        </div>

        <div class="row animate__animated animate__fadeInUp">
            <div  class="col-md-12 text-center">
            <p class="fs-3 text-primary fw-bold">Wujudkan Masyarakat Yang Sehat Dan Produktif Dengan</p>
            <h1 class="main-text-color fw-bold">VAKSINASI COVID-19</h1>
            </div>
        </div>

        <div class="row mt-4 animate__animated animate__fadeInUp">
            <div  class="col-md-6 question-section py-2">
            <p class="fs-5 text-primary fw-bold">Apakah Kamu Sudah Vaksin ?</p>
            
            </div>
            <div class="col-md-6 button-section">
                <a href="{{ route('sudah-vaksin') }}" class="btn btn-primary rounded-pill py-2 px-4 fs-5 mx-2">Sudah</a>
                <a href="{{ route('belum-vaksin') }}" class="btn btn-danger rounded-pill  py-2 px-4 fs-5 mx-2">Belum</a>
            </div>
        </div>
    </div>
@endsection