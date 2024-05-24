@include('dashboard.layouts.top')
@include('dashboard.layouts.header')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="row">

                    <!-- Sales Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Absensi <span>| Hari ini</span></h5>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-cart"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $total }}</h6>
                                        <span class="text-success small pt-1 fw-bold"></span> <span
                                            class="text-muted small pt-2 ps-1">Masuk</span>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Sales Card -->

                    <!-- Revenue Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Terlambat <span>| Hari ini</span></h5>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-currency-dollar"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $terlambat }}</h6>
                                        <span class="text-success small pt-1 fw-bold"></span> <span
                                            class="text-muted small pt-2 ps-1">Terlambat</span>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Revenue Card -->

                    <!-- Customers Card -->
                    <div class="col-xxl-4 col-xl-12">

                        <div class="card info-card customers-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Total Pegawai <span></span></h5>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $jumlahpegawai }}</h6>
                                        <span class="text-danger small pt-1 fw-bold"></span> <span
                                            class="text-muted small pt-2 ps-1">Pegawai</span>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div><!-- End Customers Card -->

                    <!-- Reports -->
                    <div class="col-12">
                        <div class="card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Reports <span>/Today</span></h5>

                                <!-- Line Chart -->
              <!-- Column Chart -->
              <div id="columnChart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  new ApexCharts(document.querySelector("#columnChart"), {
                    series: [{
                      name: 'Tepat',
                      data: [

                        $totalMasuk = DB::table('absensis')
                        ->where('status', 'masuk')
                        ->whereMonth('tanggal', '05')
                        ->whereYear('tanggal', '2024')
                        ->count();

                        44, 55, 57, 56, 61, 58, 63, 60, 66, 66, 66, 66

                    ]
                    }, {
                      name: 'Terlambat',
                      data: [76, 85, 101, 98, 87, 105, 91, 114, 94, 66, 66, 66]
                    }],
                    chart: {
                      type: 'bar',
                      height: 350
                    },
                    plotOptions: {
                      bar: {
                        horizontal: false,
                        columnWidth: '55%',
                        endingShape: 'rounded'
                      },
                    },
                    dataLabels: {
                      enabled: false
                    },
                    stroke: {
                      show: true,
                      width: 2,
                      colors: ['transparent']
                    },
                    xaxis: {
                      categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Juni', 'Juli', 'Agus', 'Sept','Okt', 'Nov','Des'],
                    },
                    yaxis: {
                      title: {
                        text: ' (Orang)'
                      }
                    },
                    fill: {
                      opacity: 1
                    },
                    tooltip: {
                      y: {
                        formatter: function(val) {
                          return "" + val + " Orang"
                        }
                      }
                    }
                  }).render();
                });
              </script>
              <!-- End Column Chart -->

                                <!-- End Line Chart -->

                            </div>

                        </div>
                    </div><!-- End Reports -->


                    <!-- Top Selling -->


                </div>
            </div><!-- End Left side columns -->

            <!-- Right side columns -->
            <div class="col-lg-4">

                <!-- Recent Activity -->
                <div class="card">
                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                            </li>

                            <li><a class="dropdown-item" href="#">Today</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">Rangking karyawan terbaik<span></span></h5>

                        <div class="activity">
                            @php
                                $nomorut = 1; // Inisialisasi nomor urut
                            @endphp

                            @foreach ($pegawaiterbaik as $row)
                                @php
                                    $datapegawai = $pegawaiModel->DataPegawai($row->id);
                                @endphp

                                @foreach ($datapegawai as $index => $data)
                                    <div class="activity-item d-flex">
                                        <div class="activite-label">{{ $nomorut }}</div>
                                        <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                                        <div class="activity-content">
                                            <a href="#" class="fw-bold text-dark">{{ $data->namapegawai }}</a>
                                        </div>
                                    </div><!-- End activity item-->
                                    @php
                                        $nomorut++; // Increment nomor urut
                                    @endphp
                                @endforeach
                            @endforeach
                        </div>

                    </div>
                </div><!-- End Recent Activity -->
                <div class="card">
                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                            </li>

                            <li><a class="dropdown-item" href="#">Today</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">Rangking karyawan terburuk<span></span></h5>

                        <div class="activity">
                            @php
                                $nomorut = 1; // Inisialisasi nomor urut
                            @endphp

                            @foreach ($pegawaiterburuk as $row)
                                @php
                                    $datapegawai = $pegawaiModel->DataPegawai($row->id);
                                @endphp

                                @foreach ($datapegawai as $index => $data)
                                    <div class="activity-item d-flex">
                                        <div class="activite-label">{{ $nomorut }}</div>
                                        <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                                        <div class="activity-content">
                                            <a href="#" class="fw-bold text-dark">{{ $data->namapegawai }}</a>
                                        </div>
                                    </div><!-- End activity item-->
                                    @php
                                        $nomorut++; // Increment nomor urut
                                    @endphp
                                @endforeach
                            @endforeach
                        </div>

                    </div>
                </div><!-- End Recent Activity -->

                                <div class="card">
                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                            </li>

                            <li><a class="dropdown-item" href="#">Today</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">Ulang Bulan ini<span></span></h5>

                        <div class="activity">
                            @php
                                $nomorut1 = 1; // Inisialisasi nomor urut
                            @endphp

                            @foreach ($ulangtahun as $row)
                                    <div class="activity-item d-flex">
                                        <div class="activite-label">{{ $nomorut1 }}</div>
                                        <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                                        <div class="activity-content">
                                            <a href="#" class="fw-bold text-dark">{{ $row->namapegawai.', '. date('d F Y', strtotime($row->tgllahir));}}</a>
                                        </div>
                                    </div><!-- End activity item-->
                                    @php
                                        $nomorut1++; // Increment nomor urut
                                    @endphp
                            @endforeach
                        </div>

                    </div>
                </div><!-- End Recent Activity -->

            </div><!-- End Right side columns -->


        </div><!-- End Right side columns -->

        </div>
    </section>

</main><!-- End #main -->

@include('dashboard.layouts.foot')
