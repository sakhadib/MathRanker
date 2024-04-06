@extends('fe.layouts.main')
@section('main-sec')
    <div class="container-fluid vh-100">
        <div class="row">
            <div class="col-md-4 d-none d-md-flex lbar vh-100"></div>
            <div class="col-md-4 offset-md-2 vh-100 df dfc jcc">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="display-3 text-center d">Login</h3>
                            <hr>
                        </div>
                    </div>
                   <form action="">
                    <div class="row ">
                        <div class="col-md-12 mt-4">
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Username">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-4">
                            <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="Password">
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-12 mt-4">
                            <button type="submit" style="width: 100%;" class="btn btn-d">Login</button>
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