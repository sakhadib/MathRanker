@extends('fe.layouts.main')

@section('main-sec') 
    <div class="main-home vh-80" id="homelem">
        <div class="container">
            <div class="row">
                <div class="col-12 vh-80 df dfc jcc aic">
                    <h1 class="text-center display-1">Climb the hills <br>of the math skills</h1>
                    <hr>
                    <p class="text-center" style="font-size: 2rem;">A platform to practice and improve your math skills</p>
                    <div class="text-center">
                        <a href="/login" class="btn btn-d btn-lg">Login</a> &nbsp;&nbsp;
                        <a href="/signup" class="btn btn-l-outline btn-lg">Signup</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="stat vh-20">
        <div class="container">
            <div class="row this-stat glow vh-25" id="statelem">
                <div class="col-12 df dfc jcc aic">
                    <div class="container">
                        <div class="row">
                            <div class="col-4">
                                <h1 class="text-center d display-1" id="q_ct">{{$Problemct}}</h1>
                                <h5 class="text-center">Questions</h5>
                            </div>
                            <div class="col-4">
                                <h1 class="text-center l display-1" id="u_ct">{{$solverct}}</h1>
                                <h5 class="text-center">Users</h5>
                            </div>
                            <div class="col-4">
                                <h1 class="text-center d display-1" id="c_ct">{{$Contestsct}}</h1>
                                <h5 class="text-center">Contests</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="hm-2 vh-80 df dfc jcc aic">
        <div class="container">
            <div class="row">
                <div class="col-md-6 df aic mt-5 mb-5">
                    <img src="rsx/hm-2.svg" alt="" style="width: 400px;">
                </div>
                <div class="col-md-6">
                    <h1 class="display-1 d">Practice and improve your math skills</h1>
                    <p class="lead">MathRanker is a platform to practice and improve your math skills. You can practice questions, participate in contests and improve your math skills.</p>
                    <a href="problems.html" class="btn btn-l-outline btn-lg">See Problems</a>
                </div>
            </div>
        </div>
    </div>

    <div class="hm-3 vh-90 df dfc jcc aic">
        <div class="container">
            <div class="row d-lg-none d-md-none mb-4">
                <div class="col-12">
                    <img src="rsx/hm-3.svg" alt="" style="width: 400px;">
                </div>
            </div> 
            <div class="row ">
                <div class="col-md-6">
                    <h1 class="display-1 l">Participate in contests</h1>
                    <p class="lead">You can participate in contests and challenge your ability. Climb up the rating stair by participating in contests. Gain more XP points than usual when you solve a problem within contest time.</p>
                    <a href="contests.html" class="btn btn-d-outline btn-lg">See Contests</a>
                </div>
                <div class="col-md-6 df aic jcc">
                    <img src="rsx/hm-3.svg" alt="" style="width: 400px;" class="d-none d-md-block">
                </div>
            </div>
        </div>
    </div>

    @if($Top_solver->count() > 0)
        <div class="hm-4 vh-80 df dfc jcc aic d-none d-md-block">
            <div class="container">
            <div class="row">
                <div class="col-12 mb-1 text-center">
                <h1 class="display-1 text-center">LeaderBoard</h1>
                <p class="lead text-center">Top 3 users of MathRanker</p>
                <a href="leaderboard.html" class="btn btn-l-outline btn-lg">See Complete LeaderBoard</a>
                </div>
            </div>
            <hr>
            <div class="vh-10"></div>
            <div class="row mt-5">
                <div class="col-md-4 text-center scnd">
                    <h1 class="display-1 d">#2</h1>
                    <h2 class="d"><a class="link-l" href="/profile/{{$Top_solver[1]->username}}">{{$Top_solver[1]->username}}</a></h2>
                    <p class="lead">{{$Top_solver[1]->institution}}</p>
                </div>
                <div class="col-md-4 text-center frst">
                    <h1 class="display-1 d">#1</h1>
                    <h2 class="d"><a class="link-l" href="/profile/{{$Top_solver[0]->username}}">{{$Top_solver[0]->username}}</a></h2>
                    <p class="lead">{{$Top_solver[0]->institution}}</p>
                </div>
                <div class="col-md-4 text-center">
                    <h1 class="display-1 d">#3</h1>
                    <h2 class="d"><a class="link-l" href="/profile/{{$Top_solver[2]->username}}">{{$Top_solver[2]->username}}</a></h2>
                    <p class="lead">{{$Top_solver[1]->institution}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mt-5 text-center">
                
                </div>
            </div>
            </div>
        </div>
    @endif

    <div class="hm-5 vh-70 df dfc jcc aic">
        <div class="container">
            <div class="row">
                <div class="col-md-6 df aic">
                    <img src="rsx/hm-5.svg" alt="" style="width: 400px;">
                </div>
                <div class="col-md-6">
                    <h1 class="display-1 d">Get help from the community</h1>
                    <p class="lead">You can ask questions, answer questions and help others. You can also discuss about math problems and solutions. You can also share your knowledge with others.</p>
                    <a href="community.html" class="btn btn-l-outline btn-lg">See Community</a>
                </div>
            </div>
        </div>
    </div>

    <div class="hm-6 vh-40 df dfc jcc aic">
      <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="display-1 text-center d">Why MathRanker?</h1>
                <p class="lead text-center">MathRanker is a platform to practice and improve your math skills. You can practice questions, participate in contests and improve your math skills.</p>
            </div>
        </div>
      </div>
    </div>





    
@endsection