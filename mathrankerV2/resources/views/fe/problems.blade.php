@extends('fe.layouts.main')
@section('main-sec')
    <!-- Data Tables -->
    <script defer src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script defer src="{{url('fe/dt.js')}}"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">

<div class="vh-10"></div>
<div class="pb-1 vh-20 df dfc aic">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="display-3 text-center">{{$contest_title}}</h1>
                <p class="lead text-center">Solve the problems you haven't solved yet. gain XP points and showcase your profile</p>
                <hr>
            </div>
        </div>
    </div>
</div>

@if($isContestPage)
<div class="container mb-4">
    <div class="row">
        <div class="col-md-12 df dfc jcc aic">
            <h1 class="display-1" id="time">00:00:00</h1>
            <a href="/contest/leaderboard/{{$contest->id}}" class="btn btn-d-outline mt-2"><i class="uil uil-trophy"></i> {{$contest_title_2}} Contest LeaderBoard</a>
        </div>
    </div>
</div>
@endif


<div class="container">
    <div class="row mt-2">
        <section class="main-table" id = "standing">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <table data-order='[[0, "asc"]]' data-page-length='25' id="stable" class="table table-striped" style="width:100%">
                          <thead>
                              <tr>
                                  <th>#</th>
                                  <th>Name</th>
                                  <th>Max XP</th>
                                  <th>Available XP</th>
                                  <th>Solved Count</th>
                                  <th>Status</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($modifiedProbArray as $key => $item)
                                  <tr>
                                      <td>{{ $key + 1 }}</td> <!-- Increment the key to start numbering from 1 -->
                                      <td><a href="/problem/{{$item->prob->id}}">{{ $item->prob->title }}</a></td> <!-- Access the name property of the prob object -->
                                      <td>{{ $item->prob->max_xp}}</td> <!-- Assuming max XP is always 100 -->
                                      <td>{{ $item->availableXP }}</td> <!-- Display the XP -->
                                      <td>{{ $item->ct }}</td> <!-- Display the success count -->
                                      <td>
                                        @if($item->status == 1)
                                            <span class="badge bg-success">Solved</span>
                                        @elseif($item->status == 0)
                                            <span class="badge bg-danger">Unsolved</span>
                                        @else
                                            <span class="badge bg-secondary">Not Attempted</span>
                                        @endif
                                      </td> <!-- Display status based on user success flag -->
                                  </tr>
                              @endforeach
                          </tbody>
                      </table>
                      
                    </div>   
                </div>
            </div>
        </section>
    </div>
</div>


<div class="vh-15"></div>


<script>
    new DataTable('#stable');
</script>


@if($isContestPage)
<script>
    // Use the PHP variable to set the end time
    var endTime = new Date("<?php echo $end_Time->toIso8601String(); ?>");

    // Function to update the countdown
    function updateCountdown() {
        var now = new Date();
        var timeRemaining = endTime - now;

        if (timeRemaining >= 0) {
            var hours = Math.floor(timeRemaining / (1000 * 60 * 60));
            var minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);

            document.getElementById("time").innerText = 
                String(hours).padStart(2, '0') + ":" + 
                String(minutes).padStart(2, '0') + ":" + 
                String(seconds).padStart(2, '0');
        } else {
            document.getElementById("time").innerText = "Contest Over!";
            clearInterval(timerInterval);
        }
    }

    // Update the countdown every second
    var timerInterval = setInterval(updateCountdown, 1000);
    updateCountdown(); // initial call to set the correct time immediately
</script>
@endif

@endsection


