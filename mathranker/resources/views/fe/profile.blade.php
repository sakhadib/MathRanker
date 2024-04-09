@extends('fe.layouts.main')
@section('main-sec')
 <!-- Main -->
      <div class="vh-10"></div>
      <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="container">
                    <div class="row">
                        <div class="col-8">
                            <h3 class="display-2 l">{{$uname}}</h3>
                        </div>
                        <div class="col-4 df asfe jcfe">
                            <h3 class="display-5 d">{{$XP}}</h3>
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
                            <h5 class="l">{{$solver->fname . " " . $solver->lname}}</h5>
                        </div>
                        <div class="col-md-7">
                            <h5>Organization</h5>
                            <h5 class="l">{{$solver->institution}}</h5>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-4">
                            <h5>Member Since</h5>
                            <h5 class="l">{{$profile_created}}</h5>
                        </div>
                        <div class="col-md-4">
                            <h5>Country</h5>
                            <h5 class="l">{{$solver->country}}</h5>
                        </div>
                        <div class="col-md-4">
                            <h5>Role</h5>
                            <h5 class="l">{{$solver->role}}</h5>
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
                            <h5 class="l">{{$XP}}</h5>
                        </div>
                        <div class="col-md-4">
                            <h5>Posts</h5>
                            <h5 class="l">{{$PostCount}}</h5>
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
                                    @foreach($Attempted_Problems as $key => $problem)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td><a href="{{'/problem/'. $problem->p_id}}">{{$problem->name}}</a></td>
                                            <td>
                                                @if($problem->verdict == 1)
                                                    <span class="badge bg-success">Accepted</span>
                                                @else
                                                    <span class="badge bg-danger">Wrong Answer</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <!-- Main -->



<script>
    // verdict chart - donughnut
    const verdict_chart = document.querySelector('.verdict-chart');

    new Chart(verdict_chart, {
        type: 'doughnut',
        data: {
            labels: ['Accepted', 'Wrong Answer'],
            datasets: [{
                label: 'Verdicts',
                data: [{{$AC}}, {{$WA}}],
                backgroundColor: [
                    '#36449C',
                    '#1B75BC'
                ],
                hoverOffset: 8
            }]
        }
    });
</script>

{{-- <script>
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
</script> --}}
@endsection