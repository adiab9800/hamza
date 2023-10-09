<!DOCTYPE html>
<html>
<head>
    <!-- ... -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.32/sweetalert2.min.css">
    <link href="{{asset('css/toastr.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/adminlte.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
    <style>
        th,td,tr{
            text-align: center;
        }
    </style>
    <!-- ... -->
</head>
  <body class="hold-transition sidebar-mini">
    <div class="wrapper">
      @include('navbar')
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- <a href="../../index3.html" class="brand-link">
          <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">AdminLTE 3</span>
        </a> -->
        <div class="sidebar">
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <!-- <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
            </div>
            <div class="info">
              <a href="{{url('/')}}" class="d-block">Dashboard</a>
            </div>
          </div>
          <nav class="mt-2">
            @include('sidebar')
          </nav>
        </div>
      </aside>
      <div class="content-wrapper">
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>@yield('title')</h1>
              </div>
            </div>
          </div>
        </section>
        <section class="content">
          @yield('content')
        </section>
      </div>
      <aside class="control-sidebar control-sidebar-dark"></aside>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.32/sweetalert2.all.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/adminlte.js') }}"></script>
    @yield('scripts')
    <script>
        $(document).ready(function(){
            let Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
            @if(Session::has('success'))
            Toast.fire({
                icon: 'success',
                title: "{{Session::get('success')}}"
            })
            @elseif(Session::has('error'))
            Toast.fire({
                icon: 'error',
                title: "{{Session::get('error')}}"
            })
            @endif
        })
    </script>
  </body>
</html>
