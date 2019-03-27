<div class="navbar-header">
    <a class="navbar-brand" href="{{ url('/') }}">
        <!-- {-{ config('app.name', 'FinalCopy') }-} < Use Later <img alt="Brand" src="...">  -->
        {{ $siteName }}
    </a>

</div>
<!-- <div class="navbar-collapse collapse navbar-responsive-collapse navbar-right" id="navCollapse"> -->
<div class="navbar-collapse collapse navbar-right" id="navCollapse">
    {{-- @if (Route::current()->getName() != 'register') --}}
    {{-- @if ((Route::currentRouteName() != 'register') || (Route::currentRouteName() != 'login')) --}}
    @if (!(Request::is('register') || Request::is('login') || Request::is('register/user/details') || Request::is('register/user/image') || Request::is('email/verify') || Request::is('register/page') || Request::is('register/page/category')))
    <form class="navbar-form navbar-left" role="search">
        <div data-ripple="rgba(0,0,0,0.5)" class="header-city-name" data-toggle="modal" data-target=".cityModal" title="Click to Change Your City">
            <i class="fa fa-map-marker m-r-5"></i>{{ $cityComposer->city_name }}
        </div>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
        </div>
        <button data-ripple type="submit" class="headerSubmit flatButton btn-red"><i class="fa fa-search"></i></button>
    </form>
    @endif
    <ul class="nav navbar-nav">
        @if (!(Request::is('register') || Request::is('login') || Request::is('register/user/details')|| Request::is('register/user/image') || Request::is('email/verify') || Request::is('register/page') || Request::is('register/page/category')))
        <li class="m-r-15"><a data-ripple="rgba(0,0,0,0.5)" href="{{ route('register.page.index') }}" class="" title="Add Free Listing"><i class="fa fa-plus-circle m-r-5"></i>Add Free Listing</a></li>
        @endif

        @guest()
          @if(Request::is('login'))
          <li class="active m-r-5"><a data-ripple="rgba(0,0,0,0.5)" style="cursor: pointer;">
          @else
          <li class="m-r-5"><a data-ripple="rgba(0,0,0,0.5)" href="{{ route('login') }}">
          @endif
            <i class="fa fa-sign-in m-r-5"></i>Login</a></li>

          @if(Request::is('register'))
          <li class="active m-r-5"><a data-ripple="rgba(0,0,0,0.5)" style="cursor: pointer;">
          @else
          <li class="m-r-5"><a data-ripple="rgba(0,0,0,0.5)" href="{{ route('register') }}">
          @endif
            <i class="fa fa-user-plus m-r-5"></i>Sign Up</a></li>
        @else
          @if (!(Request::is('register/user/details') || Request::is('register/user/image') || Request::is('email/verify')))
            <li class="dropdown navbar-home-btn m-r-5">
                <a href="{{ route('home') }}" class="btn p-l-15 p-r-15 p-t-10 p-b-10 l-h-1" title="Home">
                    <i class="fa fa-home"></i>
                </a>
            </li>
            <li class="dropdown dd-notification navbar-bell-btn m-r-5">
                <button class="btn dropdown-toggle bell p-l-15 p-r-15 l-h-1" type="button" data-toggle="dropdown" aria-expanded="false" title="20 Notifications">
                    <i class="fa fa-bell-o"></i>
                    <div class="notify-badge">20</div>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <div class="dd-menu-header">
                        Notifications
                    </div>
                    <div class="dd-menu-body">
                        <!--Notification Body Goes Here-->
                    </div>
                    <div align="center" class="dd-menu-footer">
                        <a href="#">See All Notifications</a>
                    </div>

                    <div class="dropdown-arrow-1"></div>
                    <div class="dropdown-arrow-2"></div>
                </ul>
            </li>
          @endif
          <li class="dropdown dd-user m-r-5">
              <button class="btn dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false" title="{{ Auth::user()->fname .' '. Auth::user()->lname }}@if($userComposer)&#013;({{ '@'.$userComposer->username }})@endif">
                  @if($userComposer)
                  <span class="navbar-user-image" style="background-image: url({{ asset('storage/images/uploads/'.date_format($userComposer->created_at, 'Y').'/'.date_format($userComposer->created_at, 'm').'/avatar/'.$userComposer->image_path) }});"></span>
                  @else
                  <span class="image_text navbar-user-image-text"></span>
                  @endif
              </button>
              <ul class="dropdown-menu" role="menu">
                  <div class="dd-menu-body">
                      <div align="center" class="dd-menu-image">
                          @if($userComposer)
                          <img src="{{ asset('storage/images/uploads/'.date_format($userComposer->created_at, 'Y').'/'.date_format($userComposer->created_at, 'm').'/'.$userComposer->image_path) }}" alt="User Image">
                          @else
                          <span class="image_text"></span>
                          @endif
                      </div>
                      <div id="userFirstName" class="dd-menu-name text-trim m-t-5">{{ Auth::user()->fname .' '. Auth::user()->lname }}</div>
                      @if($userComposer)
                      <div class="dd-menu-username text-trim m-b-5">({{ '@'.$userComposer->username }})</div>
                      @endif
                  </div>
                  <div class="dd-menu-footer clearfix">
                      @if($userComposer)
                      <a data-ripple class="btn btn-red pull-left" href="{{ route('profilePage', $userComposer->username) }}">Profile</a>
                      @endif
                      <a class="btn btn-default pull-right" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                          Logout
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                  </div>
                  <div class="dropdown-arrow-1"></div>
                  <div class="dropdown-arrow-2"></div>
              </ul>
          </li>
        @endguest
    </ul>
</div>
</div>
</nav>
