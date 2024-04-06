@extends('fe.layouts.main')
@section('main-sec')
    <div class="container-fluid vh-100">
        <div class="row">
            <div class="col-md-4 d-none d-md-flex lbar vh-100"></div>
            <div class="col-md-4 offset-md-2 vh-100 df dfc jcc">
                <div class="container bs p-5">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="display-3 text-center d">Login</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p class="text-center">Welcome back! Please login to your account.</p>
                        </div>
                    </div>
                   <form action="{{url('/')}}/login" method="POST">
                        @csrf
                        <div class="row ">
                            <div class="col-md-12 mt-4">
                                <input name="uname" type="text" class="form-control" id="exampleFormControlInput1" value="{{old('uname')}}" placeholder="Username">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mt-4">
                                <input name="password" type="password" class="form-control" id="exampleFormControlInput1" placeholder="Password">
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-12 mt-5 mb-4 text-center">
                                <button type="submit" style="width: 40%;" class="btn btn-d lead">Login</button>
                            </div>
                        </div>
                   </form>
                </div>
            </div>
        </div>
    </div>

<!-- Add your Custom Styles here -->
<style>
    .lbar {
        background-image: url('rsx/log.png');
        background-size: cover;
        background-position: top;
        background-repeat: no-repeat;
    }
</style>

@endsection