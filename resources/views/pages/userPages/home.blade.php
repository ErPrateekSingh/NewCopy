@extends('layouts.app')

@section('styles')
<style>
   .tooltip-inner {
      margin-left: 30px;
   }
</style>
@endsection

@section('content')
<div class="container-fluid">
   <div class="row">
      <div class="col-2-2-side">
        <div class="col-wall-b-r clearfix">
          <div class="homeUserAvatar">
            <div class="homeUserImage">
              @if($userComposer)
                <img src="{{ asset('storage/images/uploads/'.date_format($userComposer->created_at, 'Y').'/'.date_format($userComposer->created_at, 'm').'/'.$userComposer->image_path) }}" alt="User Image">
              @else
                <span class="image_text"></span>
              @endif
            </div>
          </div>
          <div class="u-name-lg text-trim text-center m-t-10">{{ Auth::user()->fname .' '. Auth::user()->lname }}</div>
          @if($userComposer)
            <div class="u-userName-lg text-center m-b-15"><a class="text-trim" href="{{ route('profilePage', $userComposer->username) }}">{{ '@'.$userComposer->username }}</a></div>
          @endif
          <div class="homeSidebarItems">
            <ul class="no-list-style">
              <li><a href="#" data-ripple="rgba(0,0,0,0.5)">Photos</a></li>
              <li><a href="#" data-ripple="rgba(0,0,0,0.5)">Bookmarks</a></li>
              <li><a href="#" data-ripple="rgba(0,0,0,0.5)">Reviews</a></li>
              <li><a href="#" data-ripple="rgba(0,0,0,0.5)">Favourites</a></li>
              <li><a href="#" data-ripple="rgba(0,0,0,0.5)">Queries</a></li>
              <li class="divider"></li>
              <li><a href="#" data-ripple="rgba(0,0,0,0.5)">Feedback</a></li>
            </ul>
          </div>
        </div>
      </div>

      <div id="homeCenter" class="clearfix">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        You are logged in!
      </div>

      <div class="col-2-side">
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
