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
                        <select name="roomno" id="roomno1">
                        <option value="null" disabled selected>Select Room Number</option>
                        </select>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <!-- <div class="col s12 m12 l12">
        <div class="card-panel grey darken-1">
            <span class="white-text">
                In this section you can manipulate alloted classes. The form below populates the room numbers  based on the floor selected by you. You can also view already allotted classes by Scrolling further on the page.
            </span>
        </div>
    </div> -->
    <div class="col s12 m12 l12">
        <div class="card-panel">
            <h4 class="header">ALLOTTED CLASSROOMS IN YOUR DEPARTMENT</h4>
            <div class="row">
                <div class="col s12 m12 l12">
                    <table class="display">
                        <thead>
                            <th>NAME</th>
                            <th>ROOM NUMBER</th>
                            <th>ACTION</th>                     
                        </thead>
                        <tbody>
                        @foreach($allottedclasses = \App\AllottedClass::where('dept', $user->department)->get() as $allottedclass)
                            <td>{{$allottedclass->name}}</td>
                            <td>{{$allottedclass->room}}</td>
                            <td><button type="button" class="btn waves-effect waves-light clicker" id="{{$allottedclass->room}}">MORE INFO</button></td>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row" id="moreinfo">
    <!-- <div class="col s12 m12 l12">
        <div class="card-panel grey darken-1">
            <span class="white-text">
                In this section you can manipulate alloted classes. The form below populates the room numbers  based on the floor selected by you. You can also view already allotted classes by Scrolling further on the page.
            </span>
        </div>
    </div> -->
    <div class="col s12 m12 l12">
        <div class="card-panel">
            <h4 class="header">ALLOTTED CLASSROOMS IN YOUR DEPARTMENT</h4>
            <div class="row">
                <div class="col s12 m12 l12">
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('js')
@parent
<script>
    $('table').dataTable();
    // $.ajaxSetup({
	// headers: {
	// 	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	//         }
    // });
    $(document).ready(function(){
        $('#floor').on('change',function(e){
            // console.log(e.target.value);
            var id = e.target.value;
            // $.post('/getRoomNo',{roomno:id},function(data){
            //     alert(data);
            // }); 

            $.ajax({
                type : "POST",
                url : "{{route('kamehamehaa')}}",
                data : {
                    "_token" : "{{csrf_token()}}",
                    "id" : id 
                },
                success : function(data){
                    $("#roomno1").empty();
                    $.each(data,function(key,value){
                        console.log(value.roomnumber);
                        $("#roomno1").append("<option value='"+value.roomnumber+"'>"+value.roomnumber+"</option>");
                    });
                    $('select').material_select();                  
                }
            });
        });
    });

    $(document).ready(function(){
        $(document).on('click','.btn',function(){
            console.log($(this).attr("id"));
            
        });
    });
</script>
@endsection