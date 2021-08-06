@extends('layouts.app')

@section('title', 'Edit Data Pendidikan')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data Pendidikan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('pendidikan.update', $pendidikan->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="font-weight-bold">Nama Lengkap</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama', $produk->nama) }}" placeholder="Masukkan nama">
                            
                                <!-- error message untuk nama -->
                                @error('nama')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Jenjang Pendidikan</label>
                                <input type="text" class="form-control @error('jenjangpendidikan') is-invalid @enderror" name="jenjangpendidikan" value="{{ old('jenjangpendidikan', $produk->jenjangpendidikan) }}" placeholder="Masukkan jenjangpendidikan">
                            
                                <!-- error message untuk jenjangpendidikan -->
                                @error('jenjangpendidikan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Tahun Masuk</label>
                                <input type="date" class="form-control @error('thn_masuk') is-invalid @enderror" name="thn_masuk" value="{{ old('thn_masuk', $produk->thn_masuk) }}" placeholder="Masukkan thn_masuk ">
                         
                                <!-- error message untuk thn_masuk -->
                                @error('thn_masuk')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                                </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Tahun Lulus</label>
                                <input type="date" class="form-control @error('thn_lulus') is-invalid @enderror" name="thn_lulus" value="{{ old('thn_lulus', $produk->thn_lulus) }}" placeholder="luluskan thn_lulus ">
                         
                                <!-- error message untuk thn_lulus -->
                                @error('thn_lulus')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
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

