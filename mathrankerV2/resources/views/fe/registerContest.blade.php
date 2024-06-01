@extends('fe.layouts.main')
@section('main-sec')

<div class="vh-15"></div>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="display-1 text-center">Register for Contest {{$contest_id}}</h1>
            <p class="lead text-center">
                By registering for the contest you are agreeing to the terms and conditions of the contest. Please read the terms and conditions before registering for the contest.
            </p>
            <hr>
        </div>
    </div>
    <div class="row">
        <h1 class="display-6">Participation terms</h1>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Once registered, Registrations can not be deleted</li>
                        <li class="list-group-item">Any cheating will not be tolarated</li>
                        <li class="list-group-item">Round answers to atleast 3 decimal places if possible</li>
                        <li class="list-group-item">Ratins given by the system are final</li>
                        <li class="list-group-item">If any melicious attack found on this platform you will be banned</li>
                      </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 vh-10 df jcc aic">
            <form action="/registerContest" method="post">
                @csrf
                <input type="hidden" name="contest_id" value="{{$contest_id}}">
                <button type="submit" class="btn btn-l">Register for Contest - {{$contest_id}}</button>
            </form>
        </div>
    </div>
</div>

@endsection