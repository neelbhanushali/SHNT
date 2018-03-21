@extends('layouts.dashboard')
@section('page', 'Allocate Faculties')

@section('css')
@parent
<link href="/assets/vendors/data-tables/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet">
@endsection

@section('breadcrumbs')
<li><a href="{{route('dashboard')}}">HOME</a></li>
<li><a href="{{url()->current()}}">Allocate Faculties</a></li>
@endsection


@section('content')
<div class="row">
    <div class="col s12 m12 l12">
        <div class="card-panel">
            <div>
                <h4 class="header">Allocate Faculties</h4>
                <div class="row">
                    <ul class="tabs tabs-fixed-width">
                        @foreach($courses as $key => $value)
                        <li class="tab col s3"><a href="#sem_{{$key}}">SEM{{$key}}</a></li>
                        @endforeach
                    </ul>
                    @foreach($courses as $key => $value)
                    <div id="sem_{{$key}}" class="col s12">
                        <br>
                        <table class="datatable display" cellspacing="0">
                            <thead>
                                <tr>
                                    <td>Subject</td>
                                    <td>TH</td>
                                    <td>PT</td>
                                </tr>
                            </thead>
                            @foreach($value as $c)
                            <tr>
                                <td>
                                    <form id="sem_{{$key}}_{{$c->c_course_id}}" action="">
                                        {{csrf_field()}}
                                        <input type="hidden" name="course_id" value="{{$c->c_course_id}}">
                                    </form>
                                    {{$c->short}}
                                </td>
                                <td>
                                    @if(!empty($c->ia1)||!empty($c->ia2)||!empty($c->ese))
                                    <select form="sem_{{$key}}_{{$c->c_course_id}}" name="teacher_th" id="">
                                        <option value="" disabled selected>Select staff</option>
                                        <option value="none">none</option>
                                        @foreach($staffs as $s)
                                        <option @if($s->username == $c->teacher_th){{'selected'}}@endif value="{{$s->username}}">{{$s->firstname}} {{$s->lastname}} @if($s->hod){{'(you)'}}@endif</option>
                                        @endforeach
                                    </select>
                                    @endif
                                </td>
                                <td>
                                    @if(!empty($c->pror)||!empty($c->oral)||(empty($c->ia1)&&empty($c->ia2)&&empty($c->ese)&&!empty($c->tw)))
                                    <select form="sem_{{$key}}_{{$c->c_course_id}}" name="teacher_pt" id="">
                                        <option value="" disabled selected>Select staff</option>
                                        <option value="none">none</option>
                                        @foreach($staffs as $s)
                                        <option @if($s->username == $c->teacher_pt){{'selected'}}@endif value="{{$s->username}}">{{$s->firstname}} {{$s->lastname}} @if($s->hod){{'(you)'}}@endif</option>
                                        @endforeach
                                    </select>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    @endforeach
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
        @foreach($courses as $key => $value)
        $('#sem_{{$key}} .datatable').DataTable( {
          dom: 'Bfrtip',
          buttons: [
              {
                  text: 'Update Details',
                  action: function ( e, dt, node, config ) {
                    $(node).closest('.dataTables_wrapper').find('form').each(function() {
                        $.post(
                            $(this).attr('action'),
                            $(this).serialize(),
                            function(data) {
                                
                            }
                        )
                    });
                  }
              },
              {
                    text: 'Info',
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
        @endforeach

    });
</script>
@endsection