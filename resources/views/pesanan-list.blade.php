@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="row">
            @if (session('msg'))
            <div class="alert alert-success" role="alert">
                {{ session("msg") }}
            </div>
            @endif @if (session('errors'))
            <div class="alert alert-dangers" role="alert">
                {{ session("errors") }}
            </div>
            @endif 
            <table class="table">
                <thead>
                    <tr>
                        {{-- <th scope="col">#</th> --}}
                        <th scope="col">Nomor Polisi</th>
                        <th scope="col">Tanggal Pesan</th>
                        <th scope="col">Harga Perhari</th>
                        <th scope="col">Harga Sewa Sampai Hari ini</th>

                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($car as $cars)
                    <tr>
                        {{-- <th scope="row">1</th> --}}
                        <td>{{ $cars->nopol }}</td>
                        <td>{{ $cars->order_date }}</td>
                        <td>Rp.{{ number_format($cars->harga,2) }}</td>
                        <td>Rp.{{(int)(ceil((strtotime(now())-strtotime($cars->order_date))/86400)*$cars->harga) }}</td>

                        <td>
                            @if($cars->retur_date!=null)
                            <div class="btn btn-danger disabled">Pesanan Selesai</div>
                            @else
                            <a href="{{ route('kembalikan', encrypt($cars->nopol)) }}" class="btn btn-primary">Kembalikan</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
