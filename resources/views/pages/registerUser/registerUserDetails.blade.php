@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<style>
   .tabHeader{font-size: 24px;}
   .tabWrapper {width: 100%;}
   .tabButton{float: right;border: none;color: #ffffff;font-size: 18px;margin-top: 60px;padding: 8px 40px;margin-bottom: 20px;background-color: #4CAF50;}
   .tabButton:hover {opacity: 0.8;}
   .form-group-mat {margin-top: 60px;}
   select:required:invalid {color: gray;}
   option[value=""][disabled] {display: none;}
   option {color: black;}
</style>
@endsection

@section('content')
<div class="container">
   <div class="row">
      <div class="col-md-10 col-md-offset-1 col-xs-12">
         <div class="panel panel-form clearfix" style="margin-top: 50px;border-color: #ccc;">
            <div class="panel-body">
               <div class="col-xs-10 col-xs-offset-1">
                  <form id="registerUserDetails" class="form-horizontal clearfix" method="POST" action="{{ route('register.user.details') }}" role="form" novalidate>
                     {{ csrf_field() }}
                     <div class="tabHeader">User Details :</div>
                     <div class="tabWrapper clearfix">
                        <div class="col-xs-12">
                           <div class="form-group form-group-mat{{ $errors->has('username') ? ' has-error' : '' }}">
                              <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autocomplete="off" spellcheck="false">
                              <label for="username" class="control-label"><i class="fa fa-user m-r-5"></i> Username</label><i class="bar"></i>
                              <div id="error_username" class=""></div>
                              @if ($errors->has('username'))
                              <span class="help-block"> {{ $errors->first('username') }} </span>
                              @endif
                           </div>
                        </div>
                        <div class="col-xs-12">
                           <div class="row">
                              <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 fname-xs">
                                 <div class="form-group form-group-mat{{ $errors->has('dob') ? ' has-error' : '' }}">
                                    <input id="dob" type="text" class="form-control" name="dob" value="{{ old('dob') }}" required autocomplete="off" spellcheck="false">
                                    <label for="dob" class="control-label"><i class="fa fa-calendar m-r-5"></i> Date of Birth</label><i class="bar"></i>
                                    <div id="error_dob" class=""></div>
                                    @if ($errors->has('dob'))
                                    <span class="help-block"> {{ $errors->first('dob') }} </span>
                                    @endif
                                 </div>
                              </div>
                              <div class="col-lg-5 col-lg-offset-2 col-md-5 col-md-offset-2 col-sm-5 col-sm-offset-2 col-xs-5 col-xs-offset-2 lname-xs">
                              <div class="form-group form-group-mat{{ $errors->has('gender') ? ' has-error' : '' }}">
                                 <select class="form-control" id="gender" name="gender">
                                    <option value="" disabled selected>Select Gender</option>
                                    <option value="f" @if(old('gender') == 'f')selected="selected"@endif>Female</option>
                                    <option value="m" @if(old('gender') == 'm')selected="selected"@endif>Male</option>
                                 </select>
                                 <label for="gender" class="control-label"><i class="fa fa-road m-r-5"></i> Gender</label><i class="bar"></i>
                                 <div id="error_gender" class=""></div>
                                 @if ($errors->has('gender'))
                                 <span class="help-block"> {{ $errors->first('gender') }} </span>
                                 @endif
                              </div>
                           </div>
                           </div>
                        </div>
                        <div class="col-xs-12">
                           <div class="row">
                              <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 fname-xs">
                                 <div class="form-group form-group-mat{{ $errors->has('state') ? ' has-error' : '' }}">
                                    <select class="form-control" id="state" name="state">
                                       <option value="" disabled selected>Select State</option>
                                       @foreach($states as $states)
                                          <option value="{{ $states->state_id }}" {{ (collect(old('state'))->contains($states->state_id)) ? 'selected':'' }}>{{ $states->state_name }}</option>
                                       @endforeach
                                    </select>
                                    <label for="state" class="control-label"><i class="fa fa-map m-r-5"></i> State</label><i class="bar"></i>
                                    <div id="error_state" class=""></div>
                                    @if ($errors->has('state'))
                                    <span class="help-block"> {{ $errors->first('state') }} </span>
                                    @endif
                                 </div>
                              </div>
                              <div class="col-lg-5 col-lg-offset-2 col-md-5 col-md-offset-2 col-sm-5 col-sm-offset-2 col-xs-5 col-xs-offset-2 lname-xs">
                              <div class="form-group form-group-mat{{ $errors->has('city') ? ' has-error' : '' }}">
                                 <select class="form-control" id="city" name="city">
                                    <option value="" disabled selected>Select City</option>
                                    <option disabled>Please select State first !</option>
                                 </select>
                                 <label for="city" class="control-label"><i class="fa fa-map-marker m-r-5"></i> City</label><i class="bar"></i>
                                 <div id="error_city" class=""></div>
                                 @if ($errors->has('city'))
                                 <span class="help-block"> {{ $errors->first('city') }} </span>
                                 @endif
                              </div>
                           </div>
                           </div>
                        </div>
                     </div>
                     <button type="submit" class="tabButton" data-ripple>Next</button>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
   function field_error(id,text){
      $('#error_'+id).attr('class', 'error').text(text);
      $("#glyphcn"+id).remove();
      var div = $("#"+id).closest("div");
      div.removeClass("has-success").addClass("has-error has-feedback").append('<span id="glyphcn'+id+'" class="glyphicon glyphicon-remove form-control-feedback"></span>');
      return false;
   }
   function field_success(id){
      $('#error_'+id).attr('class', '').text('');
      $("#glyphcn"+id).remove();
      var div = $("#"+id).closest("div");
      div.removeClass("has-error").addClass("has-success has-feedback").append('<span id="glyphcn'+id+'" class="glyphicon glyphicon-ok form-control-feedback"></span>');
   }
   function field_wait(id){
      $('#error_'+id).attr('class', '').text('');
      $("#glyphcn"+id).remove();
      var div = $("#"+id).closest("div");
      div.removeClass("has-error has-success has-feedback").append('<span id="glyphcn'+id+'" style="font-size: 16px;color: #f4545f;width: 16px;position: absolute;height: 16px;top: 16px;right: 10px;z-index: 2;text-align: center;pointer-events: none;" class="fa fa-refresh fa-spin"></span>');
   }
   function hasError(id,text) {
      $("#"+id).closest("div").addClass('has-error');
      if(text==null) $("#error_"+id).addClass('error').text('This field is Required!');
      else $("#error_"+id).addClass('error').text(text);
      return false;
   }
   function hasSuccess(id) {
      $("#"+id).closest("div").removeClass('has-error');
      $("#error_"+id).removeClass('error').text('');
   }
   function ajaxGetCity() {
      var state = 'state_id='+$('#state').val();
      $("#city").append('<option value="" disabled selected>Please Wait...</option>');
      $.ajax({
         type:'GET',
         url: "/get/city",
         data: state,
         success: function(data){
            if(data){
               $("#city").empty();
               $("#city").append('<option value="" disabled selected>Select City</option>');
               $.each(data,function(value){
                  $("#city").append('<option value="'+data[value].city_id+'">'+data[value].city_name+'</option>');
               });
            }else{
               $("#city").empty();
            }
         }
      });
   }
   function ajaxUsernameUnique(username) {
      var valid = true;
      var currentXhr;
      field_wait("username");
      var api_token = '{{Auth::user()->api_token}}';
      var link = 'api_token='+ encodeURIComponent(api_token) + '&username='+ encodeURIComponent(username);
         if (!usernameValid) currentXhr.abort();
         currentXhr && currentXhr.readyState != 4 && currentXhr.abort(); // clear previous request
         var currentXhr = $.ajax({
            type:'get',
            url: "/api/username/unique",
            data: link,
            contentType: 'application/json',
            success: function(data) {
               if (usernameValid) {
                  if (data=="true") field_success("username");
                  else valid = field_error("username","Username aready Exists!");
               }
            }
         });
      return valid;
   }
   function usernameValidate() {
      var valid = true;
      var username = $('#username').val();
      if (username == '') valid = field_error("username","Username is required!");
      else if (!username.match(/^[a-zA-Z0-9_]+$/)) valid = field_error("username","Only Alphabets and Numbers are allowed!");
      else if (username.length < 6) valid = field_error("username","Minimum 6 characters reqiured!");
      else if (username.length >= 20) valid = field_error("username","Maximum 20 characters allowed!");
      else if ($("#error_username").text() === "Username aready Exists!") valid = false;
      return valid;
   }
   function validateForm() {
      var valid = true;
      valid = usernameValidate();
      var dob = $("#dob").val();
      if (dob == '' || dob.indexOf(' ') >= 0) { $("#dob").val(""); valid = hasError('dob','Date of Birth is required!');}
      else {if (dob.length !== 10) valid = hasError('dob','Invalid Date format!'); else hasSuccess('dob');}
      if ($("#gender").val() == '' || $("#gender").val() == null) valid = hasError('gender','Gender is required!'); else hasSuccess('gender');
      if ($("#state").val() == '' || $("#state").val() == null) valid = hasError('state','State is required!'); else hasSuccess('state');
      if ($("#city").val() == '' || $("#city").val() == null) valid = hasError('city','City is required!'); else hasSuccess('city');
      return valid;
   }
   $(document).ready(function(){

      var delay = (function(){
         var timer = 0;
         return function(callback, ms){
            clearTimeout (timer);
            timer = setTimeout(callback, ms);
         };
      })();

      $('#username').on('keyup',function(){
         usernameValid = true;
         var username = $('#username').val();
         if(!username.match(/^[a-zA-Z0-9]+$/)) {field_error("username","Only Alphabets and Numbers are allowed!");usernameValid=false;}
         else if (username.length >= 6) {
            if (username.length >= 20) {field_error("username","Maximum 20 characters allowed!");usernameValid=false;}
            else {
               delay(function(){
                  ajaxUsernameUnique(username);
               }, 500 );
            }
         } else {
            $('#error_username').attr('class', '').text('');
            $("#glyphcnusername").remove();
            $("#username").closest("div").removeClass("has-error has-success has-feedback");
         }
      });
      $("#dob").datepicker({ changeYear: true, changeMonth: true, dateFormat: "yy-mm-dd", yearRange: "c-85:c-0" }).click(function(){if($("#dob").val()=='')$("#dob").val(" ");});
      $('#state').change(function(){ajaxGetCity();});
      $('#registerUserDetails').on('submit', function(e){ if(!validateForm()) e.preventDefault(); });
   });
</script>
@endsection
