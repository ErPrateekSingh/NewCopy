<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        @if ($agent->isMobile())
          @include('_includes.nav.partials.navMobile')
        @endif

        @if ($agent->isDesktop())
          @include('_includes.nav.partials.navDesktop')
        @endif
    </div>
</nav>
@if (!(Request::is('register/user/details') || Request::is('register/user/image') || Request::is('home')))
<div id="feedback-button"><a href="#"><i class="fa fa-commenting-o m-r-5"></i>Feedback</a></div>
@endif
