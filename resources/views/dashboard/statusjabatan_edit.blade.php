
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
                  <h5 class="card-title">Data <span>| Status Jabatan</span></h5>
            <form action="{{ route('statusjabatan.update', $statusjabatan->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Nama Jabatan</label>
                  <div class="col-sm-10">
                     <input type="text" name="namastatusjabatan" value="{{ $statusjabatan->namastatusjabatan }}" class="form-control" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Gaji</label>
                  <div class="col-sm-10">
                    <input type="text" name="gaji" value="{{ $statusjabatan->gaji }}" class="form-control" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary" >Submit</button>
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



