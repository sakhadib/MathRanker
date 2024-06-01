@extends('fe.layouts.main')
@section('main-sec')
    <!-- Data Tables -->
    <script defer src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script defer src="{{url('fe/dt.js')}}"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">

<div class="vh-10"></div>
<div class="pb-1 vh-20 df dfc aic">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="display-1 text-center">Problems</h1>
                <p class="lead text-center">Solve the problems you haven't solved yet. gain XP points and showcase your profile</p>
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
                        <table data-order='[[3, "asc"]]' data-page-length='25' id="stable" class="table table-striped" style="width:100%">
                          <thead>
                              <tr>
                                  <th>#</th>
                                  <th>Name</th>
                                  <th>Max XP</th>
                                  <th>Available XP</th>
                                  <th>Solved Count</th>
                                  <th>Status</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($modifiedProbArray as $key => $item)
                                  <tr>
                                      <td>{{ $key + 1 }}</td> <!-- Increment the key to start numbering from 1 -->
                                      <td><a href="/problem/{{$item->prob->id}}">{{ $item->prob->title }}</a></td> <!-- Access the name property of the prob object -->
                                      <td>{{ $item->prob->max_xp}}</td> <!-- Assuming max XP is always 100 -->
                                      <td>{{ $item->availableXP }}</td> <!-- Display the XP -->
                                      <td>{{ $item->ct }}</td> <!-- Display the success count -->
                                      <td>
                                        @if($item->status == 1)
                                            <span class="badge bg-success">Solved</span>
                                        @elseif($item->status == 0)
                                            <span class="badge bg-danger">Unsolved</span>
                                        @else
                                            <span class="badge bg-secondary">Not Attempted</span>
                                        @endif
                                      </td> <!-- Display status based on user success flag -->
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


<script>
    new DataTable('#stable');
</script>

@endsection


