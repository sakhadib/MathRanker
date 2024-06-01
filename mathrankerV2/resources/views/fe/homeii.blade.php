@extends('fe.layouts.main')
@section('main-sec')
<!-- Main Content -->

    <div class="vh-10"></div>
    <div class="vh-90" id="homelem">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-none d-lg-flex col-12 vh-80 df dfc jcc aic">
                    <img src="rsx/home_1.svg" alt="" style="width: 600px;">
                </div>
                <div class="col-lg-6 col-12 vh-80 df dfc jcc aic">
                    <!-- <h1 class="text-center display-4"><span class="d" style="font-weight: 600;">Uniforms</span> not required,<br><span class="l" style="font-weight: 600;">Brains</span> are the key, <br>Train for <span class="l" style="font-weight: 600;">Math Victory!</span></h1> -->
                    <h1 class="text-center display-5">Uniforms not required,<br>Brains are the key, <br>Train for <span class="l" style="font-weight: 600;">Math Victory!</span></h1>
                    <hr>
                    <p class="text-center" style="font-size: 1.8rem;">A platform to practice and improve your math skills</p>
                    <div class="text-center">
                        <a href="/login" class="btn btn-d btn-lg">Login</a> &nbsp;&nbsp;
                        <a href="/signup" class="btn btn-l-outline btn-lg">Signup</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row" id="statelem">
            <div class="col-12">
                <div class="container">
                    <div class="row">
                            <div class="col-3">
                                <div class="stata-box">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-4 col-12 df dfc jcc aic">
                                                <div class="inc-box" style="background-color: #1B75BC">
                                                    <h5 class="icn df dfc jcc aic" style="font-size: 80px;padding-left: 8px;"><i class="uil uil-file-question-alt"></i></h5>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-12">
                                                <h1 class=" text-center  l display-3" style="font-weight: 600;" id="q_ct">{{$Problemct}}</h1>
                                                <h5 class=" text-center ttxt ">Questions</h5>
                                            </div>
                                        </div>
                                    </div>                                        
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="stata-box">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-4 col-12 df dfc jcc aic">
                                                <div class="inc-box" style="background-color: #2168A2">
                                                    <h5 class="text-center icn" style="font-size:70px;"><i class="uil uil-user"></i></h5>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-12">
                                                <h1 class="text-center l display-3" style="font-weight: 600;" id="u_ct">{{$solverct}}</h1>
                                                <h5 class="text-center ttxt ">Users</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="stata-box">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-4 col-12 df dfc jcc aic">
                                                <div class="inc-box" style="background-color: #2B579F">
                                                    <h5 class="text-center icn" style="font-size: 70px;"><i class="uil uil-trophy"></i></h5>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-12">
                                                <h1 class="text-center l display-3" style="font-weight: 600;" id="c_ct">{{$Contestsct}}</h1>
                                                <h5 class="text-center ttxt">Contests</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="stata-box">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-4 col-12 df dfc jcc aic">
                                                <div class="inc-box" style="background-color: #36449C">
                                                    <h5 class="text-center icn" style="font-size: 70px;"><i class="uil uil-postcard"></i></h5>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-12">
                                                <h1 class="text-center l display-3" style="font-weight: 600;" id="p_ct">{{$Postsct}}</h1>
                                                <h5 class="text-center ttxt">Posts</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="hm-3 vh-90 df dfc jcc aic">
        <div class="container">
            <div class="row d-lg-none d-md-none mb-4">
                <div class="col-12">
                    <img src="rsx/prac2.svg" alt="" style="width: 400px;">
                </div>
            </div> 
            <div class="row ">
                <div class="col-md-6">
                <h1 class="display-1 d">Practice and improve your math skills</h1>
                    <p class="lead">MathRanker is a platform to practice and improve your math skills. You can practice questions, participate in contests and improve your math skills.</p>
                    <a href="problems.html" class="btn btn-l-outline btn-lg">See Problems</a>
                </div>
                <div class="col-md-6 df aic jcc">
                    <img src="rsx/prac2.svg" alt="" style="width: 400px;" class="d-none d-md-block">
                </div>
            </div>
        </div>
    </div>

    <div class="hm-2 vh-80 df dfc jcc aic">
        <div class="container">
            <div class="row">
                <div class="col-md-6 df aic mt-5 mb-5">
                    <img src="rsx/contestsss.svg" alt="" style="width: 400px;">
                </div>
                <div class="col-md-6">
                <h1 class="display-1 l">Participate in contests</h1>
                    <p class="lead">You can participate in contests and challenge your ability. Climb up the rating stair by participating in contests. Gain more XP points than usual when you solve a problem within contest time.</p>
                    <a href="contests.html" class="btn btn-d-outline btn-lg">See Contests</a>
                </div>
            </div>
        </div>
    </div>

<style>
    .stata-box {
        min-height: 30vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: left;
        /* background-color: rgba(27,117,188, 0.2); */
        /* border-radius: 25%; */
    }
    .inc-box{
        height: 12vh;
        width: 12vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        /* background-color: #36449C; */
        border-radius: 50%;
    }
    .icn{
        color: #ffffff;
    }

    .ttxt{
        font-size: 24px;
    }
</style>

@endsection