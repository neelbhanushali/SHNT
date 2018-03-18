@extends('layouts.dashboard')
@section('username', session()->get('username'))
@section('page', 'Seat Number')

@section('css')
@parent
<link href="/assets/vendors/data-tables/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet">
<style>
    .apnaDataTable{

    }
</style>
@endsection

@section('breadcrumbs')
<li><a href="">HOME</a></li>
<li><a href="">CURRICULUM</a></li>
<li><a href="">SEAT NUMBER</a></li>
<li><a href="">SEAT NUMBER LIST</a></li>
@endsection


@section('content')

<!-- sem 1 list -->
<div class="card-panel">
    <div id="table-datatables">
        <h4 class="header">Seat Number List for Semester 1</h4>
        <div class="row">
            <div class="col s12">
                <!-- <table id="data-table-simple" class="display apnaDataTable" cellspacing="0"> -->
                <table id="data-table-simple" class="display" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Sr Numbers</th>
                        <th>Names</th>
                        <th>Seat Numbers</th>
                        <th>Sign</th>
                    </tr>
                    </thead>
                    <tbody>
                    @for($i = 0,$j = 1 ; $i < sizeof($names) ; $i += 1 , $j += 1)
                    <tr>
                        <td>{{$j}}</td>
                        <td>{{$names[$i]}}</td>
                        <td>{{$sem1[$i]}}</td>
                        <td></td>
                    </tr>
                    @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- sem 2 list -->

<div class="card-panel">
    <div id="table-datatables">
        <h4 class="header">Seat Number List for Semester 2</h4>
        <div class="row">
            <div class="col s12">
                <!-- <table id="data-table-simple" class="display apnaDataTable" cellspacing="0"> -->
                <table id="data-table-simple2" class="display" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Sr Numbers</th>
                        <th>Names</th>
                        <th>Seat Numbers</th>
                        <th>Sign</th>
                    </tr>
                    </thead>
                    <tbody>
                    @for($i = 0,$j = 1 ; $i < sizeof($names) ; $i += 1 , $j += 1)
                    <tr>
                        <td>{{$j}}</td>
                        <td>{{$names[$i]}}</td>
                        <td>{{$sem2[$i]}}</td>
                        <td></td>
                    </tr>
                    @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- sem 3 list -->

<div class="card-panel">
    <div id="table-datatables">
        <h4 class="header">Seat Number List for Semester 3</h4>
        <div class="row">
            <div class="col s12">
                <!-- <table id="data-table-simple" class="display apnaDataTable" cellspacing="0"> -->
                <table id="data-table-simple3" class="display" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Sr Numbers</th>
                        <th>Names</th>
                        <th>Seat Numbers</th>
                        <th>Sign</th>
                    </tr>
                    </thead>
                    <tbody>
                    @for($i = 0,$j = 1 ; $i < sizeof($names) ; $i += 1 , $j += 1)
                    <tr>
                        <td>{{$j}}</td>
                        <td>{{$names[$i]}}</td>
                        <td>{{$sem3[$i]}}</td>
                        <td></td>
                    </tr>
                    @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- sem 4 list -->

<div class="card-panel">
    <div id="table-datatables">
        <h4 class="header">Seat Number List for Semester 4</h4>
        <div class="row">
            <div class="col s12">
                <!-- <table id="data-table-simple" class="display apnaDataTable" cellspacing="0"> -->
                <table id="data-table-simple4" class="display" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Sr Numbers</th>
                        <th>Names</th>
                        <th>Seat Numbers</th>
                        <th>Sign</th>
                    </tr>
                    </thead>
                    <tbody>
                    @for($i = 0,$j = 1 ; $i < sizeof($names) ; $i += 1 , $j += 1)
                    <tr>
                        <td>{{$j}}</td>
                        <td>{{$names[$i]}}</td>
                        <td>{{$sem4[$i]}}</td>
                        <td></td>
                    </tr>
                    @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- sem 5 list -->

<div class="card-panel">
    <div id="table-datatables">
        <h4 class="header">Seat Number List for Semester 5</h4>
        <div class="row">
            <div class="col s12">
                <!-- <table id="data-table-simple" class="display apnaDataTable" cellspacing="0"> -->
                <table id="data-table-simple5" class="display" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Sr Numbers</th>
                        <th>Names</th>
                        <th>Seat Numbers</th>
                        <th>Sign</th>
                    </tr>
                    </thead>
                    <tbody>
                    @for($i = 0,$j = 1 ; $i < sizeof($names) ; $i += 1 , $j += 1)
                    <tr>
                        <td>{{$j}}</td>
                        <td>{{$names[$i]}}</td>
                        <td>{{$sem5[$i]}}</td>
                        <td></td>
                    </tr>
                    @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- sem 6 list -->

<div class="card-panel">
    <div id="table-datatables">
        <h4 class="header">Seat Number List for Semester 6</h4>
        <div class="row">
            <div class="col s12">
                <!-- <table id="data-table-simple" class="display apnaDataTable" cellspacing="0"> -->
                <table id="data-table-simple6" class="display" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Sr Numbers</th>
                        <th>Names</th>
                        <th>Seat Numbers</th>
                        <th>Sign</th>
                    </tr>
                    </thead>
                    <tbody>
                    @for($i = 0,$j = 1 ; $i < sizeof($names) ; $i += 1 , $j += 1)
                    <tr>
                        <td>{{$j}}</td>
                        <td>{{$names[$i]}}</td>
                        <td>{{$sem6[$i]}}</td>
                        <td></td>
                    </tr>
                    @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- sem 7 list -->

<div class="card-panel">
    <div id="table-datatables">
        <h4 class="header">Seat Number List for Semester 7</h4>
        <div class="row">
            <div class="col s12">
                <!-- <table id="data-table-simple" class="display apnaDataTable" cellspacing="0"> -->
                <table id="data-table-simple7" class="display" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Sr Numbers</th>
                        <th>Names</th>
                        <th>Seat Numbers</th>
                        <th>Sign</th>
                    </tr>
                    </thead>
                    <tbody>
                    @for($i = 0,$j = 1 ; $i < sizeof($names) ; $i += 1 , $j += 1)
                    <tr>
                        <td>{{$j}}</td>
                        <td>{{$names[$i]}}</td>
                        <td>{{$sem7[$i]}}</td>
                        <td></td>
                    </tr>
                    @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- sem 8 list -->

<div class="card-panel">
    <div id="table-datatables">
        <h4 class="header">Seat Number List for Semester 8</h4>
        <div class="row">
            <div class="col s12">
                <!-- <table id="data-table-simple" class="display apnaDataTable" cellspacing="0"> -->
                <table id="data-table-simple8" class="display" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Sr Numbers</th>
                        <th>Names</th>
                        <th>Seat Numbers</th>
                        <th>Sign</th>
                    </tr>
                    </thead>
                    <tbody>
                    @for($i = 0,$j = 1 ; $i < sizeof($sem8namesarray) ; $i += 1 , $j += 1)
                    <tr>
                        <td>{{$j}}</td>
                        <td>{{$sem8namesarray[$i]}}</td>
                        <td>{{$sem8[$i]}}</td>
                        <td></td>
                    </tr>
                    @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
@parent
<script type="text/javascript" src="/assets/vendors/jquery-3.2.1.min.js"></script>
<!--materialize js-->
<script type="text/javascript" src="/assets/js/materialize.min.js"></script>
<!--scrollbar-->
<script type="text/javascript" src="/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<!--plugins.js - Some Specific JS codes for Plugin Settings-->
<script type="text/javascript" src="/assets/js/plugins.js"></script>
<!--custom-script.js - Add your own theme custom JS-->
<script type="text/javascript" src="/assets/js/custom-script.js"></script>
<!-- DataTables -->
<script type="text/javascript" src="/assets/vendors/data-tables/js/jquery.dataTables.min.js"></script>
<!--data-tables.js - Page Specific JS codes -->
<script type="text/javascript" src="/assets/js/scripts/data-tables.js"></script>
<!--plugins.js - Some Specific JS codes for Plugin Settings-->
<script type="text/javascript" src="/assets/js/plugins.js"></script>
<script>
    // $(document).ready(function(){
    //     $(".apnaDataTable").dataTable();
    // });
    // $(document).ready( function () {
    //     // $('table').DataTable();
    //     $('#data-table-simple, #data-table-simple2, #data-table-simple3, #data-table-simple4, #data-table-simple5, #data-table-simple6, #data-table-simple7, #data-table-simple8').dataTable();
    // } );
    // $(document).ready(function(){
        $('table').dataTable();
    // });
</script>
@endsection
