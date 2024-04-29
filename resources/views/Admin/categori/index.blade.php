@extends('app')
@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            Data Buku Tamu <a href="{{ route('categoris.create') }}" class="btn btn-success">Tambah Data</a>
        </div>
        <div class="card-body">
            <table class="table" id="myTable">
                <thead class="thead-primary">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col" style="width: 15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $item)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $item->name }}</td>
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
