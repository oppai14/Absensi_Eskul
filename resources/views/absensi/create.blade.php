<!-- resources/views/absensi/create.blade.php -->

@extends('layouts.app')
  
@section('content')
    <h1>Tambah Absensi Baru</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('absensi.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" name="nama" class="form-control">
        </div>
        <div class="form-group">
            <label for="kelas">Kelas:</label>
            <input type="text" name="kelas" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
 