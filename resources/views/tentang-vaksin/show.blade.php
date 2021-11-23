@extends('layouts.app')

@section('content')
    <div class="main-content mx-auto">
        <div class="row">
            <div class="col-md-2 text-start">
                <a  href={{ route('tentang-vaksin.index') }} type="button" class="btn btn-warning text-white rounded-circle"><i class="fas fa-arrow-left"></i></a>
            </div>
        </div>
        <div class="row mb-3 mt-5">
            <div class="col-md-12 text-center">
                <h2 class="text-primary">{{ $vaksin->nama_vaksin }}</h2>
            </div>
        </div>
        <div class="row ">
            <div class="col-md-4 mx-auto">
                <img src="{{ $vaksin->gambar_vaksin }}" alt="" class="img-fluid rounded">
            </div>
            <div class="col-md-6  mx-auto">
                {!! $vaksin->deskripsi_vaksin !!}
                <br>
                {{-- <p class="text-success fw-bold">Yuk Uji Pemahamanmu Tentang Vaksin Ini</p> --}}
                <a href="{{ url('tentang-vaksin#jenis-vaksin') }}" class="btn btn-success rounded-pill px-4">
                    Jenis Vaksin Lainnya <i class="fas fa-medkit"></i>
                </a>
            </div>
        </div>
    </div>
@endsection