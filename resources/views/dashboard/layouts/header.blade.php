
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">SIRIAN</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

           <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="{{ asset('assets/nice/img/profile-img.jpg') }}" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"> {{ Session::get('name') }}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{ Session::get('email') }}</h6>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ route('login') }}">
                <i class="bi bi-box-arrow-right"></i>
                <span>Keluar</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{ route('dashboard.index') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->



      <li class="nav-heading">Menu</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('pegawais.index') }}">
                <i class="bi bi-person"></i>
                <span>Karyawan</span>
            </a>
        </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('departements.index') }}">
          <i class="bi bi-envelope"></i>
          <span>Departement</span>
        </a>
      </li><!-- End Contact Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('absensis.index') }}">
          <i class="bi bi-card-list"></i>
          <span>Absensi</span>
        </a>
      </li><!-- End Register Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed"href="{{ route('statusjabatan.index') }}">
          <i class="bi bi-dash-circle"></i>
          <span>Status Jabatan</span>
        </a>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('laporan.index') }}">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Laporan</span>
        </a>
      </li><!-- End Login Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('gaji.index') }}">
          <i class="bi bi-dash-circle"></i>
          <span>Gaji</span>
        </a>
      </li><!-- End Error 404 Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('settingjams.index') }}">
          <i class="bi bi-card-list"></i>
          <span>Setting Jam</span>
        </a>
      </li><!-- End Register Page Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('login.logout') }}">
          <i class="bi bi-file-earmark"></i>
          <span>Keluar</span>
        </a>
      </li><!-- End Blank Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->
