<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="/dashboard/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/dashboard/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>

    <!-- Right navbar links -->
    
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <span class="brand-text font-weight-light">  &nbsp;       &nbsp;  Fazl Mebel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      
      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         
          <li class="nav-item">
            <a href="{{route('settings.index')}}" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Settings
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route("abouts.index")}}" class="nav-link">
              <i class="nav-icon far fa-address-card"></i>
              <p>
               About
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route("boxs.index")}}" class="nav-link">
              <i class="nav-icon fas fa-address-card"></i>
              <p>
               About Boxs
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route("information.index")}}" class="nav-link">
              <i class="nav-icon fas fa-sitemap"></i>
              <p>
               Information
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route("aboutInfo.index")}}" class="nav-link">
              <i class="nav-icon fas fa-warehouse"></i>
              <p>
                About Information
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route("category.index")}}" class="nav-link">
              <i class="nav-icon fab fa-product-hunt"></i>
              <p>
                Category
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route("product.index")}}" class="nav-link">
              <i class="nav-icon fab fa-product-hunt"></i>
              <p>
               Products
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route("informationAboutUs.index")}}" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p>
               Information About Us
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route("gallery.index")}}" class="nav-link">
              <i class="nav-icon fas fa-image"></i>
              <p>
               Gallery
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route("consultation.index")}}" class="nav-link">
              <i class="nav-icon fa  fa-download"></i>
              <p>
               Consultation
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route("order.index")}}" class="nav-link">
              <i class=" nav-icon fa-brand fa-jedi-order"></i>
              <p>
               Order
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route("frontend.index")}}" class="nav-link">
              <i class=" nav-icon fa-brand fa-jedi-order"></i>
              <p>
               Frontend
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route("comment.index")}}" class="nav-link">
              <i class=" nav-icon fa-brand fa-jedi-order"></i>
              <p>
               Comments
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
