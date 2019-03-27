<div class="canopyNavbar">
    <div class="col-1-main">
        <div class="canopyNavbarList">
            <ul class="no-list-style clearfix">
                <li><a class="{{ Route::currentRouteName() == 'reviewPage' ? 'active' : '' }}" data-ripple="rgba(0,0,0,0.5)" href="{{ route('profilePage', $userNameComposer->username) }}/reviews">
                  <span class="canopyNavLabel">Reviews</span>
                  <span class="canopyNavValue">{{ $userNameComposer->review_count }}</span>
                </a></li>
                <li><a class="{{ Route::currentRouteName() == 'photoPage' ? 'active' : '' }}" data-ripple="rgba(0,0,0,0.5)" href="{{ route('profilePage', $userNameComposer->username) }}/photos">
                  <span class="canopyNavLabel">Photos</span>
                  <span class="canopyNavValue">{{ $userNameComposer->photo_count }}</span>
                </a></li>
                {{-- <li><a data-ripple="rgba(0,0,0,0.5)" href="{{ route('profilePage', $userNameComposer->username) }}/followers">
                        <span class="canopyNavLabel">Followers</span>
                        <span class="canopyNavValue">{{ $userNameComposer->follower_count }}</span>
                    </a></li> --}}
                {{-- <li><a data-ripple="rgba(0,0,0,0.5)" href="{{ route('profilePage', $userNameComposer->username) }}/folllowing">
                        <span class="canopyNavLabel">Following</span>
                        <span class="canopyNavValue">{{ $userNameComposer->following_count }}</span>
                    </a></li> --}}
                {{-- <li class="pull-right ">
                  @guest()
                    <button data-ripple class="canopyNavFollowButton flatButton btn-red" type="button" name="canopyNavFollowButton">Follow</button>
                  @else
                    @if(Auth::id() == $userNameComposer->user_id)
                      <button data-ripple="rgba(0,0,0,0.5)" class="canopyNavFollowButtonSelf flatButton color-777">Edit Profile</button>
                    @else
                      <button data-ripple class="canopyNavFollowButton flatButton btn-red" type="button" name="canopyNavFollowButton">Follow</button>
                      <button class="canopyNavOptionButton flatButton m-l-15" type="button" name="canopyNavOptionButton" type="button" name="canopyNavFollowButtonSelf" data-toggle="tooltip" data-placement="top" title="User actions">
                        <i class="fa fa-circle"></i>
                        <i class="fa fa-circle"></i>
                        <i class="fa fa-circle"></i>
                      </button>
                    @endif
                  @endguest
                </li> --}}
            </ul>
        </div>
    </div>
</div>
