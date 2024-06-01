@extends('fe.layouts.main')
@section('main-sec')
<div class="vh-10"></div>
<div class="pb-1 vh-20 df dfc aic">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="display-3 text-center">Global LeaderBoard</h1>
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
                        <table data-order='[[6, "desc"]]' data-page-length='100' id="stable" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Solver</th>
                                    <th>Badge</th>
                                    <th>Accepted</th>
                                    <th>Total Attempt</th>
                                    <th>XP</th>
                                    <th>Penalty</th>
                                    <th>Rating</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($modifiedsolvers as $item)   
                                <tr>
                                    <td><a href="/profile/{{$item->uname}}" class="link-l fs-5">{{$item->uname}}</a></td>
                                    <td><code>{{$item->rate}}</code></td>
                                    <td>{{$item->SolveCount}}</td>
                                    <td>{{$item->totalAttempt}}</td>
                                    <td>{{$item->totalXP}}</td>
                                    <td>{{$item->totalPenalty}}</td>
                                    <td>{{$item->rating}}</td>
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