<!DOCTYPE html>
<html>

<head>
  <title>@yield('title')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- Tautan untuk Font Awesome CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <!-- Masukkan CSS dan script lainnya -->
  <style>
    .sidebar {
      position: fixed;
      top: 0;
      left: -250px;
      height: 100%;
      width: 250px;
      background-color: #111;
      transition: all 0.3s ease;
    }

    .sidebar.active {
      left: 0;
    }

    .sidebar-toggler {
      background: transparent;
      border: none;
      outline: none;
      color: white;
      font-size: 1.5rem;
      cursor: pointer;
      margin-right: 15px; /* Margin untuk tombol sidebar */
    }

    .sidebar-menu {
      padding-top: 60px; /* Atur jarak dari atas untuk menyertakan tombol toggler */
    }

    .sidebar-menu a {
      display: block;
      padding: 10px 15px;
      color: white;
      text-decoration: none;
    }

    /* Tambahkan margin pada konten saat sidebar aktif */
    .content {
      transition: margin-left 0.3s ease;
    }

    .content.active {
      margin-left: 250px; /* Sesuaikan dengan lebar sidebar Anda */
    }
  </style>
</head>

<body>

  <!-- Sidebar -->
  <div class="sidebar" id="sidebar">
    <div class="sidebar-menu">
      <a href="{{ route('absensi.index') }}">Absensi</a>
      <!-- <a href="#">Menu 3</a> -->
      <!-- Tambahkan menu lain sesuai kebutuhan -->
    </div>
  </div>

  <!-- Bagian konten -->
  <div class="container-fluid body p-0 content" id="main-content">
    <nav class="navbar navbar-sm navbar-expand-lg navbar-fixed" id="navbar" style="background-color: #004225;">
      <div class="container-fluid">
        <button class="sidebar-toggler " onclick="toggleSidebar()">
        <i class="fa-solid fa-list"></i>
        </button>

        <a class="navbar-brand text-white" href="#">
          <b>
            {{env('APP_NAME')}}
          </b>
        </a>
        


       

        <div class="collapse navbar-collapse " id="navbarSupportedContent">
          
        <!-- Tambahkan tautan pengguna di sebelah kanan -->
        <div class="ml-auto mr-lg-2 navbar-menu ">
          <button class="btn btn-light text-white" onclick="toggleUserMenu()" style="background-color: #004225; border:0;">
            <i class="fa fa-user"></i>&nbsp;joseph <i class="fa fa-angle-down"></i>
          </button>
          <div class="dropdown-menu dropdown-caret dropdown-menu-right dropdown-animated brc-primary-m3 py-1" id="userMenu" style="display: none;">
            <a class="dropdown-item btn btn-outline-grey bgc-h-success-l3 btn-h-light-success btn-a-light-success" id="ganti-pass">
              <i class="fa fa-key text-success-m1 text-105 mr-1"></i>
              Ganti Password
            </a>
            <a class="dropdown-item btn btn-outline-grey bgc-h-secondary-l3 btn-h-light-secondary btn-a-light-secondary" href="{{ url('auth/logout') }}">
              <i class="fa fa-power-off text-warning-d1 text-105 mr-1"></i>
              Logout
            </a>
          </div>
        </div>
          <!-- Tempat untuk menambahkan elemen lain di navbar -->
        </div>
      </div>
    </nav>
    <div class="container content"  id="content" >
      @yield('content')
    </div>
  </div>

  <!-- Masukkan script lainnya jika diperlukan -->
  @yield('inline_script')

  <!-- Tautan untuk Bootstrap JS (Pastikan Anda memasukkan jQuery dan Popper.js jika diperlukan) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+zgbY9v9E69Jwii8cAPlktgz5F3cJLve+8EvoB1" crossorigin="anonymous"></script>

  <!-- Script untuk toggle sidebar dan menggeser konten -->
  <script>
    
    function toggleSidebar() {
      var sidebar = document.getElementById('sidebar');
      var content = document.getElementById('content');
      sidebar.classList.toggle('active');
      content.classList.toggle('active');
    }
  </script>
</body>

</html>
