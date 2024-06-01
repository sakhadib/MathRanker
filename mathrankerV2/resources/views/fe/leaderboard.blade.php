@extends('fe.layouts.main')
@section('main-sec')
<div class="vh-10"></div>
<div class="pb-1 vh-20 df dfc aic">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="display-1 text-center">Standing</h1>
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
                        <table data-order='[[3, "asc"]]' data-page-length='25' id="stable" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>username</th>
                                    <th>A</th>
                                    <th>B</th>
                                    <th>C</th>
                                    <th>D</th>
                                    <th>E</th>
                                    <th>F</th>
                                    <th>G</th>
                                    <th>H</th>
                                    <th>I</th>
                                    <th>J</th>
                                </tr>
                            </thead>
                            <tbody>
                                 
                                <tr>
                                    <td>1</td>
                                    <td>Adib</td>
                                    <td>-2</td>
                                    <td>3</td>
                                    <td>4</td>
                                    <td>5</td>
                                    <td>6</td>
                                    <td>7</td>
                                    <td>8</td>
                                    <td>9</td>
                                    <td>10</td>
                                    <td>11</td>
                                </tr>
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