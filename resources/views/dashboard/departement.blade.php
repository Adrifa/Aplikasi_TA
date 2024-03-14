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
                  <h5 class="card-title">Departement <span>| </span></h5>
                <a href="{{ route('departements.create') }}"><button type="button" class="btn btn-outline-primary btn-sm">Tambah Data</button></a>
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th style="width: 10%;text-align:left">ID</th>
                            <th style="text-align: left">Departement</th>
                            <th style="text-align: center">Keterangan</th>
                            <th style="width: 10%;text-align:center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach($departements as $index => $departement)
                            <tr>
                                <td style="text-align: left">{{ $index + 1 }}</td>
                                <td style="text-align: left">{{ $departement->namadepartement }}</td>
                                <td style="text-align: left">{{ $departement->keterangan }}</td>
                                <td style="text-align: center">

                                    <form action="{{ route('departements.destroy', $departement->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('departements.edit', $departement->id) }}"><button type="button" class="btn btn-success"><i class="bi bi-pencil"></i></button></a>
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
