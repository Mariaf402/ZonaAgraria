<!DOCTYPE html>
<html lang="en">
    <head>
        
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - Seller</title>

        <!--custom styles for this template-->
        <link href="{{asset('/dash/dist/css/styles.css')}}" rel="stylesheet" />

  

        <!--custom datatables for this template-->
        <link href="{{asset('/dash/dist/css/bootstrap.min.css')}}" rel="stylesheet" />

        <!--custom fonts for this template-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>

        
        @yield('css')
    </head>

    <body class="sb-nav-fixed">

    @include('seller.layouts.navs')

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
            @include('seller.layouts.navbarLateral')
            </div>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">  
                    @yield('content')
                    </div>
                </main>

            @include('seller.layouts.footer')
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

        <script src="{{asset('/dash/dist/js/scripts.js')}}"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>

        <script src="{{asset('/dash/dist/assets/demo/chart-area-demo.js')}}"></script>
        <script src="{{asset('/dash/dist/assets/demo/chart-bar-demo.js')}}"></script>

        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>

        <script src="{{asset('/dash/dist/assets/demo/datatables-demo.js')}}"></script>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        @yield('script')
    </body>

</html>
