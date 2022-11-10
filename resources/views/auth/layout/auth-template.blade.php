<!doctype html>
<html lang="en">

    <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
      <!-- Bootstrap CSS -->
      <link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
      <link href="{{ asset('backend/assets/css/bootstrap-extended.css') }}" rel="stylesheet" />
      <link href="{{ asset('backend/assets/css/style.css') }}" rel="stylesheet" />
      <link href="{{ asset('backend/assets/css/icons.css') }}" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

      <!-- loader-->
        <link href="{{ asset('backend/assets/css/pace.min.css') }}" rel="stylesheet" />

      <title>Onedash - Bootstrap 5 Admin Template</title>
    </head>

    <body>

      <!--start wrapper-->
      <div class="wrapper">
        
           <!--start content-->
           <main class="authentication-content">
            <div class="container-fluid">
              <div class="authentication-card">
                <div class="card shadow rounded-0 overflow-hidden">
                  <div class="row g-0">
                    <div class="col-lg-6 bg-login d-flex align-items-center justify-content-center">
                      <img src="{{ asset('backend/assets/images/error/login-img.jpg') }}" class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-6">
                      <div class="card-body p-4 p-sm-5">
                        <h5 class="card-title">Sign In</h5>
                        <p class="card-text mb-5">See your growth and get consulting support!</p>

                            @yield('auth-body')

                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
           </main>
            
           <!--end page main-->

      </div>
      <!--end wrapper-->


      <!--plugins-->
      <script src="{{ asset('backend/assets/js/jquery.min.js') }}"></script>
      <script src="{{ asset('backend/assets/js/pace.min.js') }}"></script>


    </body>

</html>


   