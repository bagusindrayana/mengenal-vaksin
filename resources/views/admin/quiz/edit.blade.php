@extends('admin.layouts.app')

@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Ubah Data Quiz</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Data Quiz</li>
            </ol>
        </div>
        
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('quiz.update',$data->id) }}" method="POST" enctype="multipart/form-data" id="form">
                        @method('PUT')
                        @include('admin.quiz.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection