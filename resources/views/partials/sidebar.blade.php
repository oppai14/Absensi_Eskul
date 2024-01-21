<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
      <img src="{{ asset('img/logouin.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SMK BAKTI NUSANTARA 666</span>
    </a>
  
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('img/user1.png') }}"class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ auth()->user()->name }}</a>
        </div>
      </div>
  
     
  
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Data
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
        {{-- Halaman Sasaran     --}}
            <ul class="nav nav-treeview">
              <li class="nav-item">
                @can ('dekan')
                <a href="{{ route('absensi.index') }}" class="nav-link {{ Request::is('absensi') ? 'active' : '' }}">
                  <i class="bi bi-folder2-open"></i>
                  <p>absensi</p>
                </a>
                @endcan
              </li>
             </ul>
          