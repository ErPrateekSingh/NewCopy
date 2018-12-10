@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row">
      <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
         <div class="panel panel-form clearfix">
            <div class="panel-circle">
               <i class="fa fa-sign-in" style="margin-left: 5px;"></i>
               <span style="margin-left: 5px;">LOGIN</span>
            </div>
            <div class="panel-body">
               <form id="loginForm" class="form-horizontal clearfix" method="POST" action="{{ route('login') }}" role="form" novalidate>
                  @csrf
                  <div class="col-xs-10 col-xs-offset-1">
                     <div class="form-group form-group-mat{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required spellcheck="false">
                        <label for="email" class="control-label"><i class="fa fa-envelope m-r-5"></i> E-Mail Address</label><i class="bar"></i>
                        <div id="error_email" class=""></div>
                        @if ($errors->has('email'))
                           <span class="help-block"> {{ $errors->first('email') }} </span>
                        @endif
                     </div>
                     <div class="form-group form-group-mat{{ $errors->has('password') ? ' has-error' : '' }}">
                        <input id="password" type="password" class="form-control" name="password" required>
                        <label for="password" class="control-label"><i class="fa fa-lock m-r-5"></i> Password</label><i class="bar"></i>
                        <div id="error_password" class=""></div>
                        @if ($errors->has('password'))
                           <span class="help-block"> {{ $errors->first('password') }} </span>
                        @endif
                     </div>
                     <div class="form-group m-t-10">
                        <div class="row">
                           <div class="col-xs-6 xs-576">
                              <div class="checkbox">
                                 <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}><i class="helper"></i> Remember Me
                                 </label>
                              </div>
                           </div>
                           @if (Route::has('password.request'))
                               <style>@media(max-width:576px){.xs-576{width:100%;}.xs-576 > .pull-right{float:left !important;}}</style>
                               <div class="col-xs-6 xs-576" style="margin-top: 22px;padding-right: 0px;padding-left:3px;">
                                  <a class="btn btn-link pull-right" href="{{ route('password.request') }}">
                                     <i class="fa fa-lock m-r-5" style="font-size:18px;"></i> Forgot Password?
                                  </a>
                               </div>
                           @endif
                        </div>
                     </div>
                     @captcha
                     <div class="form-group form-group-mat" style="text-align:center;">
                        <button type="submit" class="btn btn-primary" data-ripple="rgba(255,255,255,0.5)" style="width:40%; margin-top: 10px;">
                           Login
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
                           <i class="fa fa-facebook m-r-5"></i> Login with Facebook
                        </button>
                     </div>
                     <div class="col-sm-6">
                        <button data-ripple="rgba(255,255,255,0.7)" class="btn btn-lg gp-bg form-bg-btn">
                           <i class="fa fa-google-plus m-r-5"></i> Login with Google
                        </button>
                     </div>
                  </div>
                  <span style="display: block;text-align: center;margin-top: 20px;">
                     <!-- Don't have an account? <a href="{-{ route('register') }-}">Sign Up</a> -->
                     New to {{ $siteName }}? <a href="{{ route('register') }}">Create an Account</a>
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
function field_error(id,text){
   $('#error_'+id).attr('class', 'error').text(text);
   $("#glyphcn"+id).remove();
   var div = $("#"+id).closest("div");
   div.removeClass("has-success").addClass("has-error has-feedback").append('<span id="glyphcn'+id+'" class="glyphicon glyphicon-remove form-control-feedback"></span>');
   return false;
}
function field_clear(id){
   $('#error_'+id).attr('class', '').text('');
   $("#glyphcn"+id).remove();
   $("#"+id).closest("div").removeClass("has-error has-success has-feedback");
}
function validateForm() {
   var valid = true;
   var email = $("#email").val();
   var password = $("#password").val();
   if (email == '') valid = field_error('email','Email is required!');
   else  if(!email.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,5})+$/)) valid = field_error("email","Enter a valid Email Address!");
   if (password == '') valid = field_error('password','Password is required!');
   else if (!password.match(/^[a-zA-Z0-9]+$/)) valid = field_error('password','Only alphabets and spaces are allowed!');
   else if (password.length <= 6) valid = field_error('password','Minimum 6 characters reqiured!');
   return valid;
}
function Validate(idName,type){
   var id = $("#"+idName).val();
   if(type == 'email'){
      if (id == '') valid = field_error('email','Email is required!');
      else  if(!id.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,5})+$/)) valid = field_error("email","Enter a valid Email Address!");
   } else if(type == 'password'){
      if (!id.match(/^[a-zA-Z0-9]+$/)) valid = field_error(idName, "Only alphabets and numbers are allowed!");
      else if (id.length <= 6) valid = field_error(idName,'Minimum 6 characters reqiured!');
   }
}
$(document).ready(function(){
   // Code for indivadual Register fields STARTS
   $('#email').on('blur',function(){($(this).val() == "")?field_clear("email"):Validate('email','email')});
   $('#password').on('blur',function(){($(this).val() == "")?field_clear("password"):Validate('password','password')});
   //Code for Register Form Submit STARTS
   // $('#loginForm').on('submit', function(e){ if(!validateForm()) e.preventDefault(); });
   $('#loginForm').on('submit', _beforeSubmit = function(e){ if(!validateForm()) { e.preventDefault(); return false; } else { return true; } });
});
</script>
@endsection
