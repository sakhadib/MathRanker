@extends('fe.layouts.main')
@section('main-sec')

<div class="vh-100">
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 vh-100 df jcc aic">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="display-6 d">Verify</h3>
                            <p class="lead">Provide your verification code</p>
                            <hr>
                        </div>
                    </div>
                    <form action="{{url('/')}}/verification/{{$uname}}" method="POST">
                        @csrf
                        <div class="row ">
                            <div class="col-md-12 mt-4">
                                <input name="code" type="text" class="form-control" value="{{old('code')}}" id="exampleFormControlInput1" placeholder="Your Verification Code">
                                <span>
                                    @error('code')
                                        <p class="text-danger lead">{{$message}}</p>
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mt-4">
                                <button type="submit" class="btn btn-primary">Verify</button>
                                <a href="/verify/{{$uname}}" class="btn btn-secondary">Resend Mail</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection