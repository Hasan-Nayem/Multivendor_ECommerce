  <!-- Bootstrap bundle JS -->
  <script src="{{ asset('backend/assets/js/bootstrap.bundle.min.js') }}"></script>
  <!--plugins-->
  <script src="{{ asset('backend/assets/js/jquery.min.js') }}"></script>
  <script src="{{ asset('backend/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
  <script src="{{ asset('backend/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
  <script src="{{ asset('backend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
  <script src="{{ asset('backend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
  <script src="{{ asset('backend/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
  <script src="{{ asset('backend/assets/js/pace.min.js') }}"></script>
  <script src="{{ asset('backend/assets/plugins/chartjs/js/Chart.min.js') }}"></script>
  <script src="{{ asset('backend/assets/plugins/chartjs/js/Chart.extension.js') }}"></script>
  <script src="{{ asset('backend/assets/plugins/apexcharts-bundle/js/apexcharts.min.js') }}"></script>
  <!--app-->
  <script src="{{ asset('backend/assets/js/app.js') }}"></script>
  <script src="{{ asset('backend/assets/js/index2.js') }}"></script>
  <!-- CK Editor -->
  <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <script>
    new PerfectScrollbar(".best-product")
  </script>

  <!-- CK Editor Calling Methods -->
  <script>
    ClassicEditor
      .create( document.querySelector( '#editor' ) )
      .then( editor => {
        console.log( editor );
      } )
      .catch( error => {
        console.error( error );
      } );


      ClassicEditor
      .create( document.querySelector( '#editor2' ) )
      .then( editor2 => {
        console.log( editor );
      } )
      .catch( error => {
        console.error( error );
      } );
  </script>

  <!-- Toastr JS Calling Methods -->
  <script type="text/javascript">
    toastr.options = {
      "closeButton": true,
      "debug": false,
      "newestOnTop": true,
      "progressBar": true,
      "positionClass": "toast-top-right",
      "preventDuplicates": false,
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "5000",
      "extendedTimeOut": "2000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }

    
      @if(Session::has('message'))
      var type = "{{ Session::get('alert-type', 'info') }}";
      
      switch(type){
          case 'info':
            toastr.info("{{ Session::get('message') }}");
          break;
          
          case 'warning':
            toastr.warning("{{ Session::get('message') }}");
          break;

          case 'success':
            toastr.success("{{ Session::get('message') }}");
          break;

          case 'error':
            toastr.error("{{ Session::get('message') }}");
          break;
      }
      @endif
    

  </script>
