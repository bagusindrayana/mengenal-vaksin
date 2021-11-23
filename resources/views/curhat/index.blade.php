@extends('layouts.app')

@section('content')
    <div class="main-content mx-auto">
        @if (session()->has('error'))
            <div class="alert alret-danger p-2 bg-danger text-white">
                {{ session()->get('error') }}
            </div>
        @endif
        @if (session()->has('success'))
            <div class="alert alret-success p-2 bg-success text-white">
                {{ session()->get('success') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-2 text-start">
                <a  href="{{ url('belum-vaksin') }}" type="button" class="btn btn-warning text-white rounded-circle"><i class="fas fa-arrow-left"></i></a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center main-title animate__animated animate__bounceInDown ">
                <h1 class="text-primary fs-3">Cerita Yuk Kenapa Kamu Tidak/Belum Mau Vaksin Covid-19?</h1>
            </div>
        </div>

    

        <div class="row mt-4 mx-auto justify-content-center animate__animated animate__fadeInUp curhat-section">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('curhat.store') }}" class="form" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Aku tidak/belum mau di vaksin covid-19 karena...</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="isi_curhat" rows="9" placeholder="..." >{{ old('isi_curhat') }}</textarea>
                            </div>

                            <div>
                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
                
            </div>
        
        </div>
    </div>
@endsection