<!DOCTYPE html>
<html class="no-js" lang="en">

    <head>
        @include('frontend.includes.header')
        @include('frontend.includes.css')
        
    </head>

    <body>
        @include('frontend.includes.popup')
        @include('frontend.includes.navmenu')
        
        @yield('body-content')

        @include('frontend.includes.footer')
        @include('frontend.includes.script')    
        
    </body>

</html>