<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MathRanker</title>

    <link rel="icon" href="rsx/logo.ico" type="icon">

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">

    <!-- Data Tables -->
    <script defer src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script defer src="dt.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="util.css">
</head>
<body>
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
                <a class="nav-link" aria-current="page" href="#">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Signup</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- Nav -->


      <!-- Main -->
      <div class="vh-10"></div>
      <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="container">
                    <div class="row">
                        <div class="col-8">
                            <h3 class="display-2 l">Rayshu</h3>
                        </div>
                        <div class="col-4 df asfe jcfe">
                            <h3 class="display-5 d">1895</h3>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-7 df jcc aic">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <h5>Name</h5>
                            <h5 class="l">Tahsin Islam Rayshad</h5>
                        </div>
                        <div class="col-md-7">
                            <h5>Organization</h5>
                            <h5 class="l">Islamic University of Technology</h5>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-4">
                            <h5>City</h5>
                            <h5 class="l">Dhaka</h5>
                        </div>
                        <div class="col-md-4">
                            <h5>Country</h5>
                            <h5 class="l">Bangladesh</h5>
                        </div>
                        <div class="col-md-4">
                            <h5>Role</h5>
                            <h5 class="l">Solver</h5>
                        </div>
                        
                    </div>
                    <hr>
                    <div class="row mt-4">
                        <div class="col-md-4">
                            <h5>Max Rating</h5>
                            <h5 class="l">800</h5>
                        </div>
                        <div class="col-md-4">
                            <h5>Rank</h5>
                            <h5 class="l">Expert</h5>
                        </div>
                        <div class="col-md-4">
                            <h5>Max Rank</h5>
                            <h5 class="l">Tutor</h5>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-4">
                            <h5>XP</h5>
                            <h5 class="l">35437</h5>
                        </div>
                        <div class="col-md-4">
                            <h5>Contribution</h5>
                            <h5 class="l">100</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 offset-md-1 df jcc aic">
                <canvas class="verdict-chart">
                    <!-- Chart -->
                </canvas>
            </div>
        </div>

        <div class="row mt-5 vh-60 df jcc aic mb-5">
            <div class="col-12">
                <h3 class="display-5 l">Progress</h3>
                <hr>
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <canvas class="prog-chart">
                                <!-- Chart -->
                            </canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row vh-10"></div>
        <div class="row vh-50 df jcc">
            <div class="col">
                <h3 class="display-5 l">Recent Submissions</h3>
                <hr>
                <div class="container mt-2">
                    <div class="row">
                        <div class="col mt-4">
                            <table id="stable" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Problem</th>
                                        <th>Verdict</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     <!-- <?php echo $rows; ?> -->
                                    <tr>
                                        <td>1</td>
                                        <td>Archimedis on the run</td>
                                        <td>Accepted</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Archimedis on the run</td>
                                        <td>Accepted</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <!-- Main -->
</body>
</html>




<!-- Add your Custom Styles here -->
<style>

</style>



<script>
    // verdict chart - donughnut
    const verdict_chart = document.querySelector('.verdict-chart');

    new Chart(verdict_chart, {
        type: 'doughnut',
        data: {
            labels: ['Accepted', 'Wrong Answer'],
            datasets: [{
                label: 'Verdicts',
                data: [140, 89],
                backgroundColor: [
                    '#36449C',
                    '#1B75BC'
                ],
                hoverOffset: 8
            }]
        }
    });
</script>

<script>
    //progress chart - line
    const prog_chart = document.querySelector('.prog-chart');

    new Chart(prog_chart, {
        type: 'line',
        data: {
            labels: [1, 2, 3, 4, 5, 6, 7, 8],
            datasets: [{
                label: 'Progress',
                data: [453, 342, 765, 877, 982, 823, 912, 920],
                fill: true,
                borderColor: '#1B75BC',
                tension: 0.1
            }]
        }
    });
</script>

<script>
    new DataTable('#stable');
</script>