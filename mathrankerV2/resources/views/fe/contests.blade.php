@extends('fe.layouts.main')
@section('main-sec')

<div class="vh-10"></div>
<div class="pb-1 vh-20 df dfc aic">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="display-1 text-center">{{$tag}} Contests</h1>
                <p class="lead text-center">Participate in contests to gain more XP points and rating level. Challenge your mathematical power to sharpen them</p>
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
                        <table data-order='[[1, "desc"]]' data-page-length='25' id="stable" class="table table-striped centered-table" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Registered</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ModifiedContestArray as $con)
                                <tr>
                                    <td class="lead"><b><a href="/contest/{{$con->contest->id}}" class="link-d">{{$con->contest->title}}</a></b></td>
                                    <td class="">{{$con->StartTime}}</td>
                                    <td class="">{{$con->EndTime}}</td>
                                    <td class="">x {{$con->RegCount}}</td>
                                    <td class="">
                                        @if($con->action == 0)
                                            Already Registered
                                        @elseif($con->action == 1)
                                            <a href="/cr/{{$con->contest->id}}" class="btn btn-l-outline">Register for Contest {{$con->contest->id}}</a>
                                        @elseif($con->action == 5)
                                            <a href="/contests" class="link-d">Go to contest page</a>
                                        @else
                                            <a href="/login" class="link-l">login</a> &nbsp; / &nbsp; <a href="/signup" class="link-l">signup</a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>   
                </div>
                <div class="row">
                    <div class="col-12 df jcc aic vh-10">
                        @if($flag == 0)
                            <a href="/allcontest" class="btn btn-d-outline">Show All Contests</a>
                        @else
                        <a href="/contests" class="btn btn-d-outline">Show Upcoming Contests</a>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>


<style>
    .centered-table {
        margin: 0 auto; /* Center the table within its container */
        width: 80%; /* Optional: Adjust width as needed */
        border-collapse: collapse; /* Optional: Collapse borders for better appearance */
    }

    .centered-table td {
        /* text-align: center; */
        vertical-align: middle; /* Center the text vertically */
    }
</style>

@if($ccflag == 0)
<script>
    // Retrieve the contest start time passed from PHP
    var closestContestStartTime = "<?php echo $closestContestStartTime; ?>";

    // Create a Date object from the contest start time
    var contestStartDate = new Date(closestContestStartTime);

    // Function to check if the contest has started
    function checkContestStart() {
        var now = new Date();
        // Check if the current time matches the contest start time
        if (now >= contestStartDate) {
            alert("Contest started");
            // Clear the interval once the contest has started
            clearInterval(checkInterval);
        }
    }

    // Set an interval to check the contest start time every second
    var checkInterval = setInterval(checkContestStart, 1000);
</script>
@endif


@endsection