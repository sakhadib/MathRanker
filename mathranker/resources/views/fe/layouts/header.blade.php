<!DOCTYPE html>
<html data-bs-theme="light" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MathRanker</title>

    <link rel="icon" href="{{url('rsx/logo.ico')}}" type="icon">

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Data Tables -->
    <script defer src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script defer src="{{url('fe/dt.js')}}"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <!-- Icons -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{url('fe/util.css')}}">
</head>
<body>

    <!-- Nav -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top bs">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{url('rsx/logo.svg')}}" alt="Bootstrap" width="50">
            </a>
          <a class="navbar-brand" href="#">MathRanker</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="./">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="problems.html">Problems</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contests.html">Contests</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">LeaderBoard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Feed</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">About</a>
              </li>
            </ul>
            <ul class="navbar-nav me-0 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" id="dm"><i class="uil uil-moonset" id="dmi"></i></a>
                </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/login">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/signup">Signup</a>
              </li>
              
            </ul>
            
          </div>
        </div>
      </nav>