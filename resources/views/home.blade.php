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
      <div id="homeLeft">
          <div class="homeUserImage">
            @if($userComposer)
              <img src="{{ asset('storage/images/uploads/'.date_format($userComposer->created_at, 'Y').'/'.$userComposer->image_path) }}" alt="User Image">
            @else
              <span class="image_text"></span>
            @endif
          </div>
          <div class="homeUserFullName text-trim">{{ Auth::user()->fname .' '. Auth::user()->lname }}</div>
          @if($userComposer)
            <a class="homeUserName text-trim" href="http://localhost:8000/{{ $userComposer->username }}/">{{ '@'.$userComposer->username }}</a>
          @endif
           <div class="homeSidebarItems">
              <a href="#" data-ripple="rgba(0,0,0,0.5)">Photos</a>
              <a href="#" data-ripple="rgba(0,0,0,0.5)">Bookmarks</a>
              <a href="#" data-ripple="rgba(0,0,0,0.5)">Reviews</a>
              <a href="#" data-ripple="rgba(0,0,0,0.5)">Favourites</a>
              <a href="#" data-ripple="rgba(0,0,0,0.5)">Queries</a>
              <div class="divider"></div>
              <a href="#" data-ripple="rgba(0,0,0,0.5)">Feedback</a>
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

      <div id="homeRight"  class="clearfix">
         <div class="UW">AD HERE</div>
         <div class="UW">AD HERE</div>
         <div class="UW">AD HERE</div>
      </div>

   </div>
</div>
@endsection

@section('scripts')
<script>

</script>
@endsection
