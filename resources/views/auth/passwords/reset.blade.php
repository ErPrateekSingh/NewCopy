@extends('layouts.app')

@section('title', 'Reset Password')

@section('styles')
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
            <div class="panel panel-form clearfix">
                <div class="panel-circle">
                    <i class="fa fa-lock" style="margin-top: 5px;"></i>
                    <span style="font-size: 16px;line-height: 1.1;">Reset Password</span>
                </div>
                <div class="panel-body">
                    <form id="passwordForm" class="form-horizontal" method="POST" action="{{ route('password.request') }}" role="form" novalidate>
                        @csrf
                        @captcha
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="col-xs-10 col-xs-offset-1">
                            <div class="form-group form-group-mat{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required>
                                <label for="email" class="control-label"><i class="fa fa-envelope m-r-5"></i> E-Mail Address</label><i class="bar"></i>
                                <div id="error_email" class=""></div>
                                @if ($errors->has('email'))
                                <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                                @endif
                            </div>

                            <div class="form-group form-group-mat{{ $errors->has('password') ? ' has-error' : '' }}">
                                <input id="password" type="password" class="form-control" name="password" required>
                                <label for="password" class="control-label"><i class="fa fa-lock m-r-5"></i>Password</label><i class="bar"></i>
                                <div id="error_password" class=""></div>
                                @if ($errors->has('password'))
                                <span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
                                @endif
                            </div>

                            <div class="form-group form-group-mat{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                <label for="password-confirm" class="control-label"><i class="fa fa-lock m-r-5"></i>Confirm Password</label><i class="bar"></i>
                                <div id="error_password-confirm" class=""></div>
                            </div>

                            <div class="form-group form-group-mat" style="text-align:center;">
                                <button id="passwordButton" type="submit" class="btn btn-primary" data-ripple="rgba(255,255,255,0.5)" style="width: 95%;margin-top: 15px;margin-bottom: 30px;">
                                    Reset Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function field_error(id, text) {
        $('#error_' + id).attr('class', 'error').text(text);
        $("#glyphcn" + id).remove();
        var div = $("#" + id).closest("div");
        div.removeClass("has-success").addClass("has-error has-feedback").append('<span id="glyphcn' + id + '" class="glyphicon glyphicon-remove form-control-feedback"></span>');
        return false;
    }

    function field_clear(id) {
        $('#error_' + id).attr('class', '').text('');
        $("#glyphcn" + id).remove();
        $("#" + id).closest("div").removeClass("has-error has-success has-feedback");
    }

    function validateForm(type) {
        var valid = true;
        $(".help-block").hide();
        if (type == 'email') {
          var email = $("#email").val();
          if (email == '') valid = field_error('email', 'Email is required!');
          else if (!email.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,5})+$/)) valid = field_error("email","Enter a valid Email Address!");
          else field_clear('email');
          return valid;
        } else if (type == 'password') {
          var password = $("#password").val();
          if (password == '') valid = field_error('password', 'Password is required!');
          else if (!password.match(/^[a-zA-Z0-9]+$/)) valid = field_error('password', 'Only alphabets and spaces are allowed!');
          else if (password.length <= 6) valid = field_error('password', 'Minimum 6 characters reqiured!');
          else field_clear('password');
          return valid;
        } else if (type == 'password-confirm') {
          var pass = $("#password").val();
          var passConf = $("#password-confirm").val();
          if (passConf == '') valid = field_error('password-confirm', 'Password Confirmation is required!');
          else if(pass !== passConf) valid = field_error("password-confirm", 'Password Mismatch!');
          else field_clear('password-confirm');
          return valid;
        }
    }

    function validateSubmit() {
      var valid1 = validateForm("email");
      var valid2 = validateForm("password");
      var valid3 = validateForm("password-confirm");
      var valid = (valid1 && valid2 && valid3);
      return valid;
    }

    $(document).ready(function() {
        // Code for indivadual Register fields STARTS
        $('#email').on('blur', function() {
            ($(this).val() == "") ? field_clear("email"): validateForm("email")
        });
        $('#password').on('blur', function() {
            ($(this).val() == "") ? field_clear("password"): validateForm("password")
        });
        $('#password-confirm').on('blur', function() {
            ($(this).val() == "") ? field_clear("password-confirm"): validateForm("password-confirm")
        });
        //Code for Register Form Submit STARTS
        $('#passwordForm').on('submit', _beforeSubmit = function(e) {
            if (!validateSubmit()) {
                e.preventDefault();
                return false;
            } else {
                $('button').attr('disabled', 'disabled');
                $('button#passwordButton').text("").append('<i class="fa fa-spin fa-circle-o-notch m-r-10"></i>Please Wait...');
                return true;
            }
        });
    });
</script>
@endsection
