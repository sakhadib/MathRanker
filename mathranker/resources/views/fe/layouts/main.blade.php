@if(session('isLoggedIn'))
    @include('fe.layouts.log_header')
@else
    @include('fe.layouts.header')
@endif

@yield('main-sec')
@include('fe.layouts.footer')
