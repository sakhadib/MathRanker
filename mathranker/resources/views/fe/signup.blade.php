@extends('fe.layouts.main')
@section('main-sec')
    <div class="container-fluid vh-100">
        <div class="row">
            <div class="col-md-4 lbar d-none d-md-flex vh-100"></div>
            <div class="col-md-6 offset-md-1 vh-100 mt-5 mt-md-0 df dfc jcc">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="display-3 d">Signup</h3>
                            <p class="lead">Provide your information to signup</p>
                            <hr>
                        </div>
                    </div>
                   <form action="">
                    <div class="row ">
                        <div class="col-md-6 mt-4">
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="First Name">
                        </div>
                        <div class="col-md-6 mt-4">
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Last Name">
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-8 mt-4">
                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Email">
                        </div>
                        <div class="col-md-4 mt-4">
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Username">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mt-4">
                            <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="Password">
                        </div>
                        <div class="col-md-6 mt-4">
                            <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="Confirm Password">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mt-4">
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Institutuon">
                        </div>
                        <div class="col-md-6 mt-4">
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Country">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-4">
                            <p class="lead">By clicking signup button you agree to our <a href="" class="link-l">Terms and Conditions</a></p>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-12 mt-4">
                            <button type="submit" style="width: 100%;" class="btn btn-l-outline">SignUp</button>
                        </div>
                    </div>
                   </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        .lbar {
            background-image: url('{{url('rsx/reg.jpg')}}');
            background-size: cover;
            background-position: top;
            background-repeat: no-repeat;
        }
    </style>
@endsection