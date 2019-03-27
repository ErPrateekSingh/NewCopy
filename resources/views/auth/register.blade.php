@extends('layouts.app')

@section('title', 'Sign Up')

@section('styles')
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
            <div class="panel panel-form clearfix">
                <div class="panel-circle">
                    <i class="fa fa-user-plus" style="margin-left: 5px;"></i>
                    <span style="margin-left: 5px;">SIGN-UP</span>
                </div>
                <div class="panel-body">
                    <form id="registerForm" class="form-horizontal clearfix" method="POST" action="{{ route('register') }}" role="form" novalidate>
                        @csrf
                        {{-- Localhost is not allowed on google recaptcha Code below is tried and tested
                        and should be uncommented before going live --}}
                        {{-- @captcha --}}
                        <div class="col-xs-10 col-xs-offset-1">
                            <div class="form-group form-group-mat{{ $errors->has('fname') ? ' has-error' : '' }}">
                                <input id="fname" type="text" class="form-control" name="fname" value="{{ old('fname') }}" required autocomplete="off" spellcheck="false">
                                <label for="fname" class="control-label"><i class="fa fa-user m-r-5"></i> First Name</label><i class="bar"></i>
                                <div id="error_fname" class=""></div>
                                @if ($errors->has('fname'))
                                <span class="help-block"> {{ $errors->first('fname') }} </span>
                                @endif
                            </div>
                            <div class="form-group form-group-mat{{ $errors->has('lname') ? ' has-error' : '' }}">
                                <input id="lname" type="text" class="form-control" name="lname" value="{{ old('lname') }}" required autocomplete="off" spellcheck="false">
                                <label for="lname" class="control-label"><i class="fa fa-user m-r-5"></i> Last Name</label><i class="bar"></i>
                                <div id="error_lname" class=""></div>
                                @if ($errors->has('lname'))
                                <span class="help-block"> {{ $errors->first('lname') }} </span>
                                @endif
                            </div>
                            <div class="form-group form-group-mat{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="off" spellcheck="false">
                                <label for="email" class="control-label"><i class="fa fa-envelope m-r-5"></i> E-Mail Address</label><i class="bar"></i>
                                <div id="error_email" class=""></div>
                                @if ($errors->has('email'))
                                <span class="help-block"> {{ $errors->first('email') }} </span>
                                @endif
                            </div>
                            <div class="form-group form-group-mat{{ $errors->has('password') ? ' has-error' : '' }}">
                                <input id="password" type="password" class="form-control" name="password" style="padding-right: 60px !important;" required autocomplete="off" spellcheck="false">
                                <span title="Show Password" class="fa fa-eye-slash" style="top: 9px;right: 0px;color: #777;padding: 5px;cursor: pointer;position: absolute;font-size: 18px;"></span>
                                <label for="password" class="control-label"><i class="fa fa-lock m-r-5"></i> Password</label><i class="bar"></i>
                                <div id="error_password" class=""></div>
                                @if ($errors->has('password'))
                                <span class="help-block"> {{ $errors->first('password') }} </span>
                                @endif
                            </div>
                            <div class="form-group form-group-mat" style="text-align:center;">
                                <button id="registerButton" type="submit" class="btn btn-primary" data-ripple="rgba(255,255,255,0.5)" style="width:40%; margin-top: 20px;">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                    <div style="position: relative;">
                        <hr style="border-top-color: #ccc;width: 80%;margin-top: 40px;margin-bottom: 40px;">
                        <span style="font-size: 18px;font-style: italic;z-index: 10;position: absolute;top: -13px;right: calc(50% - 13px);background: white;width: 26px;padding: 0 6px 0 2px;">Or</span>
                        <div class="row">
                            <div class="col-sm-6">
                                <button data-ripple="rgba(255,255,255,0.7)" class="btn btn-lg fb-bg form-bg-btn">
                                    <i class="fa fa-facebook m-r-5"></i> Join with Facebook
                                </button>
                            </div>
                            <div class="col-sm-6">
                                <button data-ripple="rgba(255,255,255,0.7)" class="btn btn-lg gp-bg form-bg-btn">
                                    <i class="fa fa-google-plus m-r-5"></i> Join with Google
                                </button>
                            </div>
                        </div>
                        <span style="font-size: 12px;display: block;text-align: center;margin-top: 20px;">
                            By Signing Up, you agree to our <a href="#">Terms of Services</a> and <a href="#">Privacy Policy</a>.
                        </span>
                        <span style="display: block;text-align: center;margin-top: 20px;">
                            Have an account? <a href="{{ route('login') }}">Log in</a>
                        </span>
                    </div>
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
        if (id == "password") {
            $('#glyphcn' + id).attr('style', 'right: 20px !important;');
        }
        return false;
    }

    function field_success(id) {
        $('#error_' + id).attr('class', '').text('');
        $("#glyphcn" + id).remove();
        var div = $("#" + id).closest("div");
        div.removeClass("has-error").addClass("has-success has-feedback").append('<span id="glyphcn' + id + '" class="glyphicon glyphicon-ok form-control-feedback"></span>');
        if (id == "password") {
            $('#glyphcn' + id).attr('style', 'right: 20px !important;');
        }
    }

    function field_clear(id) {
        $('#error_' + id).attr('class', '').text('');
        $("#glyphcn" + id).remove();
        $("#" + id).closest("div").removeClass("has-error has-success has-feedback");
    }

    function field_wait(id) {
        $('#error_' + id).attr('class', '').text('');
        $("#glyphcn" + id).remove();
        var div = $("#" + id).closest("div");
        div.removeClass("has-error has-success has-feedback").append('<span id="glyphcn' + id +
            '" style="font-size: 16px;color: #f4545f;width: 16px;position: absolute;height: 16px;top: 16px;right: 10px;z-index: 2;text-align: center;pointer-events: none;" class="fa fa-refresh fa-spin"></span>');
    }

    function ajaxEmailUnique(email) {
        var valid = true;
        field_wait("email");
        $.ajax({
            type: 'post',
            url: "/email/unique",
            data: {
                'email': email
            },
            success: function(data) {
                // console.log(data);
                if (data == "true") field_success("email");
                else valid = field_error("email", "This Email already Exists!");
            }
        });
        return valid;
    }

    function emailUnique() {
        var valid = true;
        var email = $("input[name='email']").val();
        if (email != "") {
            if (!email.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,5})+$/)) field_error("email","Enter a valid Email Address!");
            else valid = ajaxEmailUnique(email);
        } else {
            field_clear("email");
        }
        return valid;
    }

    function validateForm() {
        var valid = true;
        var fname = $("#fname").val();
        var lname = $("#lname").val();
        var password = $("#password").val();
        if (fname == '') valid = field_error('fname', 'First Name is required!');
        else if (!fname.match(/^[a-zA-Z ]+$/)) valid = field_error('fname', 'Only alphabets and spaces are allowed!');
        else field_success('fname');
        if (lname == '') valid = field_error('lname', 'Last Name is required!');
        else if (!lname.match(/^[a-zA-Z ]+$/)) valid = field_error('lname', 'Only alphabets and spaces are allowed!');
        else field_success('lname');
        if ($("input[name='email']").val() == '') valid = field_error('email', 'Email is required!');
        else if ($("#error_email").text() === "This Email already Exists!") valid = false;
        if (password == '') valid = field_error('password', 'Password is required!');
        else if (!password.match(/^[a-zA-Z0-9]+$/)) valid = field_error('password', 'Only alphabets and spaces are allowed!');
        else if (password.length <= 6) valid = field_error('password', 'Minimum 6 characters reqiured!');
        else field_success('password');
        return valid;
    }

    function Validate(idName, type) {
        var id = $("#" + idName).val();
        if (type == 'a-s-only') {
            if (!id.match(/^[a-zA-Z ]+$/)) field_error(idName, "Only alphabets and spaces are allowed!");
            else field_success(idName);
        } else if (type == 'password') {
            if (!id.match(/^[a-zA-Z0-9]+$/)) field_error(idName, "Only alphabets and numbers are allowed!");
            else if (id.length <= 6) field_error(idName, 'Minimum 6 characters reqiured!');
            else field_success(idName);
        }
    }
    $(document).ready(function() {
        // Code to show password button STARTS
        $(".fa-eye-slash")
            .mousedown(function() {
                $("#password").attr('type', 'text');
                $(this).attr('class', 'fa fa-eye');
            })
            .on("mouseup mouseout", function() {
                $("#password").attr('type', 'password');
                $(this).attr('class', 'fa fa-eye-slash');
            });

        // Code for indivadual Register fields STARTS
        $('#fname').on('blur', function() {
            ($(this).val() == "") ? field_clear("fname"): Validate('fname', 'a-s-only')
        });
        $('#lname').on('blur', function() {
            ($(this).val() == "") ? field_clear("lname"): Validate('lname', 'a-s-only')
        });
        $('#email').on('blur', function() {
            emailUnique();
        });
        $('#password').on('blur', function() {
            ($(this).val() == "") ? field_clear("password"): Validate('password', 'password')
        });
        //Code for Register Form Submit STARTS
        $('#registerForm').on('submit', _beforeSubmit = function(e) {
            if (!validateForm()) {
                e.preventDefault();
                return false;
            } else {
                $('button').attr('disabled', 'disabled');
                $('button#registerButton').text("").append('<i class="fa fa-spin fa-circle-o-notch m-r-10"></i>Please Wait...');
                return true;
            }
        });
    });
</script>
@endsection
