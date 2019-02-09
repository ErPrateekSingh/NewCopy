@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="profileCanopy">
            <div class="profileCanopyBody">
                <div class="profileCanopyHeader">
                    <div class="profileCanopyHeaderBg">
                        <img alt="" class="hidden" style="transform: none;">
                        {{-- <img alt="" src="https://pbs.twimg.com/profile_banners/1083029497/1441112980/1500x500" style="transform: translate3d(0px, 27.0117px, 0px);"> --}}
                    </div>
                    <div class="mainWrapper">
                        <div class="profileUserAvatar">
                            <div class="profileUserImage">
                                @if($userComposer)
                                <img src="{{ asset('storage/images/uploads/'.date_format($userComposer->created_at, 'Y').'/'.$userComposer->image_path) }}" alt="User Image">
                                @else
                                <span class="image_text"></span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="profileNavbar">
                <div class="mainWrapper" style="padding-left: 240px;">
                    <div class="profileNavbarList">
                        <ul>
                            {{-- <li><a class="active" data-ripple="rgba(0,0,0,0.5)" href="{{ route('profilePage', $userComposer->username) }}/reviews"> --}}
                            <li><a data-ripple="rgba(0,0,0,0.5)" href="{{ route('profilePage', $userComposer->username) }}/reviews">
                                    <span class="profileNavLabel">Reviews</span>
                                    <span class="profileNavValue">125</span>
                                </a></li>
                            <li><a data-ripple="rgba(0,0,0,0.5)" href="{{ route('profilePage', $userComposer->username) }}/photos">
                                    <span class="profileNavLabel">Photos</span>
                                    <span class="profileNavValue">45</span>
                                </a></li>
                            <li><a data-ripple="rgba(0,0,0,0.5)" href="{{ route('profilePage', $userComposer->username) }}/followers">
                                    <span class="profileNavLabel">Followers</span>
                                    <span class="profileNavValue">12K</span>
                                </a></li>
                            <li><a data-ripple="rgba(0,0,0,0.5)" href="{{ route('profilePage', $userComposer->username) }}/folllowing">
                                    <span class="profileNavLabel">Following</span>
                                    <span class="profileNavValue">13M</span>
                                </a></li>
                            <li class="pull-right">
                                <button data-ripple class="navFollowButton flatButton btn-red text-trim" type="button" name="navFollowButton">Follow {{ '@'.$userComposer->username }}</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="mainWrapper" style="margin-top: 40px;">
            <div class="profileAreaLeft">
              <div class="profileBioWrapper m-b-10">
                <div class="profileName text-trim">{{ Auth::user()->fname .' '. Auth::user()->lname }}</div>
                <div class="profileUserName text-trim m-b-10"><a href="{{ route('profilePage', $userComposer->username) }}">{{ '@'.$userComposer->username }}</a></div>
                <div class="profileUserWebsite"><i class="fa fa-globe m-r-10"></i><span class="text-trim"><a href="https://www.narendramodi.in">narendramodi.in</a></span></div>
                <div class="profileUserLocation"><i class="fa fa-map-marker m-r-10"></i><span class="text-trim">New Delhi, India</span></div>
                <div class="profileUserJoined"><i class="fa fa-calendar m-r-10"></i><span class="text-trim">Joined August 2015</span></div>
                <div class="profileUserDob"><i class="fa fa-birthday-cake m-r-10"></i><span class="text-trim">June 25, 1991</span></div>
              </div>
              <div class="profilePhotoWrapper m-t-10 m-b-10">
                <div class="profilePhotoHeader"><i class="fa fa-image m-r-10"></i><a href="{{ route('profilePage', $userComposer->username) }}/photos">Photos</a></div>
                <div class="profilePhotoContainer clearfix">
                  <ul>
                    @for ($i = 0; $i < 9; $i++)
                      <li class="profilePhotoBlock">
                        <a href="http://localhost:8000/storage/images/uploads/2019/demo/3.jpg"><img src="http://localhost:8000/storage/images/uploads/2019/demo/3.jpg" alt="image"></a>
                      </li>
                    @endfor
                  </ul>
                </div>
              </div>
              <div class="profileFollowerWrapper m-t-10 m-b-10">
                <div class="profileFollowerHeader"><i class="fa fa-users m-r-10"></i><a href="{{ route('profilePage', $userComposer->username) }}/followers">Followers</a></div>
                <div class="profileFollowerContainer clearfix">
                  <ul>
                    @for ($i = 0; $i < 15; $i++)
                      <li class="profileFollowerBlock" data-toggle="tooltip" data-placement="top" title="{{ $userComposer->username }}">
                        <a href="http://localhost:8000/storage/images/uploads/2019/demo/3.jpg"><img src="{{ asset('storage/images/uploads/'.date_format($userComposer->created_at, 'Y').'/'.$userComposer->image_path) }}" alt="image"></a>
                      </li>
                    @endfor
                  </ul>
                </div>
              </div>
            </div>
            <div class="profileAreaCenter">
                <div class="profileReviewHeader">Reviews</div>
                @for ($i = 0; $i < 3; $i++) <div class="profileReviewWrapper clearfix">
                    <img src="http://localhost:8000/storage/images/uploads/2019/demo/3.jpg" alt="Business category type alt here">
                    <div class="profileReviewDetails">
                        <a class="profileReviewBizName text-trim" href="#">Sagar Ratna Restaurant</a>
                        <a class="profileReviewTags" href="#">Chicken Wings</a>, <a class="profileReviewTags" href="#">Barbeque</a>, <a class="profileReviewTags" href="#">Salad</a>
                        <div class="profileReviewStars">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <span>12541, Panna Lal Road,</span>
                        <span>Civil Lines, Allahabad, U.P.</span>
                    </div>
                    <span>
                        <i class="fa fa-clock-o m-r-5"></i> Yesterday, 12:10 A.M.
                    </span>
                    <div class="profileReviewBody">
                        <p lang="en">
                            It is a long established fact that a reader content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as
                            opposed like readable English.<br>
                            Many desktop publishing packages and web page editors now use Lorem Ipsum as their default will uncover many web sites still in their infancy...<a class="m-l-10" href="#">Read More</a>
                        </p>
                        <div class="profileReviewTools">
                            <span data-ripple="rgba(0,0,0,0.5)" class="m-r-5" id="upvoteReview" title="Upvote this Review"><i class="fa fa-angle-up m-r-5"></i>Upvote (25)</span>
                            <span data-ripple="rgba(0,0,0,0.5)" id="downvoteReview" title="Downvote this Review"><i class="fa fa-angle-down m-r-5"></i>Downvote (2)</span>
                        </div>
                    </div>
                </div>
                @endfor
                {{-- <a href="http://localhost:8000/EmmelyRose/reviews" style="float:right;margin-bottom:7px; margin-right:50px;display:block;">View all Reviews</a> --}}
            </div>
            <div class="profileAreaRight">
                <img class="m-b-10" src="http://localhost:8000/storage/images/uploads/2019/demo/2.png" alt="Business category type alt here">
                <img class="m-t-10" src="http://localhost:8000/storage/images/uploads/2019/demo/1.png" alt="Business category type alt here">
                <hr>
                <div align="center">
                    <a href="#"><i class="fa fa-flag m-r-5"></i>Report this Profile</a>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <div class="mainWrapper">
         <div class="profileUpperWrapper clearfix">
            <div class="profileNameWrapper">
               <div class="profileName">{{ Auth::user()->fname .' '. Auth::user()->lname }}
</div>
<a href="{{ route('profilePage', $userComposer->username) }}">{{ '@'.$userComposer->username }}</a>
<button data-ripple class="followButton flatButton btn-red" type="button" name="followButton">Follow {{ '@'.$userComposer->username }}</button>
</div>
<div class="profileDetailsWrapper">
    <div class="profileStat clearfix">
        <span class="profileStatItem">42 <p>Reviews</p></span>
        <span class="profileStatItem">25 <p>Photos</p></span>
        <span class="profileStatItem">351 <p>Followers</p></span>
    </div>
    <ul>
        <li><i class="fa fa-map-marker" style="margin-right: 20px;"></i>Allahabad, Uttar Pradesh, India</li>
        <li><i class="fa fa-calendar" style="margin-right: 15px;"></i><span title="2018-03-08">Member for 1 year, 1 month</span></li>
    </ul>
</div>
</div>
</div>
<div class="mainWrapper">
    <div class="mainContentLeft ">



    <div style="padding-left:15px;font-weight:400;font-size:22px;line-height:1.1;padding-top:20px;border-top:1px solid #aaa;clear:both;margin-left:20px;margin-right:20px;">Followers</div>
    <div class="divider"></div>
    <div class="profileFollowerWrapper clearfix">
        @for ($i = 0; $i < 10; $i++) <div class="profileFollowerBody">
            <img src="http://localhost:8000/storage/images/uploads/2018/ls.jpg" alt="Follower Image related alt text">
            <div class="profileFollowerDetails">
                <a class="profileFollowerName" href="http://localhost:8000/JohnKurtis">John Kurtis</a>
                <a class="profileFollowerUsername" href="http://localhost:8000/JohnKurtis">
                    @JohnKurtis</a>
                    <span>New Delhi, India</span>
            </div>
            <button data-ripple class="btn-red flatButton profileFollowerButton" type="button" name="profileFollowerButton">Follow</button>
    </div>
    @endfor
</div>
<div class="divider clear"></div>
<a href="http://localhost:8000/EmmelyRose/followers" style="float:right;margin-bottom:7px; margin-right:50px;display:block;">View all Followers</a>
<div class="divider clear"></div>

</div>
<div class="profileRightArea">
    @for ($i = 0; $i < 3; $i++) <div class="trialBox">AD HERE</div>
@endfor
<hr>
<div align="center">
    <a href="#"><i class="fa fa-flag m-r-5"></i>Report this Profile</a>
</div>
</div>
</div>
</div>
</div> --}}
@endsection

@section('scripts')
<script>

</script>
@endsection
