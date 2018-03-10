@extends('layouts.form')

@section('page', 'Register')

@section('content')
<div id="register-page" class="row">
  <div class="col s12 z-depth-4 card-panel">
    <form id="register-form" method="post" action="{{action('user@register')}}">
      <fieldset class="form-fieldset">
      {{--  {{csrf_field()}}  --}}
      <div class="row">
        <div class="input-field col s12 center">
          <h4>Register</h4>
        </div>
      </div>
      <div class="row margin">
          <div class="input-field col s12">
            <i class="material-icons prefix pt-5">person_outline</i>
            <select name="registeras">
              <option value="" selected disabled>Register As</option>
              <option value="student">Student</option>
              <option value="staff">Staff</option>
              <option value="examcell">Exam Cell</option>
            </select>
          </div>
      </div>
      <div class="row margin">
          <div class="input-field col s12">
            <i class="material-icons prefix pt-5">import_contacts</i>
            <select name="department">
              <option value="" selected disabled>Department</option>
              @foreach($dept = \App\Department::all() as $d)
              <option value="{{$d->dept}}">{{$d->department}}</option>
              @endforeach
            </select>
          </div>
      </div>
      <div class="row margin">
        <div class="input-field col s12">
          <i class="material-icons prefix pt-5">person_outline</i>
          <input name="firstname" id="firstname" type="text">
          <label for="firstname" class="center-align">First Name</label>
        </div>
      </div>
      <div class="row margin">
        <div class="input-field col s12">
          <i class="material-icons prefix pt-5">person_outline</i>
          <input name="username" id="username" type="text">
          <label for="username" class="center-align">Username</label>
        </div>
      </div>
      <div class="row margin">
        <div class="input-field col s12">
          <i class="material-icons prefix pt-5">email</i>
          <input id="email" type="email" name="email">
          <label for="email" class="center-align">Email</label>
        </div>
      </div>
      <div class="row margin">
        <div class="input-field col s12">
          <i class="material-icons prefix pt-5">phone</i>
          <input id="contact" type="number" name="contact">
          <label for="contact" class="center-align">Contact</label>
        </div>
      </div>
      <div class="row margin">
        <div class="input-field col s12">
          <i class="material-icons prefix pt-5">lock_outline</i>
          <input id="password" type="password" name="password">
          <label for="password">Password</label>
        </div>
      </div>
      <div class="row margin">
        <div class="input-field col s12">
          <i class="material-icons prefix pt-5">lock_outline</i>
          <input id="password-again" type="password" name="password2">
          <label for="password-again">Password again</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12 center">
          <button type="submit" class="btn waves-effect waves-light">Register Now</button>
        </div>
        <div class="input-field col s12">
          <p class="margin center medium-small sign-up">Already have an account? <a href="{{route('login')}}">Login</a></p>
        </div>
      </div>
      </fieldset>
    </form>
  </div>
</div>
@endsection

@section('js')
@parent
<script>
  $(document).ready(function() {
    $('#register-form').validate({
      rules: {
        registeras: 'required',
        department: 'required',
        firstname: {
          required: true,
          lettersonly: true
        },
        username: {
          required: true,
          remote: {
            url: '{{route('validator')}}',
            type: 'post',
            data: {
              username: function() {
                return $('#register-form [name=username]').val();
              }
            }
          }
        },
        rollnumber: {
          required: true,
          remote: {
            url: '{{route('validator')}}',
            type: 'post',
            data: {
              rollnumber: function() {
                return $('#register-form [name=rollnumber]').val();
              }
            }
          }
        },
        email: {
          required: true,
          email: true,
          remote: {
            url: '{{route('validator')}}',
            type: 'post',
            data: {
              email: function() {
                return $('#register-form [name=email]').val();
              }
            }
          }
        },
        contact: {
          required: true,
          digits: true,
          remote: {
            url: '{{route('validator')}}',
            type: 'post',
            data: {
              contact: function() {
                return $('#register-form [name=contact]').val();
              }
            }
          }
        },
        password: 'required',
        password2: {
          required: true,
          equalTo: '#password'
        }
      },
      messages: {
        username: {
          remote: $.validator.format("<b><i>{0}</i></b> is already associated with an account.")
        },
        rollnumber: {
          remote: $.validator.format("<b><i>{0}</i></b> is already associated with an account.")
        },
        email: {
          remote: $.validator.format("<b><i>{0}</i></b> is already associated with an account.")
        },
        contact: {
          remote: $.validator.format("<b><i>{0}</i></b> is already associated with an account.")
        }
      }
    });

    $('select[name=registeras]').change(function() {
      var val = $(this).val();
      if(val == 'student') {
        $('input[name=username]').attr('name', 'rollnumber');
        $('label[for=username]').html('Roll Number');
      }
      else {
        $('input[name=rollnumber]').attr('name', 'username');
        $('label[for=username]').html('Username');
      }

      if(val == 'examcell') {
        $('select[name=department]').closest('.row.margin').hide();
      }
      else {
        $('select[name=department]').closest('.row.margin').show();
      }
    });

    $('#register-form').submit(function(e) {
      if(!$(this).valid()) return;

      e.preventDefault();
      var form = $(this);
      var formdata = $(form).serialize();
      $(form).loading();

      $.post(
        $(form).attr('action'),
        formdata,
        function(data) {
          data = JSON.parse(data);
          $('meta[name="csrf-token"]').attr('content', data._token);
          swal("Success", data.message, "success");
          $(form).done();
          Materialize.updateTextFields();
        }
      );
    });
  });
</script>
@endsection