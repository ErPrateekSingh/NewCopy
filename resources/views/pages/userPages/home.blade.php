@extends('layouts.app')

@section('title', 'Home | '. Auth::user()->fname .' '. Auth::user()->lname .' (@'.$userComposer->username.')')

@section('styles')
<style>
   .col-2-2-main {
      width: calc(100% - 610px);
   }
</style>
@endsection

@section('content')
<div class="container-fluid">
   <div class="row">
      <div class="col-2-2-side m-a-10">
        <div class="col-wall-b-r p-b-15 clearfix">
          <div class="col-2-2-side p-a-10 clearfix">
            <div class="homeUserAvatar">
              <div class="homeUserImage">
                @if($userComposer)
                  <img src="{{ asset('storage/images/uploads/'.date_format($userComposer->created_at, 'Y').'/'.date_format($userComposer->created_at, 'm').'/'.$userComposer->image_path) }}" alt="User Image">
                @else
                  <span class="image_text"></span>
                @endif
              </div>
            </div>
            <div class="u-name-box">
              <div class="clearfix">
                  <a class="u-name-lg text-trim color-dark pull-left" href="{{ route('profilePage', $userComposer->username) }}">
                      <strong>
                          {{ Auth::user()->fname .' '. Auth::user()->lname }}
                      </strong>
                  </a>
                  <span class="u-name-tick pull-left m-l-5" data-toggle="tooltip" data-placement="right" title="Verified Account">
                      <img class="img-responsive" src="{{ asset('images/282944038008211-18X18.png') }}" alt="Verified tick">
                  </span>
              </div>
            </div>
            <div class="u-userName-lg text-center m-b-15"><a class="text-trim" href="{{ route('profilePage', $userComposer->username) }}">{{ '@'.$userComposer->username }}</a></div>
          </div>
          {{-- <div class="u-name-lg text-trim text-center m-t-10">{{ Auth::user()->fname .' '. Auth::user()->lname }}</div>
          @if($userComposer)
            <div class="u-userName-lg text-center m-b-15"><a class="text-trim" href="{{ route('profilePage', $userComposer->username) }}">{{ '@'.$userComposer->username }}</a></div>
          @endif --}}
          <div class="homeSidebarItems">
            <ul class="no-list-style">
              <li class="divider"></li>
              <li><a href="#" data-ripple="rgba(0,0,0,0.5)"><i class="fa fa-image m-r-10"></i>Photos</a></li>
              <li><a href="#" data-ripple="rgba(0,0,0,0.5)"><i class="fa fa-star-half-empty m-r-10"></i>Reviews</a></li>
              <li><a href="#" data-ripple="rgba(0,0,0,0.5)"><i class="fa fa-comments-o m-r-10"></i>Queries</a></li>
              <li><a href="#" data-ripple="rgba(0,0,0,0.5)"><i class="fa fa-bookmark-o m-r-10"></i>Bookmarks</a></li>
              <li><a href="#" data-ripple="rgba(0,0,0,0.5)"><i class="fa fa-heart-o m-r-10"></i>Favourites</a></li>
              <li class="divider"></li>
              <li><a href="#" data-ripple="rgba(0,0,0,0.5)"><i class="fa fa-commenting-o m-r-10"></i>Feedback</a></li>
            </ul>
          </div>
        </div>
      </div>

      <div class="col-2-2-main">
          <div class="col-wall p-a-15 m-t-10 m-b-10">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            You are logged in!
          </div>
      </div>

      <div class="col-2-side m-a-10">
          <!-- Partial for miniFooter -->
          @include('pages.userPages.partials.pageRightSideBar')
          <!-- Partial for miniFooter -->
          @include('pages.userPages.partials.pageFooter')
      </div>

   </div>
</div>
@endsection

@section('scripts')
<script>

</script>
@endsection
