@extends('layouts.app')

@section('title', 'Tambah Data Produk')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data Produk </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('produk.store') }}" method="POST">
                        
                            @csrf

                            <div class="form-group">
                                <label class="font-weight-bold">Nama Produk</label>
                                <input type="text" class="form-control @error('nama_produk') is-invalid @enderror" name="nama_produk" value="{{ old('nama_produk') }}">
                            
                                <!-- error message untuk nama produk -->
                                @error('nama_produk')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Harga Produk</label>
                                <input type="text" class="form-control @error('harga_produk') is-invalid @enderror" name="harga_produk" value="{{ old('harga_produk') }}">
                            
                                <!-- error message untuk harga -->
                                @error('harga_produk')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Varian Rasa</label>
                                <input type="text" class="form-control @error('varian_rasa') is-invalid @enderror" name="varian_rasa" value="{{ old('varian_rasa') }}" >
                            
                                <!-- error message untuk harga -->
                                @error('varian_rasa')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                                </div>
                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
     
@endsection