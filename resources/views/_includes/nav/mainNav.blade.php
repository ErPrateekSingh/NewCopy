<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
   <div class="container-fluid">
      <div class="navbar-header">
         <button data-ripple="rgba(0,0,0,0.5)" type="button" class="navbar-toggle" data-toggle="modal" data-target="#sideNavModal">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
         </button>
         <a class="navbar-brand" href="{{ url('/') }}">
            <!-- {-{ config('app.name', 'FinalCopy') }-} < Use Later <img alt="Brand" src="...">  -->
            {{ $siteName }}
         </a>
         <div class="m-header"> <!-- Will configure on front developement time -->
            <div data-ripple="rgba(0,0,0,0.5)" class="m-city" data-toggle="modal" data-target=".cityModal">
               <span class="m-city-name">
                  <i class="fa fa-map-marker m-r-5"></i>{{ $cityName->city_name }}
               </span>
            </div>
            @if(Auth::guest())
               <button data-ripple="rgba(0,0,0,0.5)" class="m-button-round m-icon flatButton" data-toggle="modal" data-target="#searchModal">
                  <i class="fa fa-search"></i>
               </button>
            @else
               @if(Auth::user()->image_id != null)
                  <button class="m-button-round m-user-image flatButton" data-toggle="modal" data-target="#"
                    style="background-image: url({{ asset('storage/images/uploads/'.date_format($userImage[0]->created_at, 'Y').'/avatar/'.$userImage[0]->image_path) }});"><!-- on click event wiil b added later -->
                  </button>
               @else
                  <button class="image_text m-button-round m-navbar-user-image-text flatButton" data-toggle="modal" data-target="#"></button><!-- on click event wiil b added later -->
               @endif
               <button data-ripple="rgba(0,0,0,0.5)" class="m-button-round m-icon flatButton" data-toggle="modal" data-target="#"><!-- Data target wiil b added later -->
                  <i class="fa fa-bell-o"></i>
                  <div class="notify-badge">20</div>
               </button>
               <button data-ripple="rgba(0,0,0,0.5)" class="m-button-round m-icon flatButton" data-toggle="modal" data-target="#searchModal">
                  <i class="fa fa-search"></i>
               </button>
            @endif
         </div>
      </div>
      <!-- <div class="navbar-collapse collapse navbar-responsive-collapse navbar-right" id="navCollapse"> -->
      <div class="navbar-collapse collapse navbar-right" id="navCollapse">
         <form class="navbar-form navbar-left" role="search">
            <div data-ripple="rgba(0,0,0,0.5)" class="header-city-name" data-toggle="modal" data-target=".cityModal" title="Click to Change Your City">
               <i class="fa fa-map-marker m-r-5"></i>{{ $cityName->city_name }}
            </div>
            <div class="form-group">
               <input type="text" class="form-control" placeholder="Search">
            </div>
            <button data-ripple type="submit" class="headerSubmit flatButton btn-red"><i class="fa fa-search"></i></button>
         </form>
         <ul class="nav navbar-nav">
            <li><a  data-ripple="rgba(0,0,0,0.5)" href="#" class="" title="Add Free Listing"><i class="fa fa-plus-circle m-r-5"></i>Add Free Listing</a></li> <!--Add {  -{ route('register.profile.category') }-}-->
            @guest()
               <li><a data-ripple="rgba(0,0,0,0.5)" href="{{ route('login') }}"><i class="fa fa-sign-in m-r-5"></i>Login</a></li>
               @if (Route::has('register'))
               <li><a data-ripple="rgba(0,0,0,0.5)" href="{{ route('register') }}"><i class="fa fa-user-plus m-r-5"></i>Sign Up</a></li>
               @endif
            @else
               <li class="dropdown dd-notification">
                  <a href="#" class="btn dropdown-toggle bell" type="button" data-toggle="dropdown" aria-expanded="false" title="20 Notifications">
                     <i class="fa fa-bell-o m-r-5"></i>
                     <span>Notifications</span>
                     <div class="notify-badge">20</div>
                  </a>
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
               <li class="dropdown dd-user m-l-10">
                  <button class="btn dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false" title="{{ Auth::user()->fname .' '. Auth::user()->lname }}@if(Auth::user()->status_id>1)&#013;({{ '@'.$userImage[0]->username }})@endif">
                     @if(Auth::user()->image_id != null)
                        <span class="navbar-user-image" style="background-image: url({{ asset('storage/images/uploads/'.date_format($userImage[0]->created_at, 'Y').'/avatar/'.$userImage[0]->image_path) }});"></span>
                     @else
                        <span class="image_text navbar-user-image-text"></span>
                     @endif
                     <span id="userName" class="navbar-user-name text-trim">{{ Auth::user()->fname }}</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                     <div class="dd-menu-body">
                        <div align="center" class="dd-menu-image">
                           @if(Auth::user()->image_id != null)
                              <img src="{{ asset('storage/images/uploads/'.date_format($userImage[0]->created_at, 'Y').'/'.$userImage[0]->image_path) }}" alt="User Image">
                           @else
                              <span class="image_text"></span>
                           @endif
                        </div>
                        <div class="dd-menu-name text-trim m-t-5">{{ Auth::user()->fname .' '. Auth::user()->lname }}</div>
                        @if(Auth::user()->status_id>1)
                        <div class="dd-menu-username text-trim m-b-5">({{ '@'.$userImage[0]->username }})</div>
                        <!-- <div class="dd-menu-city text-trim">Allahabad, Uttar Pradesh, India</div> -->
                        @endif
                     </div>
                     <div class="dd-menu-footer clearfix">
                        <button data-ripple class="btn btn-red pull-left" href="#">Profile</button><!--Profile page to be added-->
                        <button data-ripple="rgba(0,0,0,0.5)" class="btn btn-default pull-right">
                           <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                             Logout
                           </a>
                           <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                           </form>
                        </button>
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
<div id="feedback-button"><a href="#"><i class="fa fa-commenting-o m-r-5"></i>Feedback</a></div>
