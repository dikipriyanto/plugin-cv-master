<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.head')
</head>

<body>
    @include('layouts.header')
    <div class="main">

        <!-- Left SideBar -->
        @include('layouts.sidebar')
        <!-- End SideBar-->

        <section class="content">
          @yield('content')
          
            <!-- Footer-->
            @include('layouts.footer')
            <!-- end Footer -->

        </section>
    </div>
    @include('layouts.script')
</body>

</html>

