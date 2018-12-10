@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row">
      <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
         <div class="panel panel-form clearfix">
            <div class="panel-circle">
               <i class="fa fa-sign-in" style="margin-left: 5px;"></i>
               <span>Reset Password</span>
            </div>
            <div class="panel-body">
               <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
                  @csrf
                  <input type="hidden" name="token" value="{{ $token }}">
                  <div class="col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
                     <div class="form-group form-group-mat{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input id="email" type="text" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>
                        <label for="email" class="control-label"><i class="fa fa-envelope m-r-5"></i> E-Mail Address</label><i class="bar"></i>
                        <div id="error_email" class=""></div>
                        @if ($errors->has('email'))
                           <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                        @endif
                     </div>
                  </div>
               </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
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
