@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">My Post</h1>
</div>
@if (session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
  {{ session('success') }}
</div>
@endif
<div class="table-responsive col-lg-8">
  <a href="/dashboard/posts/create" class="btn btn-secondary mb-3" style="background-color: #FEF9D9; color:#00541A" >Create New Post</a>
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama Produk</th>
        <th scope="col">Harga</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($posts as $produk)
      <tr>
        <td>{{ $loop->iteration }}</td> <!-- Menampilkan nomor urutan -->
        <td>{{ $produk->nama_produk }}</td> <!-- Menampilkan nama produk -->
        <td>Rp {{ number_format($produk->harga, 0, ',', '.') }}</td> <!-- Menampilkan harga dalam format Rp -->
        <td>
          <a href="/dashboard/posts/{{ $produk->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
          <form action="/dashboard/posts/{{ $produk->id }}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button class="badge bg-danger border-0" onclick="return confirm('Apakah anda yakin ingin menghapus data?')"><span data-feather="x-circle"></span></button>
          </form>

        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection