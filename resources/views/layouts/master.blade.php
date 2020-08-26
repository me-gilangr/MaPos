<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Aplikasi Point Of Sales Industri</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="{{ asset('assets') }}/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('assets') }}/other/ionicons/ionicons.min.css">
  <link rel="stylesheet" href="{{ asset('assets') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="{{ asset('assets') }}/dist/css/adminlte.min.css">
  <link href="{{ asset('assets') }}/other/fonts/SourceSansPro.css" rel="stylesheet">

	@livewireStyles
	@yield('css')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <nav class="main-header navbar navbar-expand navbar-dark navbar-teal">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('main') }}" class="nav-link text-white">Aplikasi Point Of Sales - Industri</a>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link text-white" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i> &ensp; {{ auth()->user()->name }}
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">
						<h6>Halo, {{ auth()->user()->name }}</h6>
						<img src="{{ asset('images/baseImage/logo.png') }}" alt="Logo" class="img-fluid" style="height: 100px !important;"> <br>
						<span class="badge badge-primary">{{ strtoupper(auth()->user()->roles->first()->name) }}</span>
					</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item text-center">
            <i class="fas fa-envelope mr-2"></i> Pengaturan User
          </a>
          <div class="dropdown-divider"></div>
					<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item dropdown-footer"> <i class="fa fa-sign-out-alt"></i> &ensp; Logout</a>
					
					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						@csrf
					</form>
        </div>
      </li>
    </ul>
  </nav>

  <aside class="main-sidebar elevation-4 sidebar-light-teal">
    <a href="{{ route('main') }}" class="brand-link">
      <img src="{{ asset('images/baseImage/logo.jpg') }}"
					alt="Logo"
					class="brand-image img-circle elevation-3"
					style="opacity: .8">
      <span class="brand-text font-weight-light"> &ensp; POS - Industri</span>
    </a>

		@include('layouts.sidebar')
  </aside>

  <div class="content-wrapper">
    <section class="content-header pl-4 pr-4">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ isset($title) ? $title:'Halaman Utama' }}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="{{ route('main') }}">Pos - Industri</a></li>
							@php
								$page = URL::current();
								$page = explode('/', $page);
							@endphp								
							@if (isset($page[3]))
								<li class="breadcrumb-item active">{{ ucwords($page[3]) }}</li>
							@endif
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content pl-4 pr-4">
			@yield('content')
    </section>
  </div>
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.0-rc.5
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
  </footer>

  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>

<script src="{{ asset('assets') }}/plugins/jquery/jquery.min.js"></script>
<script src="{{ asset('assets') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('assets') }}/plugins/datatables/jquery.dataTables.js"></script>
<script src="{{ asset('assets') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="{{ asset('assets') }}/dist/js/adminlte.min.js"></script> 

{{-- <script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script> --}}

@livewireScripts
@stack('script')
@yield('script')

</body>
</html>
