<!DOCTYPE html>
<html lang="hu">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Nadix Árfolyam Manager</title>

  <link rel="stylesheet" href="/css/app.css">
  <link rel="stylesheet" href="{{ mix('css/all.min.css') }}"> 
  <!-- <link href="{{ asset('css/adminlte.css') }}" rel="stylesheet" type="text/css" >
  <link href="{{ asset('css/skins.css') }}" rel="stylesheet" type="text/css" > -->
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <router-link to="/dashboard" class="nav-link">Főoldal</a>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
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
      <!-- Notifications Dropdown Menu -->

      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i
            class="fas fa-th-large"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="" alt="" class="brand-image  elevation-3"
           style="opacity: 1">
      <span class="brand-text font-weight-light">Master</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="./img/profile.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <router-link to="/dashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Áttekintés
              </p>
            </a>
          </li>

          <!-- Management Dropdown -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-cog green"></i>
              <p>
                Kezelés
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

               <!-- Arfolyam -->
               <li class="nav-item">
                <router-link to="/arfolyam" class="nav-link">
                  <i class="fas fa-coins nav-icon ml-3"></i>
                  <p>Árfolyamok</p>
                </router-link>
              </li>

              <!-- Középárf -->
              <li class="nav-item">
                <router-link to="/kozep" class="nav-link">
                  <i class="fas fa-university nav-icon ml-3"></i>
                  <p>Banki Közép</p>
                </router-link>
              </li>
              
              <!-- Listazo -->
              <li class="nav-item">
                <router-link to="/listazo" class="nav-link">
                  <i class="fas fa-list nav-icon ml-3"></i>
                  <p>Bizonylat Listázó</p>
                </router-link>
              </li>
              
              <!-- Users -->
              <li class="nav-item">
                <router-link to="/users" class="nav-link">
                  <i class="fas fa-users nav-icon ml-3"></i>
                  <p>Felhasználók</p>
                </router-link>
              </li>
            </ul>
          </li>

          @can('isAdmin')
          <li class="nav-item">
            <router-link to="/video" class="nav-link">
            <i class="nav-icon fas fa-video"></i>
              <p>
                Kamerák
              </p>
            </router-link>
          </li>
          @endcan
          <!-- Dev -->
          @can('isDev')
          <li class="nav-item">
            <router-link to="/developer" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Fejlesztői
              </p>
            </router-link>
          </li>
          @endcan
          <!-- Profile -->
          <li class="nav-item">
            <router-link to="/profile" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Profil
              </p>
            </router-link>
          </li>

          <!-- Logout -->
          <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                    <i class="nav-icon fa fa-power-off"></i>
                    <p>
                        {{ __('Kilépés') }}
                    </p>
                 </a>
             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                 @csrf
             </form>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- <div class="content-header"> -->
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <!-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol> -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    <!-- </div> -->
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <router-view></router-view>
        <vue-progress-bar></vue-progress-bar>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Online Váltók</h5>
      <div class="spinner-grow spinner-grow-sm text-success" role="status"></div>
      <span>Pesti U.</span><br>
      <div class="spinner-grow spinner-grow-sm text-success" role="status"></div>
      <span>Únió</span><br>
      <div class="spinner-grow spinner-grow-sm text-danger" role="status"></div>
      <span>Tisza Lajos</span><br>
      <div class="spinner-grow spinner-grow-sm text-success" role="status"></div>
      <span>Kárász</span><br>
      <div class="spinner-grow spinner-grow-sm text-danger" role="status"></div>
      <span>Homoktövis</span><br>
      <div class="spinner-grow spinner-grow-sm text-success" role="status"></div>
      <span>Dunakeszi</span><br>
      <div class="spinner-grow spinner-grow-sm text-success" role="status"></div>
      <span>Berettyó</span><br>
      <div class="spinner-grow spinner-grow-sm text-success" role="status"></div>
      <span>Szoboszló</span><br>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Bármi
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2020 <a href="mailto:balint.biro@mradmin.hu">Meh</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<script src="/js/app.js" charset="utf-8"></script>
<script src="{{ mix('js/all.min.js') }}"></script>
</body>
</html>
