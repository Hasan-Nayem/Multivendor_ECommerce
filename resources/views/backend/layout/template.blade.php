<!doctype html>
<html lang="en">

<head>
  @include ('backend.includes.header')
  @include ('backend.includes.css')  
</head>

  <body>
    <!--start wrapper-->
    <div class="wrapper">
      @include ('backend.includes.topbar') 
      @include ('backend.includes.asidebar') 


      <!-- Body Content Start -->
      @yield('body-content')
      <!-- Body Content End -->
          
     <!--start overlay-->
      <div class="overlay nav-toggle-icon"></div>
     <!--end overlay-->

     <!--Start Back To Top Button-->
       <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
     <!--End Back To Top Button-->

    </div>
    <!--end wrapper-->

    @include ('backend.includes.scripts') 
  </body>
</html>