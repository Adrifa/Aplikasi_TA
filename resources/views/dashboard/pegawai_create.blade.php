<!-- resources/views/pegawais/create.blade.php -->
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
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
         <div class="card info-card sales-card">
          <div class="row">
                <div class="card-body">
                  <h5 class="card-title">Data <span>| Pegawai</span></h5>
<form action="{{ route('pegawais.store') }}" method="POST">
    @csrf
    <div class="row mb-3">
        <label for="namapegawai" class="col-sm-2 col-form-label">Nama Pegawai</label>
        <div class="col-sm-10">
            <input type="text" name="namapegawai" class="form-control">
        </div>
    </div>

    <div class="row mb-3">
        <label for="hp" class="col-sm-2 col-form-label">Hp</label>
        <div class="col-sm-10">
            <input type="text" name="hp" class="form-control">
        </div>
    </div>

    <div class="row mb-3">
        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
        <div class="col-sm-10">
            <input type="text" name="alamat" class="form-control">
        </div>
    </div>

    <div class="row mb-3">
        <label for="tgllahir" class="col-sm-2 col-form-label">Tgl Lahir</label>
        <div class="col-sm-4">
            <input type="date" name="tgllahir" class="form-control">
        </div>
    </div>

    <div class="row mb-3">
        <label for="rfid" class="col-sm-2 col-form-label">No.RFID</label>
        <div class="col-sm-10">
            <input type="text" name="rfid" class="form-control">
        </div>
    </div>

    <div class="row mb-3">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="email" name="email" class="form-control">
        </div>
    </div>

    <div class="row mb-3">
        <label for="password" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
            <input type="text" name="password" class="form-control">
        </div>
    </div>

    <div class="row mb-3">
        <label for="iddepartement" class="col-sm-2 col-form-label">Departement</label>
        <div class="col-sm-10">
            <select name="iddepartement" class="form-control" required>
                @foreach ($departements as $departement)
                    <option value="{{ $departement->id }}">{{ $departement->namadepartement }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-sm-10 offset-sm-2">
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </div>
    </div>
</form>




              <!-- End Table with stripped rows -->
            </div>
          </div>
        </div>
        </div><!-- End Left side columns -->


      </div>
    </section>

  </main><!-- End #main -->

@include('dashboard.layouts.foot')

