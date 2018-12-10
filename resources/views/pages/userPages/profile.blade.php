@extends('layouts.app')

@section('content')
<div class="container-fluid">
   <div class="row">
      <div class="mainWrapper">
         <div class="profileUpperWrapper clearfix">
            <div class="profileUserImage">
               <img src="http://localhost:8000/storage/images/uploads/2018/ls.jpg" alt="User Image">
            </div>
            <div class="profileNameWrapper">
               <div class="profileName">Emmely Rose</div>
               <a href="{{ route('profilePage', 'EmmelyRose') }}">@EmmelyRose</a>
               <button data-ripple class="followButton flatButton btn-red" type="button" name="followButton">Follow @EmmelyRose</button>
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
      <div class="profileNav">
         <div class="mainWrapper" style="padding-left: 40px;">
            <a class="active" data-ripple="rgba(0,0,0,0.5)" href="http://localhost:8000/EmmelyRose">Profile</a>
            <a data-ripple="rgba(0,0,0,0.5)" href="http://localhost:8000/EmmelyRose/reviews">Reviews</a>
            <a data-ripple="rgba(0,0,0,0.5)" href="http://localhost:8000/EmmelyRose/photos">Photos</a>
            <a data-ripple="rgba(0,0,0,0.5)" href="http://localhost:8000/EmmelyRose/bookmarks">Bookmarks</a>
            <a data-ripple="rgba(0,0,0,0.5)" href="http://localhost:8000/EmmelyRose/followers">Followers</a>
            <a data-ripple="rgba(0,0,0,0.5)" href="http://localhost:8000/EmmelyRose/followings">Followings</a>
         </div>
      </div>
      <div class="mainWrapper">
         <div class="mainContentLeft ">
            <div style="padding-left:  30px; font-weight: 400; font-size: 22px; line-height: 1.1; margin-top: 40px;">Reviews</div>
            <div class="divider"></div>
            @for ($i = 0; $i < 2; $i++)
            <div class="profileReviewWrapper clearfix">
               <img src="http://localhost:8000/storage/images/uploads/2018/3.jpg" alt="Business category type alt here">
               <div class="profileReviewDetails">
                  <a class="profileReviewBizName" href="#">Sagar Ratna Restaurant</a>
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
                     It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.<br>
                     Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.
                  </p>
                  <div class="profileReviewTools">
                     <span data-ripple="rgba(0,0,0,0.5)" class="m-r-5" id="upvoteReview" title="Upvote this Review"><i class="fa fa-angle-up m-r-5"></i>Upvote (25)</span>
                     <span data-ripple="rgba(0,0,0,0.5)" id="downvoteReview" title="Downvote this Review"><i class="fa fa-angle-down m-r-5"></i>Downvote (2)</span>
                  </div>
               </div>
            </div>
            <div class="divider"></div>
            @endfor
            <a href="http://localhost:8000/EmmelyRose/reviews" style="float:right;margin-bottom:7px; margin-right:50px;display:block;">View all Reviews</a>
            <div style="padding-left:15px;font-weight:400;font-size:22px;line-height:1.1;padding-top:20px;border-top:1px solid #aaa;clear:both;margin-left:20px;margin-right:20px;">Photos</div>
            <div class="divider"></div>
            <div class="profilePhotoWrapper clearfix">
               <ul>
                  @for ($i = 0; $i < 4; $i++)
                  <li><a href="#" class="profilePhotoBlocks" style="background-image: url(http://localhost:8000/storage/images/uploads/2018/3.jpg);background-position: center;background-size: cover;background-repeat:  no-repeat;"><i class="fa fa-ellipsis-h"></i></a></li>
                  @endfor
                  <li><a href="#" class="profilePhotoBlocks" style="background-image: url(http://localhost:8000/storage/images/uploads/2018/3.jpg);background-position: center;background-size: cover;background-repeat:  no-repeat;"><i class="fa fa-plus"></i></a></li>
               </ul>
            </div>

            <div style="padding-left:15px;font-weight:400;font-size:22px;line-height:1.1;padding-top:20px;border-top:1px solid #aaa;clear:both;margin-left:20px;margin-right:20px;">Followers</div>
            <div class="divider"></div>
            <div class="profileFollowerWrapper clearfix">
               @for ($i = 0; $i < 10; $i++)
               <div class="profileFollowerBody">
                  <img src="http://localhost:8000/storage/images/uploads/2018/ls.jpg" alt="Follower Image related alt text">
                  <div class="profileFollowerDetails">
                     <a class="profileFollowerName" href="http://localhost:8000/JohnKurtis">John Kurtis</a>
                     <a class="profileFollowerUsername"  href="http://localhost:8000/JohnKurtis">@JohnKurtis</a>
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
         <div class="mainSidebarRight">
            @for ($i = 0; $i < 3; $i++)
            <div class="trialBox">AD HERE</div>
            @endfor
            <hr>
            <div align="center">
               <a href="#"><i class="fa fa-flag m-r-5"></i>Report this Profile</a>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection

@section('scripts')
<script>

</script>
@endsection
