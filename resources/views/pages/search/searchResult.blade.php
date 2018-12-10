@extends('layouts.app')

@section('styles')
<style>
.dropdown:hover .dropdown-menu {
   display: block;
   margin-top: 0; // remove the gap so it doesn't close
 }
</style>
@endsection

@section('content')
<div class="container-fluid">
   <div class="row">
      <div class="subNav">
         <div class="mainWrapper">
            <div class="dropdown subNavItems">
               <div class="dropdown-toggle" id="dd_1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                  <i class="fa fa-cutlery m-r-5"></i>Food &amp; Drinks <span class="caret"></span>
               </div>
               <ul class="dropdown-menu" aria-labelledby="dd_1">
                  <li><a data-ripple="rgba(0,0,0,0.5)" href="#"><i class="fa fa-cutlery m-r-5"></i>Restaurants</a></li>
                  <li><a data-ripple="rgba(0,0,0,0.5)" href="#"><i class="fa fa-coffee m-r-5"></i>Coffee Shop</a></li>
                  <li><a data-ripple="rgba(0,0,0,0.5)" href="#"><i class="fa fa-birthday-cake m-r-5"></i>Bakery</a></li>
               </ul>
            </div>
            <div class="dropdown subNavItems">
               <div class="dropdown-toggle" id="dd_2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                  <i class="fa fa-ambulance m-r-5"></i>Health Services <span class="caret"></span>
               </div>
               <ul class="dropdown-menu" aria-labelledby="dd_2">
                  <li><a href="#"><i class="fa fa-cutlery m-r-5"></i>Restaurants</a></li>
                  <li><a href="#"><i class="fa fa-coffee m-r-5"></i>Coffee Shop</a></li>
                  <li><a href="#"><i class="fa fa-birthday-cake m-r-5"></i>Bakery</a></li>
               </ul>
            </div>
            <div class="dropdown subNavItems">
               <div class="dropdown-toggle" id="dd_3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                  <i class="fa fa-bus m-r-5"></i>Travel &amp; Tour <span class="caret"></span>
               </div>
               <ul class="dropdown-menu" aria-labelledby="dd_3">
                  <li><a href="#"><i class="fa fa-cutlery m-r-5"></i>Restaurants</a></li>
                  <li><a href="#"><i class="fa fa-coffee m-r-5"></i>Coffee Shop</a></li>
                  <li><a href="#"><i class="fa fa-birthday-cake m-r-5"></i>Bakery</a></li>
               </ul>
            </div>
            <div class="dropdown subNavItems">
                  <div class="dropdown-toggle" id="dd_4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                     More <span class="caret"></span>
                  </div>
                  <ul class="dropdown-menu" aria-labelledby="dd_4">
                     <li><a href="#"><i class="fa fa-cutlery m-r-5"></i>Restaurants</a></li>
                     <li><a href="#"><i class="fa fa-coffee m-r-5"></i>Coffee Shop</a></li>
                     <li><a href="#"><i class="fa fa-birthday-cake m-r-5"></i>Bakery</a></li>
                  </ul>
               </div>
         </div>
      </div>
      <div class="searchHeader clearfix">
         <div class="mainWrapper">
            <div class="searchHeading">
               <h1 class="">
                  <strong>Best Restaurants</strong> in Delhi
               </h1>
               <p class="">Showing 1-10 of 3025</p>
            </div>
            <div class="breadCrumBar">
               <a href="/">Home</a>
               <i class="fa fa-chevron-right"></i>
               <a href="/delhi">Delhi</a>
               <i class="fa fa-chevron-right"></i>
               <a href="/delhi/restaurants">Restaurants</a>
            </div>
            <div class="filterWrapper clearfix">
               <div class="filterWrapperVisible clearfix">
                  <div class="filterBtn">
                     <span data-ripple="rgba(0,0,0,0.5)" class="iBtn" data-toggle="tooltip" data-placement="top" title="Inexpensive">
                        <i>&#x20B9;</i>
                     </span>
                     <span data-ripple="rgba(0,0,0,0.5)" class="iBtn" data-toggle="tooltip" data-placement="top" title="Moderate">
                        <i>&#x20B9;</i><i>&#x20B9;</i>
                     </span>
                     <span data-ripple="rgba(0,0,0,0.5)" class="iBtn" data-toggle="tooltip" data-placement="top" title="Pricey">
                        <i>&#x20B9;</i><i>&#x20B9;</i><i>&#x20B9;</i>
                     </span>
                     <span data-ripple="rgba(0,0,0,0.5)" class="iBtn" data-toggle="tooltip" data-placement="top" title="Ultra Hi-End">
                        <i>&#x20B9;</i><i>&#x20B9;</i><i>&#x20B9;</i><i>&#x20B9;</i>
                     </span>
                  </div>
                  <div class="filterBtn">
                     <span class="btn-default" data-ripple="rgba(0,0,0,0.5)" data-toggle="tooltip" data-placement="top" title="Find Businesses that are open now">
                        <i class="fa fa-clock-o m-r-10"></i>Open Now
                     </span>
                  </div>
                  <div class="filterBtn">
                     <span data-ripple="rgba(0,0,0,0.5)" data-toggle="tooltip" data-placement="top" title="Find Businesses that accept Card Payments">
                        <i class="fa fa-credit-card m-r-10"></i>Accept Card Payment
                     </span>
                  </div>
                  <div class="filterBtn">
                     <span data-ripple="rgba(0,0,0,0.5)" data-toggle="tooltip" data-placement="top" title="Find Businesses that provides Free WiFi">
                        <i class="fa fa-wifi m-r-10"></i>Free Wi-Fi
                     </span>
                  </div>
                  <div class="filterBtn">
                     <span id="showFilters" data-ripple="rgba(0,0,0,0.5)" data-toggle="tooltip" data-placement="top" title="Show more Filters">
                        <i class="fa fa-sliders m-r-10"></i>All Filters
                     </span>
                  </div>
               </div>
               <div id="filterWrapperHidden">
                  <div class="col-lg-3">
                     <h4>Sort By</h4>
                     <ul>
                        <li>Highest Rated</li>
                        <li>Most Reviewed</li>
                        <li>Highest Rated</li>
                        <li>Most Reviewed</li>
                     </ul>
                  </div>
                  <div class="col-lg-3">
                     <h4>Sort By</h4>
                     <ul>
                        <li>Highest Rated</li>
                        <li>Most Reviewed</li>
                        <li>Highest Rated</li>
                        <li>Most Reviewed</li>
                     </ul>
                  </div>
                  <div class="col-lg-3">
                     <h4>Sort By</h4>
                     <ul>
                        <li>Highest Rated</li>
                        <li>Most Reviewed</li>
                        <li>Highest Rated</li>
                        <li>Most Reviewed</li>
                     </ul>
                  </div>
                  <div class="col-lg-3">
                     <h4>Sort By</h4>
                     <ul>
                        <li>Highest Rated</li>
                        <li>Most Reviewed</li>
                        <li>Highest Rated</li>
                        <li>Most Reviewed</li>
                     </ul>
                  </div>
                  <div class="clear clearfix"></div>
               </div>
            </div>
         </div>
      </div>
      <div class="searchContent">
         <div class="mainWrapper">
            <div class="mainContentLeft">
               @for($i=1;$i<9;$i++)
               <div class="searchResultBody">
                  <div class="s-r-b-upper clearfix">
                     <div class="s-r-image">
                        <a href="/delhi/sagar-ratna-restaurants-delhi">
                           <img src="{{ asset("images/".$i.".jpg") }}" alt="Hotels &amp; Restaurants" class="img-responsive">
                        </a>
                     </div>
                     <div class="s-r-info">
                        <div class="bizName text-trim">
                           <h2>
                              <?php echo $i;?>.&nbsp;<a href="#">Sagar Ratna Southern Restaurant</a>
                           </h2>
                        </div>
                        <div class="bizTags  text-trim">
                           <a href="">Chicken Wings</a>,&nbsp;<a href="">Barbeque</a>,&nbsp;<a href="">Salad</a>
                        </div>
         					<div class="bizRating three-half-star"></div>
                        <div class="bizReviewCount"><a href="/delhi/sagar-ratna-restaurants-delhi/reviews">(355 Reviews)</a></div>
                        <div class="bizFacility">
                           <ul class="clearfix">
                              <li data-toggle="tooltip" data-placement="top" title="Price">&#x20B9;&#x20B9;&#x20B9;&#x20B9;</li>
                              <li data-toggle="tooltip" data-placement="top" title="Accepts Card Payment"><i class="fa fa-credit-card"></i></li>
                              <li data-toggle="tooltip" data-placement="top" title="Free Wi-Fi"><i class="fa fa-wifi"></i></li>
                              <li data-toggle="tooltip" data-placement="top" title="Pets Allowed"><i class="fa fa-paw"></i></li>
                              <li data-toggle="tooltip" data-placement="top" title="Wheelchair Accessible"><i class="fa fa-wheelchair"></i></li>
                              <li data-toggle="tooltip" data-placement="top" title="Parking Available"><i class="fa fa-car"></i></li>
                           </ul>
                        </div>
                     </div>
                     <div class="s-r-contact">
                        <div class="searchAddress text-trim">
                           <i class="fa fa-map-marker"></i>
         						<span>Mahatama Gandhi Marg</span>,&nbsp;<span>Civil Lines</span>,&nbsp;<span>Allahabad</span>
            				</div>
            				<div class="searchLandmark text-trim">
            					<i class="fa fa-map-signs"></i><span>In front of ICICI Bank Main Branch, Civil Lines</span>
            				</div>
            				<div class="searchContact text-trim">
            					<i class="fa fa-phone-square"></i><span>(0532)&nbsp;-&nbsp;2468...</span>
            				</div>
                     </div>
                  </div>
                  <div class="s-r-b-middle">
                     <div class="searchAppointment">
                        <button data-ripple="rgba(200,0,10,0.5)" type="button" class="btn btn-red btn-lg btn-block">Request an Appointment</button>
                        <p>Responds in about <span>50 minutes.</span></p>
                     </div>
                  </div>
                  <div class="s-r-b-lower">
                     <div class="searchReview clearfix">
                        <div class="s-r-image">
                           <a href="/delhi/sagar-ratna-restaurants-delhi">
                              <img class="img-responsive" src="{{ asset("images/userImage44.jpg") }}" alt="Hotels&amp;Restaurants">
                           </a>
                        </div>
                        <div class="s-r-p">
                           <p>
                              Great service! I mostly appreciate Marcelo's honesty. I wanted to go from Red to Blonde in one visit.
                              He, however explained that it would not turn the color of blonde I desired. I... <a href="/review/this-review-no">read more</a>
                           </p>
                        </div>
                     </div>
                  </div>
               </div>
               @endfor
               <div class="searchResultPageBottom clearfix">
            		<span class="hidden-xs">Page 2 of 100</span>
            		<div class="s-p-b-right">
                     <a href="#"><span><i class="fa fa-chevron-left m-r-5"></i><b>Previous</b></a>
            		<?php for($i=1;$i<=7;$i++){ ?>
            			<a href="#"><span <?php if($i==2){echo "class='active'";}?>><?php echo $i;?></span></a>
            		<?php } ?>
            			<a href="#"><span><b>Next</b><i class="fa fa-chevron-right m-l-5"></i></a>
            		</div>
            	</div>
            </div>
            <div class="mainSidebarRight">
               <div class="searchSidebar">
                  <div class="searchResultSideMap">
                     <img class="img-responsive" src="{{ asset("images/googleSmall.png") }}">
                  </div>
                  <div class="trialBox">AD HERE</div>
                  <div class="trialBox">AD HERE</div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function () {
   $( "#showFilters" ).click(function() {
      $( "#filterWrapperHidden" ).slideToggle(700, function () {
         $('#showFilters').attr("data-original-title", $('#showFilters').attr("data-original-title") == 'Show more Filters' ? "Show lesser Filters" : "Show more Filters" ).tooltip('hide');
      });
   });
});
</script>
@endsection
