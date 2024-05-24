@include('user.layouts.top')
@include('user.layouts.header')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">absensi</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="card info-card sales-card">
                    <div class="row">
                        <div class="card-body">
                            <h5 class="card-title">Data <span>| Pegawai</span></h5>
                            <form method="POST" class="row g-3 needs-validation">


                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Nama </label>
                                    <div class="col-sm-10">
                                        <input type="text" name="namapegawai" value="{{ $pegawai->namapegawai }}"
                                            class="form-control" readonly>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Departement </label>
                                    <div class="col-sm-10">
                                        <input type="text" name="namadepartement"
                                            value="{{ $pegawai->namadepartement }}" class="form-control" readonly>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Status jabatan </label>
                                    <div class="col-sm-10">
                                        <input type="text" name="statusjabatan"
                                            value="{{ $pegawai->namastatusjabatan }}" class="form-control" readonly>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Gaji Pokok </label>
                                    <div class="col-sm-10">
                                        <input type="text" name="gaji" value="{{ number_format($pegawai->gaji) }}"
                                            class="form-control" readonly>
                                    </div>
                                </div>

                            </form>
                            <!-- End Table with stripped rows -->
                        </div>
                    </div>
                </div>

                <div class="card info-card sales-card">
                    <div class="row">
                        <div class="card-body">
                            <h5 class="card-title">Absensi <span>| </span></h5>
                            <div class="col-lg-12">

                                <form action="{{ route('cekbulan.submit') }}" method="POST">
                                    @csrf
                                <input type="hidden" name="id" value="{{ $pegawai->id }}" class="form-control" readonly>
                                 <div class="row">
                                 <div class="col-sm-6">
                                 <div class="row mb-6">
                                    <label for="inputText" class="col-sm-3 col-form-label">Filter</label>
                                    <div class="col-sm-9">
                                    <select id="bulan" name="bulan" class="form-select">
                                        <option value="">Pilih Bulan</option>
                                        <option value="01">Januari</option>
                                        <option value="02">Februari</option>
                                        <option value="03">Maret</option>
                                        <option value="04">April</option>
                                        <option value="05">Mei</option>
                                        <option value="06">Juni</option>
                                        <option value="07">Juli</option>
                                        <option value="08">Agustus</option>
                                        <option value="09">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                    </select>
                                    </div>
                                    </div>
                                  </div>

                                  <div class="col-sm-3">
                                  <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <select class="form-select" name="tahun">
                                            <option value="">Pilih Tahun</option>
                                            @php
                                            $tahunSekarang = date('Y');
                                            @endphp
                                            <option value="{{ $tahunSekarang - 1 }}">{{ $tahunSekarang - 1 }}</option>
                                            <option value="{{ $tahunSekarang }}">{{ $tahunSekarang }}</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="submit" class="btn btn-primary" name="submit">Tampil</button>
                                    </div>
                                    </div>
                                  </div>
                                  </div>
                            </form>
                            </div>


                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th style="width: 10%;text-align:left">ID</th>
                                        <th style="text-align: center">Tanggal</th>
                                        <th style="text-align: center">Jam</th>
                                        <th style="text-align: center">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($absensis as $index => $absensi)
                                        @if ($absensi->status == 'masuk')
                                            <?php $a[] = 1; ?>
                                        @elseif($absensi->status == 'terlambat')
                                            <?php $b[] = 1; ?>
                                        @elseif($absensi->status == 'keluar')
                                            <?php $c[] = 1; ?>
                                        @endif
                                        <tr>
                                            <td style="text-align: left">{{ $index + 1 }}</td>
                                            <td style="text-align: left">
                                                {{ date('d F Y', strtotime($absensi->tanggal)) }}</td>
                                            <td style="text-align: left">{{ date('H:i:s', strtotime($absensi->jam)) }}
                                            </td>
                                            <td style="text-align: left">{{ $absensi->status }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <p>
                                @if (isset($a))
                                    Total Masuk: {{ array_sum($a) }}
                                @else
                                    Total Masuk: 0
                                @endif
                                ,
                                @if (isset($b))
                                    Total Terlambat: {{ array_sum($b) }}
                                @else
                                    Total Terlambat: 0
                                @endif
                                ,
                                @if (isset($c))
                                    Total Keluar: {{ array_sum($c) }}
                                @else
                                    Total Keluar: 0
                                @endif
                            </p>

                            <!-- End Table with stripped rows -->
                        </div>
                    </div>
                </div>

                <div class="card info-card sales-card">
                    <div class="row">
                        <div class="card-body">
                            <h5 class="card-title">Gaji Diterima </h5>
                            <table class="table">
                                <tbody>

                                    <tr>
                                        <td>Gaji Pokok:</td>
                                        <td style="text-align:right">{{ number_format($pegawai->gaji) }}</td>
                                    </tr>
                                    @php
                                        $totalTerlambat = array_sum($b);
                                    @endphp
                                    <tr>
                                        <td>Potongan terlambat (@10,000):</td>
                                        <td style="text-align:right">
                                            @if ($totalTerlambat > 0)
                                               {{ number_format($totalTerlambat * 10000) }}
                                            @else
                                                0
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Gaji Bersih:</td>
                                        <td style="text-align:right">
                                            @if ($totalTerlambat > 0)
                                                {{ number_format($pegawai->gaji - ($totalTerlambat * 10000)) }}
                                            @else
                                               {{ number_format($pegawai->gaji) }}
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->
                        </div>
                    </div>
                </div>


            </div><!-- End Left side columns -->


        </div>
    </section>

</main><!-- End #main -->

@include('user.layouts.foot')
