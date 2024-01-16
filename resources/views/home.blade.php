@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
    
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
    
                        {{ __('You are logged in!') }}
                        {{ auth()->user()->role }}

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @if (session('msg'))
            <div class="alert alert-success" role="alert">
                {{ session('msg') }}
            </div>
            @endif
             @if (session('errors'))
            <div class="alert alert-dangers" role="alert">
                {{ session('errors') }}
            </div>
            @endif
            @foreach($car as $cars)
            <div class="col-sm-6">
                <div class="card">
                    <img class="card-img-top" src="{{ $cars->gambar }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{ $cars->model }}</h5>
                        <p class="card-text">{{ $cars->merek }}</p>
                        <p class="card-text">Rp.{{ number_format($cars->harga,2) }}/hari</p>
                        <a href="{{ route('pesan', encrypt($cars->id)) }}" class="btn btn-primary">Pesan Sekarang</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
