<!-- resources/views/absensi/index.blade.php -->

@include('template.dashboard')

@section('content')
    <h1>Data Absensi</h1>
    <table id="absensiTable">
        <thead>
            <th>Id</th>
            <th>Nama</th>
            <th>Kelas</th>
        </thead>
        <tbody></tbody>
    </table>

    {{-- @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif --}}

    {{-- <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($absensi as $data)
                <tr>
                    <td>{{ $data->id }}</td>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->kelas }}</td>
                    <td>
                        <a href="{{ route('absensi.edit', $data->id) }}" class="btn btn-primary">Edit</a>
                         <form action="{{ route('absensi.destroy', $data->id) }}" method="post" style="display:inline;"> 
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                
            @endforeach
        </tbody>
    </table> --}}
   {{-- <script src="{{ asset('js/absensi/index.js') }}"></script> --}}
   <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

   <script>
    $(document).ready(function(){
        dataTable();
        console.log('aufa siap');
    });

    function dataTable(){
        $('#absensiTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url : route('absensi.dataTable'),
            "type" : "POST",
            dataType: "JSON",
            data:{
                filterNama : nama,
                filterKelas : kelas,
            }

        }'/absensi/get-absensi-data',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'nama', name: 'nama' },
            { data: 'kelas', name: 'kelas' },
        ]
    });
    }
   </script>


    {{-- <a href="{{ route('absensi.create') }}" class="btn btn-success">Tambah Absensi Baru</a> --}}
@endsection 
