@extends('layouts.dashboard')
@section('page', 'Add Internal Marks')

@section('css')
@parent
<link href="/assets/vendors/data-tables/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet">
@endsection

@section('breadcrumbs')
<li><a href="{{route('dashboard')}}">HOME</a></li>
<li><a href="">Add Internal Marks</a></li>
<li><a href="{{url()->current()}}">{{$course->short}}</a></li>
@endsection


@section('content')
<input type="file" id="csv" name="csv" style="display: none" accept=".csv" />
<div class="row">
    <div class="col s12 m12 l12">
        <div class="card-panel">
            <div>
                <h4 class="header">Add Internal Marks</h4>
                <div class="row">
                    <ul class="tabs tabs-fixed-width">
                        <li class="tab col s3"><a href="#students">Regular ({{count($students)}})</a></li>
                        <li class="tab col s3"><a href="#studentskt">KT ({{count($studentskt)}})</a></li>
                    </ul>
                    <div id="students" class="col s12">
                        <br>
                        <table id="internalmarks" class="datatable display" cellspacing="0">
                            <thead>
                                <tr>
                                    <td>Roll Number</td>
                                    @if(!empty($course->ia1))<td>IA1</td>@endif
                                    @if(!empty($course->ia2))<td>IA2</td>@endif
                                    @if(!empty($course->tw))<td>TW</td>@endif
                                </tr>
                            </thead>
                            @foreach($students as $s)
                            <tr>
                                <td>
                                    {{$s->rollnumber}}
                                    <form id="{{$s->rollnumber}}_{{$s->exam_form_id}}" action="" method="post">
                                        {{csrf_field()}}
                                        <input type="hidden" name="rollnumber" value="{{$s->rollnumber}}">
                                        <input type="hidden" name="exam_form_id" value="{{$s->exam_form_id}}">
                                        <input type="hidden" name="course_id" value="{{$course->id}}">
                                    </form>
                                </td>
                                @if(!empty($course->ia1))
                                <td>
                                    <div class="input-field col s12">
                                        @if(empty($s->ia1))
                                        <input data-no-change form="{{$s->rollnumber}}_{{$s->exam_form_id}}" placeholder="ia1" id="ia1" name="ia1" type="text" value="{{$s->ia1}}">
                                        @else
                                        {{$s->ia1}}
                                        @endif
                                    </div>
                                </td>
                                @endif
                                @if(!empty($course->ia2))
                                <td>
                                    <div class="input-field col s12">
                                        @if(empty($s->ia2))
                                        <input form="{{$s->rollnumber}}_{{$s->exam_form_id}}" placeholder="ia2" id="ia2" name="ia2" type="text" value="{{$s->ia2}}">
                                        @else
                                        {{$s->ia2}}
                                        @endif
                                    </div>   
                                </td>
                                @endif
                                @if(!empty($course->tw))
                                <td>
                                    <div class="input-field col s12">
                                        @if(empty($s->tw))
                                        <input form="{{$s->rollnumber}}_{{$s->exam_form_id}}" placeholder="tw" id="tw" name="tw" type="text" value="{{$s->tw}}">
                                        @else
                                        {{$s->tw}}
                                        @endif
                                    </div>    
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    <div id="studentskt" class="col s12">
                        <br>
                            <table id="internalmarkskt" class="datatable display" cellspacing="0">
                                <thead>
                                    <tr>
                                        <td>Roll Number</td>
                                        @if(!empty($course->ia1))<td>IA1</td>@endif
                                        @if(!empty($course->ia2))<td>IA2</td>@endif
                                        @if(!empty($course->tw))<td>TW</td>@endif
                                    </tr>
                                </thead>
                                @foreach($studentskt as $sk)
                                <tr>
                                        <td>
                                            {{$skt->rollnumber}}
                                            <form id="{{$skt->rollnumber}}_{{$skt->exam_form_id}}" action="" method="post">
                                                {{csrf_field()}}
                                                <input type="hidden" name="rollnumber" value="{{$skt->rollnumber}}">
                                                <input type="hidden" name="exam_form_id" value="{{$skt->exam_form_id}}">
                                                <input type="hidden" name="course_id" value="{{$course->id}}">
                                            </form>
                                        </td>
                                        @if(!empty($course->ia1))
                                        <td>
                                            <div class="input-field col s12">
                                                @if(empty($skt->ia1))
                                                <input data-no-change form="{{$skt->rollnumber}}_{{$skt->exam_form_id}}" placeholder="ia1" id="ia1" name="ia1" type="text" value="{{$skt->ia1}}">
                                                @else
                                                {{$skt->ia1}}
                                                @endif
                                            </div>
                                        </td>
                                        @endif
                                        @if(!empty($course->ia2))
                                        <td>
                                            <div class="input-field col s12">
                                                @if(empty($skt->ia2))
                                                <input form="{{$skt->rollnumber}}_{{$skt->exam_form_id}}" placeholder="ia2" id="ia2" name="ia2" type="text" value="{{$skt->ia2}}">
                                                @else
                                                {{$skt->ia2}}
                                                @endif
                                            </div>   
                                        </td>
                                        @endif
                                        @if(!empty($course->tw))
                                        <td>
                                            <div class="input-field col s12">
                                                @if(empty($skt->tw))
                                                <input form="{{$skt->rollnumber}}_{{$skt->exam_form_id}}" placeholder="tw" id="tw" name="tw" type="text" value="{{$skt->tw}}">
                                                @else
                                                {{$skt->tw}}
                                                @endif
                                            </div>    
                                        </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                </div>
            </div>  
        </div>
    </div>
</div>

@endsection

@section('js')
@parent

<script src="/assets/js/jquery.csv.min.js"></script>


<script>
    function isAPIAvailable() {
      // Check for the various File API support.
      if (window.File && window.FileReader && window.FileList && window.Blob) {
        // Great success! All the File APIs are supported.
        return true;
      } else {
        // source: File API availability - http://caniuse.com/#feat=fileapi
        // source: <output> availability - http://html5doctor.com/the-output-element/
        document.writeln('The HTML5 APIs used in this form are only available in the following browsers:<br />');
        // 6.0 File API & 13.0 <output>
        document.writeln(' - Google Chrome: 13.0 or later<br />');
        // 3.6 File API & 6.0 <output>
        document.writeln(' - Mozilla Firefox: 6.0 or later<br />');
        // 10.0 File API & 10.0 <output>
        document.writeln(' - Internet Explorer: Not supported (partial support expected in 10.0)<br />');
        // ? File API & 5.1 <output>
        document.writeln(' - Safari: Not supported<br />');
        // ? File API & 9.2 <output>
        document.writeln(' - Opera: Not supported');
        return false;
      }
    }

    function handleFileSelect(evt) {
      var files = evt.target.files; // FileList object
      var file = files[0];
        
      var reader = new FileReader();
      reader.readAsText(file);
      reader.onload = function(event){
        var csv = event.target.result;
        var data = $.csv.toObjects(csv);
        
        for(var i = 0; i < data.length; i++) {
            var selector = '[name=rollnumber][value='+data[i]['Roll Number']+']';
            $(selector).closest('tr').find('[name=ia1]').val(data[i]['IA1']);
            $(selector).closest('tr').find('[name=ia2]').val(data[i]['IA2']);
            $(selector).closest('tr').find('[name=tw]').val(data[i]['TW']);
        }
      };
      reader.onerror = function(){ alert('Unable to read ' + file.fileName); };
    }

    $(document).ready(function(){
        if(isAPIAvailable()) {
            $('#csv').bind('change', handleFileSelect);
        }

        // $('.datatable').DataTable().destroy();
        datatable.destroy();
        $('#internalmarks').DataTable( {
          dom: 'Bfrtip',
          buttons: [
              {
                  text: 'Import CSV',
                  action: function ( e, dt, node, config ) {
                      $('#csv').click();
                  }
              },
              {
                  extend: 'csv',
                  text: 'Export CSV',
                  filename: 'INTERNAL_ASSESSMENT_{{$course->short}}',
              },
              {
                    text: 'Update Marks',
                    action: function() {
                        $('#internalmarks form').each(function() {
                            $.post(
                                $(this).attr('action'),
                                $(this).serialize(),
                                function(data) {
                                    data = JSON.parse(data);
                                    $('meta[name="csrf-token"]').attr('content', data._token);
                                    swal({
                                    title: data.title,
                                    text: data.message,
                                    type: data.type
                                    }, function() {
                                        Materialize.updateTextFields();
                                    });
                                }
                            );
                        });
                    }
                }
              
          ]
      } );

      $('#internalmarkskt').DataTable( {
          dom: 'Bfrtip',
          buttons: [
              {
                  text: 'Import CSV',
                  action: function ( e, dt, node, config ) {
                      $('#csv').click();
                  }
              },
              {
                  extend: 'csv',
                  text: 'Export CSV',
                  filename: 'INTERNAL_ASSESSMENT_KT_{{$course->short}}',
              },
              {
                    text: 'Update Marks',
                    action: function() {
                        $('#internalmarkskt form').each(function() {
                            $.post(
                                $(this).attr('action'),
                                $(this).serialize(),
                                function(data) {
                                    data = JSON.parse(data);
                                    $('meta[name="csrf-token"]').attr('content', data._token);
                                    swal({
                                    title: data.title,
                                    text: data.message,
                                    type: data.type
                                    }, function() {
                                        Materialize.updateTextFields();
                                    });
                                }
                            );
                        });
                    }
                }
              
          ]
      } );

    });
</script>
@endsection