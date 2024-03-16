
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

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
         <div class="card info-card sales-card">
          <div class="row">
                <div class="card-body">
                  <h5 class="card-title">Data <span>| Pegawai</span></h5>
            <form action="{{ route('pegawais.update', $pegawai->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Namapegawai</label>
                  <div class="col-sm-10">
                     <input type="text" name="namapegawai" value="{{ $pegawai->namapegawai }}" class="form-control" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Hp</label>
                  <div class="col-sm-10">
                    <input type="text" name="hp" value="{{ $pegawai->hp }}" class="form-control" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Alamat</label>
                  <div class="col-sm-10">
                    <input type="text" name="alamat" value="{{ $pegawai->alamat }}" class="form-control" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Tgl Lahir</label>
                  <div class="col-sm-4">
                    <input type="date" name="tgllahir" value="{{ $pegawai->tgllahir }}" class="form-control" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">No.RFID</label>
                  <div class="col-sm-10">
                    <input type="text" name="rfid" value="{{ $pegawai->rfid }}"  class="form-control" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" name="email" value="{{ $pegawai->email }}" class="form-control" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" name="password" value="{{ $pegawai->password }}" class="form-control" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Departement</label>
                  <div class="col-sm-10">
                    <select name="iddepartement" class="form-control" required>
                    @foreach ($departements as $departement)
                        <option value="{{ $departement->id }}" {{ $pegawai->iddepartement == $departement->id ? 'selected' : '' }}>{{ $departement->namadepartement }}</option>
                    @endforeach
                    </select>
                  </div>
                </div>



                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary" >Submit Form</button>
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




