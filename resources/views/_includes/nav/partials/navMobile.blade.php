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
    <div class="m-header">
        <!-- Will configure on front developement time -->
        <div data-ripple="rgba(0,0,0,0.5)" class="m-city" data-toggle="modal" data-target=".cityModal">
            <span class="m-city-name">
                <i class="fa fa-map-marker m-r-5"></i>{{ $cityComposer->city_name }}
            </span>
        </div>
        @if(Auth::guest())
        <button data-ripple="rgba(0,0,0,0.5)" class="m-button-round m-icon flatButton" data-toggle="modal" data-target="#searchModal">
            <i class="fa fa-search"></i>
        </button>
        @else
        @if($userComposer)
        <button class="m-button-round m-user-image flatButton" data-toggle="modal" data-target="#" style="background-image: url({{ asset('storage/images/uploads/'.date_format($userComposer->created_at, 'Y').'/avatar/'.$userComposer->image_path) }});">
            <!-- on click event wiil b added later -->
        </button>
        @else
        <button class="image_text m-button-round m-navbar-user-image-text flatButton" data-toggle="modal" data-target="#"></button><!-- on click event wiil b added later -->
        @endif
        <button data-ripple="rgba(0,0,0,0.5)" class="m-button-round m-icon flatButton" data-toggle="modal" data-target="#">
            <!-- Data target wiil b added later -->
            <i class="fa fa-bell-o"></i>
            <div class="notify-badge">20</div>
        </button>
        <button data-ripple="rgba(0,0,0,0.5)" class="m-button-round m-icon flatButton" data-toggle="modal" data-target="#searchModal">
            <i class="fa fa-search"></i>
        </button>
        @endif
    </div>
</div>
