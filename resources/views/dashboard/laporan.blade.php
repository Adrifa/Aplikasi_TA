<!-- resources/views/departements/create.blade.php -->
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
        <div class="col-lg-12">
         <div class="card info-card sales-card">
          <div class="row">
                <div class="card-body">
                  <h5 class="card-title">Data <span>| Laporan</span></h5>
                 <form action="{{ route('laporan.cek') }}" method="POST">
                    @csrf
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Bulan</label>
                  <div class="col-sm-10">
                    <select name="bln" id="bulan" class="form-control">
                        <option value="">Pilih Bulan</option>
                        <option value="01">January</option>
                        <option value="02">February</option>
                        <option value="03">March</option>
                        <option value="04">April</option>
                        <option value="05">May</option>
                        <option value="06">June</option>
                        <option value="07">July</option>
                        <option value="08">August</option>
                        <option value="09">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Keterangan</label>
                  <div class="col-sm-10">
                        <select name="thn" style="width:100%" class="form-control">
                            @for($thn = 2022; $thn <= now()->year; $thn++)
                                <option value="{{ $thn }}" {{ $thn == now()->year ? 'selected' : '' }}>{{ $thn }}</option>
                            @endfor
                        </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->



              <!-- End Table with stripped rows -->
            </div>
          </div>
        </div>
        </div><!-- End Left side columns -->


      </div>
    </section>

  </main><!-- End #main -->

@include('dashboard.layouts.foot')

