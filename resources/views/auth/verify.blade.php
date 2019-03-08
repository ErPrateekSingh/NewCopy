@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="verifyWrapper col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
            <h1>Welcome to {{ $siteName }}</h1>
            <div class="panel panel-form clearfix">
                <span>
                    <i class="fa fa-envelope-o"></i>
                </span>
                <h3>Verify Your Email Address</h3>
                @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    <p>A New verification link has been sent to your email address.</p>
                </div>
                @endif
                <p>We've just sent an Email to <strong>{{ Auth::user()->email }}</strong></p>
                <p>Check your Inbox and Click the link in that email.</p>
                <div class="divider" style="margin: 30px;"></div>
                <p>Didn't get the Email? <a href="{{ route('verification.resend') }}">Resend it Now</a></p>
            </div>
        </div>
    </div>
</div>
@endsection
