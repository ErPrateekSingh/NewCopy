<div class="modal fade sideNav" id="sideNavModal" tabindex="-1" role="dialog">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         @if(Auth::guest())
            <div class="modal-header sideNav-header">
               <button data-ripple="rgba(0,0,0,0.5)" type="button" class="close sideNav-close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true"><i class="fa fa-chevron-left"></i></span>
               </button>
               <div align="center" class="sideNav-image"><i class="fa fa-user"></i></div>
               <div class="sideNav-name text-trim m-t-10">Guest User</div>
               <div class="sideNav-city text-trim">Allahabad, Uttar Pradesh, India</div>
            </div>
            <div class="modal-body sideNav-body">
               <a href="#" data-ripple="rgba(0,0,0,0.5)"><i class="fa fa-home"></i>Home</a>
               <a href="#" data-ripple="rgba(0,0,0,0.5)"><i class="fa fa-th"></i>Browse Category</a>
               <a href="#" data-ripple="rgba(0,0,0,0.5)"><i class="fa fa-plus-circle"></i>Add Free Listing</a><!-- Add {-{ route('register.profile.category') }-} -->
               <div class="divider"></div>
               <a href="#" data-ripple="rgba(0,0,0,0.5)"><i class="fa fa-sign-in"></i>Login</a>
               <a href="#" data-ripple="rgba(0,0,0,0.5)"><i class="fa fa-user-plus"></i>Register</a>
               <div class="divider"></div>
               <a href="#" data-ripple="rgba(0,0,0,0.5)"><i class="fa fa-envelope"></i>Feedback</a>
            </div>
         @else
            <div class="modal-header sideNav-header">
               <button data-ripple="rgba(0,0,0,0.5)" type="button" class="close sideNav-close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true"><i class="fa fa-chevron-left"></i></span>
               </button>
               <div align="center" class="sideNav-image"><img src="{{ asset('images/userImage100.jpg') }}" alt="User Image"></div>
               <div class="sideNav-name text-trim m-t-10">Prateek Singh</div>
               <div class="sideNav-city text-trim">Allahabad, Uttar Pradesh, India</div>
            </div>
            <div class="modal-body sideNav-body">
               <a href="#" data-ripple="rgba(0,0,0,0.5)"><i class="fa fa-home"></i>Home</a>
               <a href="#" data-ripple="rgba(0,0,0,0.5)"><i class="fa fa-user"></i>Profile</a>
               <a href="#" data-ripple="rgba(0,0,0,0.5)"><i class="fa fa-th"></i>Browse Category</a>
               <a href="#" data-ripple="rgba(0,0,0,0.5)"><i class="fa fa-plus-circle"></i>Add Free Listing</a><!-- Add {-{ route('register.profile.category') }-} -->
               <div class="divider"></div>
               <a href="#" data-ripple="rgba(0,0,0,0.5)"><i class="fa fa-heart-o"></i>Favourites</a>
               <a href="#" data-ripple="rgba(0,0,0,0.5)"><i class="fa fa-bookmark-o"></i>Bookmarks</a>
               <a href="#" data-ripple="rgba(0,0,0,0.5)"><i class="fa fa-comment-o"></i>Queries</a>
               <div class="divider"></div>
               <a href="#" data-ripple="rgba(0,0,0,0.5)"><i class="fa fa-envelope"></i>Feedback</a>
               <a href="#" data-ripple="rgba(0,0,0,0.5)"><i class="fa fa-sign-out"></i>Sign Out</a>
            </div>
         @endif
         <div class="modal-footer sideNav-footer">
            <div class="social-text">Connect with Us</div>
            <div class="social-wrap">
               <span class="social-cont">
                  <a data-ripple href="#" class="social-fb"></a>
               </span>
               <span class="social-cont">
                  <a data-ripple href="#" class="social-tw"></a>
               </span>
               <span class="social-cont">
                  <a data-ripple href="#" class="social-gp"></a>
               </span>
               <span class="social-cont">
                  <a data-ripple href="#" class="social-li"></a>
               </span>
            </div>
         </div>
      </div>
   </div>
</div>
