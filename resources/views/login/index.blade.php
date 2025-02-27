@include('login.layouts.top')
  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block" style="text-align: center">SISTEM INFORMASI KEHADIRAN DAN PENGGAJIAN DENGAN KARTU RFID</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4"></h5>
                    <p class="text-center small">Silahkan masukkan username dan passaword Anda :</p>
                  </div>

                  <form  method="POST" action="{{ route('login.submit') }}" class="row g-3 needs-validation" novalidate>
                    @csrf

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="email" name="email" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Please enter your username.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>
                    
                    <div class="col-12">
                      <strong> Captcha : </strong>
                      {!! NoCaptcha :: renderJs() !!}
                      {!! NoCaptcha :: display() !!}
                      @error('g-recaptcha-response')
                        <span class = "invalid-feedback" style="display: block;">{{$message}}</span>
                      @enderror
                    </div>

                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit" name="login">Login</button>
                    </div>
                  </form>

                </div>
              </div>
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
