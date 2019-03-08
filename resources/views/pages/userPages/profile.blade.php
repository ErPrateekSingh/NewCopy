@extends('layouts.app')

@section('title')
  <title>{{ $userNameComposer->fname .' '. $userNameComposer->lname .' (@'.$userNameComposer->username.') | '. $siteName }}</title>
@endsection

@section('styles')
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="canopy">

        <!-- Partial for pageHeader -->
        @include('pages.userPages.partials.pageHeader')

        <!-- Partial for pageNav -->
        @include('pages.userPages.partials.pageNav')

      </div>
      <div class="col-1-main" style="margin-top: 40px;">
        <div class="col-2-main m-r-10">
          <div class="col-2-2-side m-r-10">

            <!-- Partial for basicUserInfo -->
            @include('pages.userPages.partials.pageBasicUserInfo')

            <div class="col-wall m-t-10">
              <div class="font-16 m-a-10"><i class="fa fa-image m-r-10"></i><a class="color-555" href="{{ route('profilePage', $userNameComposer->username) }}/photos">Photos</a></div>
              <div class="profilePhotoContainer">
                  <ul class="no-list-style clearfix">
                      @foreach ($images as $images)
                        <li>
                          <a href="{{ asset('storage/images/uploads/'.date_format(new DateTime($images->created_at), 'Y').'/'.date_format(new DateTime($images->created_at), 'm').'/'.$images->image_path) }}">
                            <img src="{{ asset('storage/images/uploads/'.date_format(new DateTime($images->created_at), 'Y').'/'.date_format(new DateTime($images->created_at), 'm').'/'.$images->image_path) }}" alt="image">
                          </a>
                        </li>
                      @endforeach
                  </ul>
              </div>
            </div>

            {{-- <div class="col-wall m-t-10">
              <div class="font-16 m-a-10"><i class="fa fa-users m-r-10"></i><a class="color-555" href="{{ route('profilePage', $userNameComposer->username) }}/followers">Followers</a></div>
              <div class="profileFollowerContainer">
                  <ul class="no-list-style clearfix">
                    @for ($i = 0; $i < 15; $i++)
                      <li data-toggle="tooltip" data-placement="top" title="{{ $userNameComposer->username }}">
                        <a href="{{ route('profilePage', $userNameComposer->username) }}">
                          <img src="{{ asset('storage/images/uploads/2019/03/'.$profile->image_path) }}" alt="image">
                        </a>
                      </li>
                    @endfor
                  </ul>
              </div>
            </div> --}}

          </div>

          <div class="col-2-2-main">
            <div class="col-wall p-a-15">
              <div class="h3 p-l-10 p-b-10 b-b-1 m-t-10 m-b-10">Reviews</div>
              @if ($reviews->isEmpty())
                <div class="text-center m-a-15 p-a-15"><div class="h1 p-a-15 color-ddd no-text-select">0 Reviews</div></div>
              @else
                @foreach ($reviews as $review)
                  <div class="reviewWrapper">
                    <div class="reviewHeader clearfix">
                      <div class="reviewHeaderImage">
                        <img src="http://localhost:8000/storage/images/uploads/2019/demo/3.jpg" alt="Business category type alt here">
                      </div>
                      <div class="reviewDetails">
                        <a class="reviewBizName text-trim" href="#">Sagar Ratna Restaurant</a>
                        {{-- <span>
                          <a class="reviewTags" href="#">Chicken Wings</a>, <a class="reviewTags" href="#">Barbeque</a>, <a class="reviewTags" href="#">Salad</a>
                        </span> --}}
                        <?php
                        $allStar = $review->rating;
                        $fullStar = floor($allStar/2);
                        $halfStar = ($allStar)%2;
                        $emptyStar = 5 - ($fullStar + $halfStar);
                        ?>
                        <div class="reviewStars" title="{{ ($allStar/2).' Star Rating' }}">
                          @for ($i = 1; $i <= $fullStar; $i++) <i class="fa fa-star"></i>@endfor
                          @for ($i = 1; $i <= $halfStar; $i++) <i class="fa fa-star-half-o"></i>@endfor
                          @for ($i = 1; $i <= $emptyStar; $i++) <i class="fa fa-star-o"></i>@endfor
                        </div>
                        {{-- <span>{{ 'Full = '.$fullStar.', Half = '.$halfStar.', Empty = '.$emptyStar }}</span> --}}
                        <span>12541, Panna Lal Road,</span>
                        <span>Civil Lines, Allahabad, U.P.</span>
                      </div>
                      <div class="reviewTime">
                        <span class="text-trim" title="{{ Carbon\Carbon::parse($review->created_at)->format('M d, Y h:i A') }}">
                          <i class="fa fa-clock-o m-r-5"></i> {{ Carbon\Carbon::parse($review->created_at)->diffForHumans() }}
                        </span>
                      </div>
                    </div>
                    <div class="reviewBody">
                      <p lang="en">
                        {{ $review->description }}...<a class="m-l-10" href="#">Read More</a>
                      </p>
                    </div>
                    <div class="reviewFooter clearfix">
                      <div class="reviewTools">
                        <div class="btn btn-default m-l-5 hidden" data-ripple="rgba(0,0,0,0.5)" id="upvoteReview" title="Upvote this Review"><i class="fa fa-thumbs-up m-r-5"></i>Upvote (25)</div>
                        <div class="btn btn-default m-l-5 hidden" data-ripple="rgba(0,0,0,0.5)" id="downvoteReview" title="Downvote this Review"><i class="fa fa-thumbs-down m-r-5"></i>Downvote (2)</div>
                      </div>
                    </div>
                  </div>
                @endforeach
              @endif
              @if ($reviews->isNotEmpty())
                <div class="paginateContainer b-t-1 b-b-1 m-t-15 clearfix p-l-5">
                  <div class="paginatePageCount pull-left">
                    <div class="m-t-10 m-b-10 l-h-1">Page {{ $reviews->currentPage() }} of {{ $reviews->lastPage() }}</div>
                  </div>
                  <div class="paginateLinkBar pull-right">
                    {{ $reviews->links('vendor.pagination.custom-default') }}
                  </div>
                </div>
              @endif
            </div>
          </div>
        </div>

        <div class="col-2-side">
            <!-- Partial for miniFooter -->
            @include('pages.userPages.partials.pageRightSideBar')
            <!-- Partial for miniFooter -->
            @include('pages.userPages.partials.pageFooter')
        </div>
      </div>
    </div>
</div>
@endsection

@section('scripts')
<script>

</script>
@endsection
