@extends('layouts.app')

@section('content')
    <div class="main-content mx-auto">
        <div class="row">
            <div class="col-md-2 text-start">
                <a  href="{{ url('/') }}" type="button" class="btn btn-warning text-white rounded-circle"><i class="fas fa-arrow-left"></i></a>
            </div>
        </div>
        <div class="row mb-3 mt-5">
            <div class="col-md-12 text-center">
                <h2 class="text-primary">{{ $informasi->nama_informasi }}</h2>
            </div>
        </div>
        <div class="row ">
            <div class="col-md-4 mx-auto">
                <img src="{{ $informasi->gambar_informasi }}" alt="" class="img-fluid rounded">
            </div>
            <div class="col-md-6  mx-auto">
                {!! $informasi->isi_informasi !!}
                <br>
                
            </div>
        </div>
    </div>
@endsection