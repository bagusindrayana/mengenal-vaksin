@extends('layouts.app')

@push('styles')
    <style>
        .carousel-control-prev-icon {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%230570c9' viewBox='0 0 8 8'%3E%3Cpath d='M5.25 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z'/%3E%3C/svg%3E") !important;
        }

        .carousel-control-next-icon {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%230570c9' viewBox='0 0 8 8'%3E%3Cpath d='M2.75 0l-1.5 1.5 2.5 2.5-2.5 2.5 1.5 1.5 4-4-4-4z'/%3E%3C/svg%3E") !important;
        }

        .carousel-control-next, .carousel-control-prev {
            width: auto !important;
        }
    </style>
@endpush

@push('scripts')

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    <script>
        var itemsToWrap = $('.slider-item');
        var carousel = `<div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            </div>`;
        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            
            $('.parent-slider').remove();
           
            $(carousel).appendTo('.baseParent');
            var elementTowrap = "";
            $.each($(itemsToWrap), function(index) {
                var html = $(this).html();
                $(this).find('.card').removeAttr('data-aos');
                // console.log(html);
                if (index == 0)
                    elementTowrap += '<div class="carousel-item active">' + $(this).html() + '</div>';
                else
                    elementTowrap += '<div class="carousel-item">' + $(this).html() + '</div>';
            });
            $('#myCarousel .carousel-inner').append($(elementTowrap));
            var myCarousel = document.querySelector('#myCarousel')
            var c = new bootstrap.Carousel(myCarousel)
            
        } else {
            $('.parent-slider').remove();
           
            $(carousel).appendTo('.baseParent');
            var elementTowrap = '<div class="carousel-item active"><div class="row">';
            var no = 0;
            
            $.each($(itemsToWrap), function(index) {
                var html = `<div class="col-md-4 mb-5">`+$(this).html()+`</div>`;
                $(this).find('.card').removeAttr('data-aos');
                elementTowrap += html;
                no++;
                if(no == 3){
                    no = 0;
                    
                    if(index == $(itemsToWrap).length - 1){
                        elementTowrap += '</div></div>';
                    } else {
                        elementTowrap += '</div></div><div class="carousel-item"><div class="row">';
                    }
                }
                
            });
            $('#myCarousel .carousel-inner').append($(elementTowrap));
            var myCarousel = document.querySelector('#myCarousel')
            var c = new bootstrap.Carousel(myCarousel)
        }
    </script>
@endpush

@section('content')
    <div class="main-content mx-auto pt-5" id="apa-itu-vaksin" data-aos="fade-up">
        <div class="row">
            <div class="col-md-2 text-start">
                <a href="{{ url('/') }}" type="button" class="btn btn-warning text-white rounded-circle"><i
                        class="fas fa-arrow-left"></i></a>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-12 text-center align-middle  animate__animated animate__bounceInLeft">
                <h1 class="text-primary d-inline-block align-middle">Apa itu Vaksin COVID-19 ?</h1>
                <img class="gambar-dokter img-fluid d-inline-block align-middle"
                    src="{{ asset('/assets/img/doctors-concept-illustration_114360-1515-removebg-preview 1.png') }}"
                    alt="">
            </div>

        </div>

        <div class="row animate__animated animate__fadeInUp mt-5 pt-5">
            <div class="col-md-6 text-center  mx-auto justify-content-center align-middle">
                <p class="fs-3 text-success fw-bold">Jadi Vaksin COVID-19 merupakan upaya pemerintah agar masyarakat menjadi
                    lebih produktif dalam menjalankan aktivitas kesehariannya.</p>

            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-12 text-center">
                <a href="#manfaat-vaksin" type="button" class="btn btn-success text-white rounded-circle"><i
                        class="fas fa-arrow-down"></i></a>
            </div>
        </div>
    </div>

    <div class="main-content mx-auto pt-5" id="manfaat-vaksin" data-aos="fade-up">
        <div class="row mt-5 mb-5 pt-5">
            <div class="col-md-12 text-center align-middle  animate__animated animate__bounceInLeft">
                <h1 class="text-primary d-inline-block align-middle">Manfaat Vaksin COVID-19</h1>
                <img class="gambar-dokter img-fluid d-inline-block align-middle"
                    src="{{ asset('/assets/img/check-removebg-preview 1.png') }}" alt="">
            </div>

        </div>

        <div class="row animate__animated animate__fadeInUp mt-5 pt-5">
            <div class="col-md-6 text-start text-success fw-bold fs-4  mx-auto justify-content-center align-middle">
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
                <a href="#jenis-vaksin" type="button" class="btn btn-success text-white rounded-circle"><i
                        class="fas fa-arrow-down"></i></a>
            </div>
        </div>

    </div>

    <div class="main-content mx-auto pt-5" id="jenis-vaksin">
        <div class="row mb-3">
            <div class="col-md-12 text-center align-middle  animate__animated animate__bounceInLeft">
                <h1 class="text-primary d-inline-block align-middle fs-2 my-5">Yuk Mengenal Macam-Macam Vaksin Covid-19 Yang
                    Ada Di Indonesia</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 baseParent">
                <div class="row parent-slider">

                    @foreach ($vaksins as $vaksin)
                        <div class="col-md-4 mb-5 slider-item">
                            <div class="card " data-aos="flip-left">
                                <div class="card-img-top gambar-vaksin"
                                    style="background-image: url('{{ $vaksin->gambar_vaksin ?? '/assets/img/daniel-schludi-ZeMRI9vO71o-unsplash.jpg' }}');">
                                    <!-- <img src="" alt="..."> -->
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $vaksin->nama_vaksin }}</h5>
                                    <p class="card-text">
                                        {{ mb_strimwidth(strip_tags($vaksin->deskripsi_vaksin), 0, 150, '...') }}</p>
                                    <a href="{{ route('tentang-vaksin.show', $vaksin->slug) }}"
                                        class="btn btn-primary">Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-12 text-center">
                <a href="#paham-vaksin" type="button" class="btn btn-success text-white rounded-circle"><i
                        class="fas fa-arrow-down"></i></a>
            </div>
        </div>
    </div>

    <div class="main-content mx-auto pt-5" id="paham-vaksin" data-aos="fade-up">

        <div class="row animate__animated animate__fadeInUp mt-5 ">
            <div class="col-md-6 text-center fw-bold fs-1  mx-auto text-primary">
                Yuk, Uji pemahaman mu tentang vaksinasi Covid-19
            </div>
        </div>
        <div class="row animate__animated animate__fadeInUp my-5 py-5">
            <div class="col-md-4 text-center text-success fw-bold fs-4  mx-auto ">

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
