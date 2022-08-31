@extends('layouts.master')

@section('content')

    <div class="d-flex justify-content-between mb-4">
        <h3>List Semua Produk</h3>
        <a class="btn btn-success" href="{{ route('create') }}">Tambah Produk</a>
    </div>

    @if(session()->has('success'))
        <label class="alert alert-success w-100">{{session('success')}}</label>
    @elseif(session()->has('error'))
        <label class="alert alert-danger w-100">{{session('error')}}</label>
    @endif

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Nama Produk</th>
            <th>Keterangan</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>

        @foreach($products as $product)
            <tr>
                <td>{{ $product->nama_produk }}</td>
                <td>{{ $product->keterangan }}</td>
                <td>{{ $product->harga }}</td>
                <td>{{ $product->jumlah }}</td>
                <td>
                    <a href="{{ route('edit', ['id' => $product->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('delete', ['id' => $product->id]) }}" method="POST" class="d-inline-block">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

@endsection