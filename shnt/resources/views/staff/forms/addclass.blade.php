@extends('layouts.dashboard')
@section('username', session()->get('username'))
@section('title', 'Add Class')

@section('meta')
@parent
<!-- <meta name="csrf-token" content="{{ csrf_token() }}" /> -->
@endsection

@section('css')
@parent
<link href="/assets/vendors/data-tables/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet">
@endsection

@section('breadcrumbs')
    <li><a href="{{route('dashboard')}}"><i class="fa fa-home"></i> HOME</a></li>
    <li><a href="{{route('dashboard')}}"><i class="fa fa-newspaper-o"></i>CONFIGURATIONS</a></li>
    <li><a href="{{route('staff.forms.addclass')}}"><i class="fa fa-home"></i> ADD CLASSES</a></li>
@endsection

@section('content')
<div class="row">
    <div class="col s12 m12 l12">
        <div class="card-panel grey darken-1">
            <span class="white-text">
                In this section you can manipulate alloted classes. The form below populates the room numbers  based on the floor selected by you. You can also view already allotted classes by Scrolling further on the page.
            </span>
        </div>
    </div>
    <div class="col s12 m12 l12">
        <div class="card-panel">
            <h4 class="header">ADDING CLASSES</h4>
            <div class="row">
                <form method="" action="">
                    <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
                    <div class="input-field col s4">
                        <select name="floor" id="floor">
                        <option value="null" disabled selected>Select floor</option>
                        @foreach($floors = \App\Classrooms::distinct('floor')->select('floor')->get() as $floor)
                            <option value="{{$floor->floor}}">{{$floor->floor}}</option>
                        @endforeach
                        </select>
                    </div>

                    <div class="input-field col s4">
                        <select name="roomno" id="roomno">
                        <option value="null" disabled selected>Select Room Number</option>
                        </select>
                    </div>
                </form>
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
    $('table').dataTable();
    // $.ajaxSetup({
	// headers: {
	// 	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	//         }
    // });
    $(document).ready(function(){
        $('#floor').on('change',function(e){
            console.log(e.target.value);
            var id = e.target.value;
            // $.post('/getRoomNo',{roomno:id},function(data){
            //     alert(data);
            // }); 

            $.ajax({
                type : "POST",
                url : "/kamehamehaa",
                data : {
                    "_token" : "{{csrf_token()}}",
                    "id" : id 
                },
                success : function(data){
                    console.log(data);
                }
            })
        });
    });


</script>
@endsection