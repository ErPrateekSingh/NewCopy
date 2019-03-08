{{-- @if (!(Request::is('register') || Request::is('login') || Request::is('register/user/details')|| Request::is('register/user/image'))) --}}
{{-- @if (Route::is('profilePage')) --}}
{{-- <title>{{ Auth::user()->fname .' '. Auth::user()->lname .' (@'.$userComposer->username.') | '. $siteName }}</title> --}}
{{-- @else --}}
<title>{{ $siteName }}</title>
{{-- @endif --}}
