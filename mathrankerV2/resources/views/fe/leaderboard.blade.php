@extends('fe.layouts.main')
@section('main-sec')
<div class="vh-10"></div>
<div class="pb-1 vh-20 df dfc aic">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="display-3 text-center">{{$contest->title}} Standing</h1>
                <p class="lead text-center">See Your Position in the list. search by your name in the search bar</p>
                <hr>
            </div>
        </div>
    </div>
</div>


<div class="container">
    <div class="row mt-2">
        <section class="main-table" id = "standing">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <table data-order='[[3, "asc"]]' data-page-length='100' id="stable" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>username</th>
                                    <th>Solve Count</th>
                                    <th>Total Attempts</th>
                                    <th>Total Penalty</th>
                                    <th>Total Gained Xp (in contest)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ModifiedAttemptArray as $item)   
                                <tr>
                                    <td><span class="badge bg-l">{{$item->rate}} </span> <a href="/profile/{{$item->user}}" class="link-l">{{$item->user}}</a></td>
                                    <td>{{$item->SolveCount}}</td>
                                    <td>{{$item->totalAttempt}}</td>
                                    <td>{{$item->totalPenalty}}</td>
                                    <td>{{$item->totalXP}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>   
                </div>
            </div>
        </section>
    </div>
</div>


<div class="vh-15"></div>
@endsection