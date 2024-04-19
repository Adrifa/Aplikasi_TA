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
                  <h5 class="card-title">Status Jabatan <span>| </span></h5>
                  <a href="{{ route('statusjabatan.create') }}"><button type="button" class="btn btn-outline-primary btn-sm">Tambah Data</button></a>
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Jabatan</th>
                            <th>Gaji</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($statusjabatans as $statusjabatan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $statusjabatan->namastatusjabatan }}</td>
                                <td>{{ $statusjabatan->gaji }}</td>
                                <td style="text-align: center">

                                    <form action="{{ route('statusjabatan.destroy', $statusjabatan->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('statusjabatan.edit', $statusjabatan->id) }}" class="btn btn-primary">Edit</a>
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
