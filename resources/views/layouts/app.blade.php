<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Yuki Yoshida Live History</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
        <!-- Styles -->
        <style>
        nav {
            font-size:11px;
        }
        </style>
    </head>
    <body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ url('/') }}">Yuki Yoshida Live History</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Year
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="{{ url('years/2003') }}">2003</a></li>
            <li><a class="dropdown-item" href="#">2004</a></li>
            <li><a class="dropdown-item" href="#">2005</a></li>
            <li><a class="dropdown-item" href="#">2009</a></li>
            <li><a class="dropdown-item" href="#">2010</a></li>
            <li><a class="dropdown-item" href="#">2011</a></li>
            <li><a class="dropdown-item" href="#">2012</a></li>
            <li><a class="dropdown-item" href="#">2013</a></li>
            <li><a class="dropdown-item" href="#">2014</a></li>
            <li><a class="dropdown-item" href="#">2015</a></li>
            <li><a class="dropdown-item" href="#">2016</a></li>
            <li><a class="dropdown-item" href="#">2017</a></li>
            <li><a class="dropdown-item" href="#">2018</a></li>
            <li><a class="dropdown-item" href="#">2019</a></li>
            <li><a class="dropdown-item" href="#">2020</a></li>
            <li><a class="dropdown-item" href="#">2021</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Artists
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">w-inds.</a></li>
            <li><a class="dropdown-item" href="{{ url('artists/mr.children') }}">Mr.Children</a></li>
            <li><a class="dropdown-item" href="#">B'z</a></li>
            <li><a class="dropdown-item" href="#">flumpool</a></li>
            <li><a class="dropdown-item" href="#">福山雅治</a></li>
            <li><a class="dropdown-item" href="#">コブクロ</a></li>
            <li><a class="dropdown-item" href="#">小池美由</a></li>
            <li><a class="dropdown-item" href="#">SE7EN</a></li>
            <li><a class="dropdown-item" href="#">スキマスイッチ</a></li>
            <li><a class="dropdown-item" href="#">Kis-My-Ft2</a></li>
            <li><a class="dropdown-item" href="#">CHEMISTRY</a></li>
            <li><a class="dropdown-item" href="#">Charlie Puth</a></li>
            <li><a class="dropdown-item" href="#">ウカスカジー</a></li>
            <li><a class="dropdown-item" href="#">嵐</a></li>
            <li><a class="dropdown-item" href="#">フラチナリズム</a></li>
            <li><a class="dropdown-item" href="#">Official髭男dism</a></li>
          </ul>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
    @yield('content')
    </body>
</html>
