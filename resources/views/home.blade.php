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
            <img src="http://localhost:8000/storage/images/uploads/2018/1520493462.jpg" alt="User Image">
         </div>
         <a class="homeUserFullName text-trim" href="http://localhost:8000/RamJiSingh/" title="Ram Ji Singh">Ram Ji Singh</a>
         <a class="homeUserName text-trim" href="http://localhost:8000/RamJiSingh/" data-container="body" data-toggle="tooltip" data-placement="bottom" title="People can search for @RamJiSingh to find your Page easily. You can change your @username in the Page Info section.">@RamJiSingh</a>
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
