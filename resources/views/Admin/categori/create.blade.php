@extends('app')
@section('content')
    <div class="d-flex justify-content-center">
        <div class="card" style="width: 40%">
            <div class="card-header">
                Form Tambah Buku Tamu
            </div>
            <div class="card-body">
                <form action="{{ route('categoris.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="name" id="nama" aria-describedby="nama">
                    </div>
                    <button type="submit" onclick="return confirm('Apakah Data Anda Sudah Benar?');" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
