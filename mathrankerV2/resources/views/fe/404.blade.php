@extends('fe.layouts.main')
@section('main-sec')

<div class="vh-100 ">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 vh-100 df dfc jcc">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 df jcc aic">
                            <img src="/rsx/404.svg" alt="" style="width: 500px">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            {{-- <h1 class="display-1 text-center">404</h1> --}}
                            <h1 class="display-4 text-center">Page Not Found</h1>
                            <p class="lead text-center">The page you are looking for might have been removed, had its name changed or is temporarily unavailable.</p>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 df jcc">
                            <a href="/" class="btn btn-l-outline">Go to Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<style>

</style>
@endsection