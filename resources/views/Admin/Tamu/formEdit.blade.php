@extends('app')
@section('content')
    <div class="d-flex justify-content-center">
        <div class="card" style="width: 40%">
            <div class="card-header">
                Form Edit Buku Tamu
            </div>
            <div class="card-body">
                <form action="{{ url('admin/update-data') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" aria-describedby="nama" value="{{ $data->nama }}">
                    </div>
                    <div class="form-group">
                        <label for="telepon">Telepon</label>
                        <input type="text" class="form-control" name="telepon" id="telepon" aria-describedby="telepon" value="{{ $data->tlp }}">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                       <textarea name="alamat" class="form-control">{{ $data->alamat }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" aria-describedby="email" value="{{ $data->email }}">
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <input type="kategori" class="form-control" name="kategori" id="kategori" aria-describedby="kategori" value="{{ $data->kategori }}">
                    </div>
                    <div class="form-group">
                        <label for="keperluan">Keperluan</label>
                        <textarea name="keperluan" class="form-control">{{ $data->keperluan }}</textarea>
                    </div>
                    <input type="hidden" value="{{ $data->id }}" name="id">
                    <button type="submit" onclick="return confirm('Apakah Data Anda Sudah Benar?');" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
