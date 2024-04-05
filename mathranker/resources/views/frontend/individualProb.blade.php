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

    <!-- Math -->
    <script defer type="text/javascript" id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"> </script>

    <!-- MD -->
    <script defer src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
    <!-- Icons -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">

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

          <!-- Main -->

        <div class="vh-10"></div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="display-5 d">Why absent ?</h3>
                    <p class="lead">Created by Tahsin Islam  -  For Contest 99v2</p>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="card vh-40">
                        <div class="card-body">
                            <h2 class="display-6 d">Problem Statement</h2>
                            <p class="lead">
                                <span class="badge bg-l">Average</span>
                                <span class="badge bg-l">Arithmetic</span>
                                <span class="badge bg-l">Mean</span>
                            </p>
                                
                            <hr>
                            <p class="card-text lead math display">The average marks of \(24\) students is \(42\). If the student having 
                                \(88\) marks were absent, then what would be the average mark of the students?
                            </p>
                            <div class="vh-5"></div>
                            <h4 class="display-6 l">Submit Answer</h4>
                            <hr>
                            <form action=""> 
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput">Your Answer</label>
                                </div>
                                <button type="submit" style="width: 100%;" class="btn btn-d"><i class="uil uil-message"></i> Submit</button>
                            </form>
                        </div>
                    </div> 
                </div>

                <div class="col-md-4">
                    <div class="card vh-40">
                        <div class="card-body">
                            <h2 class="display-6 d">Statistics</h2>
                            <hr>
                            <table class="table table-striped">
                                <tr>
                                    <td>Max XP</td>
                                    <td>100</td>
                                </tr>
                                <tr>
                                    <td>Available XP</td>
                                    <td>100</td>
                                </tr>
                                <tr>
                                    <td>Attempt</td>
                                    <td>632</td>
                                </tr>
                                <tr>
                                    <td>Solved</td>
                                    <td>21</td>
                                </tr>
                                <tr>
                                    <td>First Solve</td>
                                    <td>@Rayshu</td>
                                </tr>
                            </table>

                            <a href="" style="width: 100%;" class="btn btn-l"><i class="uil uil-file-upload-alt"></i> Create Solution Post</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>




<!-- Add your Custom Styles here -->
<style>

</style>



<script>
  const markdownText = `YOUR_RAW_MARKDOWN_TEXT_HERE`;
  const htmlContent = marked(markdownText);
  document.getElementById('markdown-content').innerHTML = htmlContent;
</script>