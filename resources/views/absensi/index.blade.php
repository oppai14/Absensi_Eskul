<!-- resources/views/absensi/index.blade.php -->

{{-- @include('template.dashboard') --}}

{{-- @section('content') --}}
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
              <title>Document</title>
        <script src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.6/css/jquery.dataTables.min.css">

    </head>
    
<body>
    <h1>Data Absensi</h1>
    <form action="">
        <input type="text" name="filter_nama" id="nama">

    </form>
    <table id="absensiTable">
        <thead>
            <th>Id</th>
            <th>Nama</th>
            <th>Kelas</th>
        </thead>
        <tbody id="isi"></tbody>
    </table>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

  <!-- ... -->
<script>
    var nama = '';
    var tbody = $('#isi');
    $(document).ready(function () {
        dataTable();


        // Fungsi debounce
function debounce(func, delay) {
    let timeoutId;
    return function() {
        const context = this;
        const args = arguments;
        clearTimeout(timeoutId);
        timeoutId = setTimeout(function() {
            func.apply(context, args);
        }, delay);
    };
}

// Handler untuk event input
const handleInput = debounce(function() {
    nama = $('#nama').val();
    tbody.empty();
    dataTable();
}, 500); // Mengatur waktu penundaan (dalam milidetik)

// Menggunakan event 'input' dengan fungsi debounce
$('#nama').on('input', handleInput);

        // $('#nama').on('input', function() {
        //     nama = $(this).val();
        //     tbody.empty()
        //     dataTable();
        // });

        
        // Menggunakan Ajax untuk mengambil data absensi
        
    });

    function dataTable(){
        $.ajax({
            url: 'absensi/dataTable',
            type: 'GET',
            dataType: 'json',
            data:{
                nama: nama
            },
            success: function (data) {
                // Memasukkan data ke dalam tabel
                $.each(data.data, function (index, item) {
                    $('#isi').append('<tr><td>' + item.id + '</td><td>' + item.nama + '</td><td>' + item.kelas + '</td></tr>');
                });

                // Inisialisasi DataTable setelah data dimasukkan
                $('#absensiTable').DataTable();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    }
</script>
<!-- ... -->



</body>
</html>
    

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
   
    {{-- <a href="{{ route('absensi.create') }}" class="btn btn-success">Tambah Absensi Baru</a> --}}
{{-- @endsection  --}}
