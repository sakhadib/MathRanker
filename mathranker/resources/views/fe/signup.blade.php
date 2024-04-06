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
                   <form action="{{url('/')}}/signup" method="POST">
                    @csrf
                    <div class="row ">
                        <div class="col-md-6 mt-4">
                            <input name="fname" type="text" class="form-control" value="{{old('fname')}}" id="exampleFormControlInput1" placeholder="First Name">
                            <span>
                                @error('fname')
                                    <p class="text-danger lead">{{$message}}</p>
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-6 mt-4">
                            <input name="lname" type="text" class="form-control" value="{{old('lname')}}" id="exampleFormControlInput1" placeholder="Last Name">
                            <span>
                                @error('lname')
                                    <p class="text-danger lead">{{$message}}</p>
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-8 mt-4">
                            <input name="email" type="email" class="form-control" value="{{old('email')}}" id="exampleFormControlInput1" placeholder="Email">
                            <span>
                                @error('email')
                                    <p class="text-danger lead">{{$message}}</p>
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-4 mt-4">
                            <input name="uname" type="text" class="form-control" value="{{old('uname')}}" id="exampleFormControlInput1" placeholder="Username">
                            <span>
                                @error('uname')
                                    <p class="text-danger lead">{{$message}}</p>
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mt-4">
                            <input name="password" type="password" class="form-control" id="exampleFormControlInput1" placeholder="Password">
                            <span>
                                @error('password')
                                    <p class="text-danger lead">{{$message}}</p>
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-6 mt-4">
                            <input name="password_confirmation" type="password" class="form-control" id="exampleFormControlInput1" placeholder="Confirm Password">
                            <span>
                                @error('password_confirmation')
                                    <p class="text-danger lead">{{$message}}</p>
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mt-4">
                            <input name="inst" type="text" class="form-control" value="{{old('inst')}}" id="exampleFormControlInput1" placeholder="Institutuon">
                            <span>
                                @error('inst')
                                    <p class="text-danger lead">{{$message}}</p>
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-6 mt-4">
                            <input name="country" type="text" class="form-control" value="{{old('country')}}" id="exampleFormControlInput1" placeholder="Country">
                            <span>
                                @error('country')
                                    <p class="text-danger lead">{{$message}}</p>
                                @enderror
                            </span>
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