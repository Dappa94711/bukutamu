@extends('app')
@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            Data Buku Tamu <a href="{{ url('admin/form-tambah') }}" class="btn btn-success">Tambah Data</a>
        </div>
        <div class="card-body">
            <table class="table" id="myTable">
                <thead class="thead-primary">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Telepon</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Email</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Keperluan</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col" style="width: 15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $item)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->tlp }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->kategori }}</td>
                            <td>{{ $item->keperluan }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->created_at)->timezone('Asia/Jakarta')->locale('id')->translatedFormat('l, d F Y H:i:s') }}</td>
                            <td>
                                <div class="row">
                                    <div class="col-4"> <a href="{{ url('admin/form-edit', $item->id) }}" onclick="return confirm('Apakah Anda Yakin Mengedit Data?');" 
                                            class="btn btn-warning">Edit</a>
                                    </div>
                                    <div class="col-4">
                                        <form action="{{ url('admin/hapus-data') }}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $item->id }}">
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('script')
    <script>
        let table = new DataTable('#myTable');
    </script>
@endsection
