<!DOCTYPE html>
<html data-bs-theme="light" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MathRanker</title>

    <link rel="icon" href="rsx/logo.ico" type="icon">

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Data Tables -->
    <script defer src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script defer src="dt.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <!-- Icons -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="util.css">
</head>
<body>
    <!-- Nav -->
<!-- Nav -->
<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top bs">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="rsx/logo.svg" alt="Bootstrap" width="50">
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
            <a class="nav-link" href="#">Contests</a>
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
            <a class="nav-link" aria-current="page" href="#">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Signup</a>
          </li>
          
        </ul>
        
      </div>
    </div>
  </nav>
<!-- nav -->
<div class="vh-10"></div>
<div class="pb-1 vh-20 df dfc aic">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="display-1 text-center">Problems</h1>
                <p class="lead text-center">Solve the problems you haven't solved yet. gain XP points and showcase your profile</p>
                <hr>
            </div>
        </div>
    </div>
</div>


<div class="container">
    <div class="row mt-2">
        <section class="main-table" id = "standing">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <table data-order='[[3, "asc"]]' data-page-length='25' id="stable" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Max XP</th>
                                    <th>Solved</th>
                                </tr>
                            </thead>
                            <tbody>
                                 <!-- <?php echo $rows; ?> -->
                                <tr>
                                    <td>1A</td>
                                    <td>Find the value of x in the equation: 2x + 5 = 17</td>
                                    <td>100</td>
                                    <td>100</td>
                                </tr>
                                <tr>
                                    <td>1B</td>
                                    <td>Find the value of x in the equation: 2x + 5 = 17</td>
                                    <td>100</td>
                                    <td>100</td>
                                </tr>
                                <tr>
                                    <td>2D</td>
                                    <td>Find the value of x in the equation: 2x + 5 = 17</td>
                                    <td>100</td>
                                    <td>100</td>
                                </tr>
                                <tr>
                                    <td>3C</td>
                                    <td>Find the value of x in the equation: 2x + 5 = 17</td>
                                    <td>100</td>
                                    <td>100</td>
                                </tr>
                                <tr>
                                    <td>4A</td>
                                    <td>Find the value of x in the equation: 2x + 5 = 17</td>
                                    <td>100</td>
                                    <td>100</td>
                                </tr>
                                <tr>
                                    <td>32A</td>
                                    <td>Find the value of x in the equation: 2x + 5 = 17</td>
                                    <td>100</td>
                                    <td>100</td>
                                </tr>
                                <tr>
                                    <td>1A</td>
                                    <td>Find the value of x in the equation: 2x + 5 = 17</td>
                                    <td>100</td>
                                    <td>100</td>
                                </tr>
                                <tr>
                                    <td>1B</td>
                                    <td>Find the value of x in the equation: 2x + 5 = 17</td>
                                    <td>100</td>
                                    <td>100</td>
                                </tr>
                                <tr>
                                    <td>2D</td>
                                    <td>Find the value of x in the equation: 2x + 5 = 17</td>
                                    <td>100</td>
                                    <td>100</td>
                                </tr>
                                <tr>
                                    <td>3C</td>
                                    <td>Find the value of x in the equation: 2x + 5 = 17</td>
                                    <td>100</td>
                                    <td>100</td>
                                </tr>
                                <tr>
                                    <td>4A</td>
                                    <td>Find the value of x in the equation: 2x + 5 = 17</td>
                                    <td>100</td>
                                    <td>100</td>
                                </tr>
                                <tr>
                                    <td>32A</td>
                                    <td>Find the value of x in the equation: 2x + 5 = 17</td>
                                    <td>100</td>
                                    <td>100</td>
                                </tr>
                                <tr>
                                    <td>1A</td>
                                    <td>Find the value of x in the equation: 2x + 5 = 17</td>
                                    <td>100</td>
                                    <td>100</td>
                                </tr>
                                <tr>
                                    <td>1B</td>
                                    <td>Find the value of x in the equation: 2x + 5 = 17</td>
                                    <td>100</td>
                                    <td>100</td>
                                </tr>
                                <tr>
                                    <td>2D</td>
                                    <td>Find the value of x in the equation: 2x + 5 = 17</td>
                                    <td>100</td>
                                    <td>100</td>
                                </tr>
                                <tr>
                                    <td>3C</td>
                                    <td>Find the value of x in the equation: 2x + 5 = 17</td>
                                    <td>100</td>
                                    <td>100</td>
                                </tr>
                                <tr>
                                    <td>4A</td>
                                    <td>Find the value of x in the equation: 2x + 5 = 17</td>
                                    <td>100</td>
                                    <td>100</td>
                                </tr>
                                <tr>
                                    <td>32A</td>
                                    <td>Find the value of x in the equation: 2x + 5 = 17</td>
                                    <td>100</td>
                                    <td>100</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>   
                </div>
            </div>
        </section>
    </div>
</div>


<div class="vh-15"></div>




<!-- Foot -->
<div class="hm-7 vh-55 df dfc jcc aic">
    <div class="container">
      <div class="row">
        <div class="col-md-12 df dfc jcc aic">
          <img src="rsx/logo.svg" alt="" style="width: 350px;">
          <h1 class="display-1 l">MathRanker</h1>
          <p class="lead">A new horizon awaits mathematical geniuses, where they can discover their hidden talents and showcase them to the world.</p>
          <div class="container">
            <div class="row">
              <div class="col-12 df jcc">
                <a href="#" class="link-l">Adib Sakhawat</a> &nbsp;&nbsp;
                <a href="#" class="link-l">Tahsin Islam</a> &nbsp;&nbsp;
                <a href="#" class="link-l">Takia Farhin</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  




<!-- Add your Custom Styles here -->
<style>

</style>

<script>
    new DataTable('#stable');
</script>

<!-- <script>
  
let boolV = false;

function toogleClass(){
  boolV = !boolV;

  const dmiElement = document.getElementById('dmi');
  let html = document.querySelector('html');

  if(boolV){
    dmiElement.classList.remove('uil-moonset');
    dmiElement.classList.add('uil-sun');

    html.classList.add('dark');
    html.setAttribute('data-bs-theme', 'dark');
  }else{
    dmiElement.classList.remove('uil-sun');
    dmiElement.classList.add('uil-moonset');
    html.classList.remove('light');
    html.setAttribute('data-bs-theme', 'light');
  }
}

document.getElementById('dm').addEventListener('click', toogleClass);
</script> -->


