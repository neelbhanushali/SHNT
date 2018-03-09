@extends('layouts.dashboard')
@section('username', session()->get('username'))
@section('title', 'Schemes')

@section('css')
@parent
<link href="/assets/vendors/data-tables/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet">
@endsection

@section('breadcrumbs')
<li><a href="">HOME</a></li>
<li><a href="">CURRICULUM</a></li>
<li><a href="">SCHEMES</a></li>
@endsection


@section('content')
<div class="row">
  <div class="col s12 m12 l12">
    <div class="card-panel">
      <h4 class="header2">Add Scheme</h4>
      <div class="row">
        <form class="col s12" action="{{url('addscheme')}}" method="post">
          <div class="row">
            <div class="input-field col s12">
              <input id="scheme" type="text" name="scheme" class="validate">
              <label for="scheme">Scheme</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input id="wef" type="text" name="wef">
              <label for="wef">With Effect From</label>
            </div>
          </div>
          <div class="row">
            <div class="row">
              <div class="input-field col s12">
                <button class="btn cyan waves-effect waves-light right" id="scheme" type="submit" name="action">Submit
                  <i class="material-icons right">send</i>
                </button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="row">
    <div class="col s12 m12 l12">
        <div class="card-panel">
            <div id="table-datatables">
                <h4 class="header">SCHEMES</h4>
                <h6 class="header">This table will show you all the schemes available in the system.</h6> 
                <div class="row">
                    <div class="col s12">
                        <table id="data-table-simple" class="responsive-table display" cellspacing="0">
                            <thead>
                                <tr>
                                    <td>SCHEME NAME</td>
                                    <td>WITH EFFECT FROM</td>
                                </tr>
                            </thead>
                            @foreach($scheme = \App\Scheme::orderBy('wef','desc')->get() as $schemes)
                            <tr>
                                <td>{{$schemes->scheme}}</td>
                                <td>{{$schemes->wef}}</td>
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
<script src="/assets/js/jquery.validate.min.js"></script>
<script src="/assets/js/scripts/form-elements.js"></script>
<script type="text/javascript" src="/assets/vendors/jquery-3.2.1.min.js"></script>
<!--materialize js-->
<script type="text/javascript" src="/assets/js/materialize.min.js"></script>
<!--scrollbar-->
<script type="text/javascript" src="/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<!--plugins.js - Some Specific JS codes for Plugin Settings-->
<script type="text/javascript" src="/assets/js/plugins.js"></script>
<!--custom-script.js - Add your own theme custom JS-->
<script type="text/javascript" src="/assets/js/custom-script.js"></script>
<!-- data-table  -->
<script type="text/javascript" src="/assets/vendors/data-tables/js/jquery.dataTables.min.js"></script>
<!--data-tables.js - Page Specific JS codes -->
<script type="text/javascript" src="/assets/js/scripts/data-tables.js"></script>
<!--plugins.js - Some Specific JS codes for Plugin Settings-->
<script type="text/javascript" src="/assets/js/plugins.js"></script>
<script>
  $(document).ready(function(){
    $('#scheme').validate({
      rules: {
        name:{
          required: true
        }
      }
    });
    console.log('haris');
  });
</script>
@endsection