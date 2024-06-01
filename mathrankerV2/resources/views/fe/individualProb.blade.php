@extends('fe.layouts.main')
@section('main-sec')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="vh-10"></div>
        <div class="container mb-5">
            <div class="row">
                <div class="col-md-8">
                    <h3 class="display-5 d">{{$Prob->title}}</h3>
                    <p class="lead">Created at <code>{{$created}}</code> For Contest <code><a href="/contest/{{$Prob->c_id}}" class="link-l">{{$contest->title}}</a></code></p>
                    <hr>
                </div>
                <div class="col-md-4 df dfc jcc aife">
                    <p class="lead" style="margin-bottom:0">Time Remaining</p>
                    <h1 class="display-5">00:00:00</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="card vh-40">
                        <div class="card-body">
                            <h2 class="display-6 d">Problem Statement</h2>
                            <p class="lead">
                              @foreach ($tags as $tag)
                              <span class="badge bg-l">{{$tag}}</span>
                              @endforeach
                            </p>
                                
                            <hr>
                            <p class="card-text lead math display">
                                {{$Prob->description}}
                            </p>
                            <div class="vh-5"></div>
                            @if($availableXP > 0)
                                <h4 class="display-6 l">Submit Answer</h4>
                                <hr>
                                <form action="{{url('/')}}/problem/{{$pid}}" method="POST"> 
                                    @csrf
                                    <div class="form-floating mb-3">
                                        <input name="sub_ans" type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
                                        <label for="floatingInput">Your Answer</label>
                                    </div>
                                    <button type="submit" style="width: 100%;" class="btn btn-d"><i class="uil uil-message"></i> Submit</button>
                                </form>
                            @endif
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
                                    <td>{{$Prob->max_xp}}</td>
                                </tr>
                                <tr>
                                    <td>Available XP</td>
                                    <td>{{$availableXP}}</td>
                                </tr>
                                <tr>
                                    <td>Attempt</td>
                                    <td>{{$TotalAttempts}}</td>
                                </tr>
                                <tr>
                                    <td>Solved</td>
                                    <td>{{$SuccessCount}}</td>
                                </tr>
                                <tr>
                                    <td>My Attempts</td>
                                    <td>{{$myAttCount}}</td>
                                </tr>
                                <tr>
                                    <td>My Status</td>
                                    <td>
                                        @if($status == 1)
                                            <span class="badge bg-success">Solved</span>
                                        @elseif($status == 0)
                                            <span class="badge bg-danger">Unsolved</span>
                                        @else
                                            <span class="badge bg-secondary">Pending</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Gained XP</td>
                                    <td>{{$gainedxp}}</td>
                                </tr>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
      
@endsection


