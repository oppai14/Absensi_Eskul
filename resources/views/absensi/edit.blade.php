<!-- resources/views/absensi/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Edit Data Absensi</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('absensi.update', $absensi->id) }}" method="post">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" name="nama" class="form-control" value="{{ $absensi->nama }}">
        </div>
        <div class="form-group">
            <label for="kelas">Kelas:</label>
            <input type="text" name="kelas" class="form-control" value="{{ $absensi->kelas }}">
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
@endsection
