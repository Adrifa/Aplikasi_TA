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
                  <h5 class="card-title">Pegawai <span></span></h5>
                <a href="{{ route('pegawais.create') }}"><button type="button" class="btn btn-outline-primary btn-sm">Tambah Data</button></a>
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th style="width: 10%;text-align:center">ID</th>
                            <th style="text-align: left">Nama Pegawai</th>
                            <th style="text-align: center">HP</th>
                            <th style="text-align: center">Alamat</th>
                            <th style="text-align: center">Tanggal Lahir</th>
                            <th style="text-align: center">RFID</th>
                            <th style="text-align: center">Email</th>
                            <th style="width: 10%;text-align:center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pegawais as $pegawai)
                            <tr>
                                <td style="text-align: left">{{ $pegawai->id }}</td>
                                <td style="text-align: left">{{ $pegawai->namapegawai }}</td>
                                <td style="text-align: left">{{ $pegawai->hp }}</td>
                                <td style="text-align: left">{{ $pegawai->alamat }}</td>
                                <td style="text-align: left">{{ $pegawai->tgllahir }}</td>
                                <td style="text-align: left">{{ $pegawai->rfid }}</td>
                                <td style="text-align: left">{{ $pegawai->email }}</td>
                                <td style="text-align: center">

                                    <form action="{{ route('pegawais.destroy', $pegawai->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('pegawais.edit', $pegawai->id) }}"><button type="button" class="btn btn-success"><i class="bi bi-pencil"></i></button></a>
                                        <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>

                                    </form>
                                </td>
                            </tr>
                        @endforeach
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

@include('dashboard.layouts.foot')
