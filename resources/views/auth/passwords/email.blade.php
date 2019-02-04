@extends('layouts.app')

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
                    @if (session('status'))
                    <div class="alert alert-success" style="margin-top: 35px;margin-bottom: 0px;border-radius: 0px;margin-left: -15px;margin-right: -15px;padding-left: 60px;">
                        <i class="fa fa-envelope m-r-10"></i>{{ session('status') }}
                    </div>
                    @endif
                    <form id="emailForm" class="form-horizontal" method="POST" action="{{ route('password.email') }}" role="form" novalidate>
                        @csrf
                        @captcha
                        <div class="col-xs-10 col-xs-offset-1">
                            <div class="form-group form-group-mat{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required>
                                <label for="email" class="control-label"><i class="fa fa-envelope m-r-5"></i> E-Mail Address</label><i class="bar"></i>
                                <div id="error_email" class=""></div>
                                @if ($errors->has('email'))
                                <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                                @endif
                            </div>
                            <div class="form-group form-group-mat" style="text-align:center;">
                                <button id="emailButton" type="submit" class="btn btn-primary" data-ripple="rgba(255,255,255,0.5)" style="width:95%; margin-top: 10px;">
                                    Send Password Reset Link
                                </button>
                            </div>
                            <span style="display: block;text-align: center;margin-top: 20px;">
                                <a href="{{ route('login') }}"><i class="fa fa-caret-left m-r-5"></i>Back to Log in</a>
                            </span>
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

    function validateForm() {
        var valid = true;
        $(".help-block").hide();
        var email = $("#email").val();
        if (email == '') valid = field_error('email', 'Email is required!');
        else if (!email.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,5})+$/)) valid = field_error("email","Enter a valid Email Address!");
        return valid;
    }
    $(document).ready(function() {
        // Code for indivadual Register fields STARTS
        $('#email').on('blur', function() {
            ($(this).val() == "") ? field_clear("email"): validateForm()
        });
        //Code for Register Form Submit STARTS
        $('#emailForm').on('submit', _beforeSubmit = function(e) {
            if (!validateForm()) {
                e.preventDefault();
                return false;
            } else {
                $('button').attr('disabled', 'disabled');
                $('button#emailButton').text("").append('<i class="fa fa-spin fa-circle-o-notch m-r-10"></i>Please Wait...');
                return true;
            }
        });
    });
</script>
@endsection
