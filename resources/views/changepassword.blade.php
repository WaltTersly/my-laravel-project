<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>GYMMS</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
     
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
            class="fas fa-th-large"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      {{-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8"> --}}
      <span class="brand-text font-weight-light">GYMMS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          {{-- <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> --}}
         <img src="{{URL::asset('/image/gym_bg.jpg')}}" class="img-circle elevation-2" alt="profile Pic" height="160" width="1600">
        </div>
        <div class="info">
          <a href="#" class="d-block" role="button">{{ Auth::user()->name }}<span class="caret"></span></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt black"></i>
              <p>
                {{-- <i class="fas fa-cogs"></i> --}}
                Dashboard
                {{-- <i class="right fas fa-angle-left"></i> --}}
              </p>
            </a>
          </li>
           <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cogs blue"></i>
              <p>
                Starter Pages
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/permisions') }}" class="nav-link active">
                  {{-- <i class="far fa-circle nav-icon"></i> --}}
                  <i class="fas fa-flag-checkered"></i>
                  <p>Assign roles</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inactive Page</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item ">
            <a href="{{ route('logout') }}" class="nav-link " 
            onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();" >
              <i class="nav-icon fas fa-power-off red "></i>
              <p>
                {{ __('Logout') }}
                {{-- <i class="right fas fa-angle-left"></i> --}}
              </p>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              
            </a>
          </li>
            {{-- <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/permi" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Assign roles</p>
                </a>
              </li>
             
            </ul> --}}
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Simple Link
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  
  <!-- /.content-wrapper -->


   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>CHANGE PASSWORD</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->

      
      <a href="{{ url()->previous() }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>

          @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{session('status')}}
              </div>
                  
              @endif
              <div>
                @if ($errors->any())
                  <div class="alert alert-danger">
                
                <ul>
                @foreach ($errors->all() as $error )
                <li role="alert">
                     <a href="#" class="close" data-dismiss ="alert" arial-label="close">&times;</a>
                  {{$error}}
                </li>
                    
                @endforeach
              </ul>
              </div>
              @endif
              </div>

              @if (session('error'))
              <div class="alert alert-danger" role="alert">
                {{session('error')}}
              </div>
                  
              @endif

              @if (session()->get('message'))
              <div class="alert alert-success" role="alert">
                <a href="#" class="close" data-dismiss ="alert" arial-label="close">&times;

                </a>
                {{session()->get('message')}}
              </div>
                  
              @endif
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
         <form method="POST" action="{{ route('password.update') }}">
              @csrf

              <div class="form-group row">
                  <label for="oldpassword" class="col-md-4 col-form-label text-md-right">{{ __('Old Password') }}</label>

                  <div class="col-md-6">
                      <input id="oldpassword" type="password" class="form-control @error('oldpassword') is-invalid @enderror" name="oldpassword" value="{{ old('oldpassword') }}" required autocomplete="oldpassword" autofocus>

                      @error('oldpassword')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>

              <div class="form-group row">
                  <label for="new_password" class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>

                  <div class="col-md-6">
                      <input id="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" required autocomplete="new_password">

                      @error('new_password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>

              <div class="form-group row">
                  <label for="new_password_confirmation" class="col-md-4 col-form-label text-md-right">{{ __('Confirm New Password') }}</label>

                  <div class="col-md-6">
                      <input id="new_password_confirmation" type="password" class="form-control" name="new_password_confirmation" required autocomplete="new_password_confirmation">
                  </div>
              </div>

              <div class="form-group row mb-0">
                  <div class="col-md-6 offset-md-4">
                      <button type="submit" class="btn btn-primary">
                          {{ __('Change') }}
                      </button>
                  </div>
              </div>
          </form>
        
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2020 <a href="#">Tersly-encoding</a>.</strong> All rights reserved.
  </footer>
</div>
 <main class="py-4">
            @include('flash-message')

            @yield('content')
    </main>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/adminlte.min.js"></script> 
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
