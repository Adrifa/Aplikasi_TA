@include('login.layouts.top')
  <main>
    <div class="container">
<style>
  #clock {
            font-size: 3em;
        }
</style>
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block" style="text-align: center">SISTEM INFORMASI KEHADIRAN DAN PENGGAJIAN DENGAN KARTU RFID</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                    <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert" style="text-align:center">
                     <h2 >Motivasi hari ini :</h2>
                      " <span id="motivasiSpan" ></span> "
                    </div>
                <div class="card-body">
                  <div class="pt-4 pb-2">
                    <div style="text-align: center;font-size: 18px;font-weight: 900">{{  $date }}</div>
                    <div id="clock" style="text-align: center;font-size: 18px;font-weight: 900"></div>
                    <div class="text-center small">TAP Kartu Kerja Anda Disini :</div>
                  </div>

                  <form  method="POST" action="{{ route('scanabsensi.submit') }}" class="row g-3 needs-validation" novalidate>
                    @csrf

                    <div class="col-12">
                      <label for="yourUsername" class="form-label"></label>
                      <div class="input-group has-validation">
                        <input type="text" name="rfid" class="form-control" id="yourUsername" required autofocus style="text-align:center">
                      </div>
                    </div>

                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit" name="login" style="display: none;">Scan</button>
                    </div>
                  </form>

                </div>
              </div>
              <script>
                function updateClock() {
                    const now = new Date();
                    const hours = String(now.getHours()).padStart(2, '0');
                    const minutes = String(now.getMinutes()).padStart(2, '0');
                    const seconds = String(now.getSeconds()).padStart(2, '0');
                    const timeString = `${hours}:${minutes}:${seconds}`;

                    document.getElementById('clock').textContent = timeString;
                }

                // Update the clock immediately and then every second
                updateClock();
                setInterval(updateClock, 1000);

              </script>

                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        const motivasi = @json($katamotivasi);
                        let index = 0;
                        const motivasiSpan = document.getElementById('motivasiSpan');

                        function updateMotivasi() {
                            motivasiSpan.textContent = motivasi[index];
                            index = (index + 1) % motivasi.length;
                        }

                        updateMotivasi();
                        setInterval(updateMotivasi, 8000); // Ganti teks setiap 5 detik
                    });
                </script>
 <!--
              <div class="credits">

                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
              </div>
-->
            </div>
          </div>
        </div>

      </section>

    </div>
@include('login.layouts.foot')
