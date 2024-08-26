<!DOCTYPE html>
<html lang="en">
  <head>
    @include('layouts.header')
  </head>


  <body>
    @include('layouts.navbar')
    
    <section class="content">
      @yield('content')
    </section>

    <footer>
      @include('layouts.footer')
    </footer>
  </body>
</html>
