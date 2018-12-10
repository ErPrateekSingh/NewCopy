@extends('layouts.app')

@section('styles')
<!-- stylesheet for jQuery Autocomplete -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
<style>
@media (max-width: 577px) {/*.m-header .m-search {display: none !important;}.m-header .m-city {float: right;margin-right: 15px;}*/}
@media (min-width: 576px) {/*.m-header {display: none;}*/}
.navbar.navbar-default {border-bottom-color: #f27b7c; !important;}
form.navbar-form.navbar-left {display: none !important;}
input {
  -webkit-user-select: auto;
  user-select: auto;
  -webkit-user-drag: none;
}
/*--- stylesheet OverRides for jQuery Autocomplete in App.Blade.php <head> tag ---*/
.ui-widget { font-size: 16px; }
.ui-widget.ui-widget-content { border: 1px solid #555 !important; color: #555; }
.ui-menu .ui-menu-item { margin: 0px 1px; list-style-image: none !important; }
.ui-menu .ui-menu-item .ui-menu-item-wrapper { padding : 7px 0.7em !important; }
.ui-menu .ui-menu-item .ui-menu-item-wrapper.currentCity { font-weight: bold;}
.ui-menu .ui-menu-item .ui-menu-item-wrapper.ui-state-active { border : 1px solid #fff !important; color: #fff !important; }
</style>
@endsection

@section('content')
<div class="homepage-hero" style="background-image: url({{ asset("images/399160.jpg") }});">
   <div class="container-fluid">
     <div class="row">
         <div class="wrapper-1">
            <h1>ZENDUR KNOWS WHERE TO FIND <u id="heroWords">GREAT COFFEE</u></h1>
            <!-- <h1>Explore around with Zendur</h1> -->
            <!-- <h4>Let us know what are you looking for?</h4> -->
            <div class="hero-search-wrapper">
               <form id="#" class="form-horizontal clearfix" method="GET" action="{{ route('register.user.details') }}" role="form" novalidate>
                  {{ csrf_field() }}
                  <div class="heroInput"><i class="fa fa-search"></i>
                     <input type="text" class="form-control" id="heroSearch" name="search_desc" placeholder="Let us know what are you looking for?" value="" autocomplete="off" spellcheck="false" ondrop="return false;">
                  </div>
                  <div class="heroCity"><i class="fa fa-map-marker"></i>
                     <input type="text" class="form-control" id="heroCitySearch" name="search_loc" placeholder="{{ $cityName->city_name }}" value="{{ $cityName->city_name }}" autocomplete="off" spellcheck="false" ondrop="return false;">
                     <input type="hidden" id="heroCitySearchId">
                  </div>
                  <button data-ripple="rgba(200,0,10,0.5)" class="heroSubmit flatButton"><i class="fa fa-search"></i></button>
               </form>
            </div>
            <h4>India's largest collection of trusted local businesses reviewed by you.</h4>
         </div>
      </div>
   </div>
</div>
<div class="wrapper wrapperLight container-fluid">
   <div class="wrapperTitle title">Explore your City in a New Way</div>
   <div class="wrapper-2 col-lg-10 col-lg-offset-1">
      <div class="row">
         <div class="col-md-3 col-md-offset-0 col-sm-6 col-sm-offset-0 sm-500">
            <img src="{{ asset("images/1.jpg") }}" alt="Showrooms &amp; Shops" class="img-responsive" />
            <div class="subTitle">Showrooms &amp; Shops</div>
            <div class="text">Locate the most trusted Shops, Stores and Showrooms in your City. Get the Address, Contact Number and all other details of Stores Reviewed and Trusted by the People of your City.</div>
         </div>
         <div class="col-md-3 col-md-offset-0 col-sm-6 col-sm-offset-0 sm-500">
            <img src="{{ asset("images/2.jpg") }}" alt="Healthcare Services" class="img-responsive" />
            <div class="subTitle">Healthcare Services</div>
            <div class="text">Find out the best Clinics, Hospitals and Diagnostic Centres in your City. Get the Address, Contact Number, Facilities and all other details of the Healthcare Services Reviewed and Trusted by the People of your City.</div>
         </div>
         <div class="col-md-3 col-md-offset-0 col-sm-6 col-sm-offset-0 sm-500">
            <img src="{{ asset("images/3.jpg") }}" alt="Hotels &amp; Restaurants" class="img-responsive" />
            <div class="subTitle">Hotels &amp; Restaurants</div>
            <div class="text">Locate the Best Hotels, Restaurants, Coffee Shops and Takeaways in your City. Get the Address, Contact Number and all other details Reviewed and Trusted by the People of your City.</div>
         </div>
         <div class="col-md-3 col-md-offset-0 col-sm-6 col-sm-offset-0 sm-500">
            <img src="{{ asset("images/4.jpg") }}" alt="Multiplexes" class="img-responsive" />
            <div class="subTitle">And Much More</div>
            <div class="text">You can search for Multiplexes, Professional Services, Event Management Services and Much More in your City. Get the the best of all, Reviewed and Trusted by the People of your City.</div>
         </div>
      </div>
   </div>
   <div align="center">
      <button data-ripple="rgba(200,0,10,0.5)" class="button buttonWrapper btn-red B_2">Start Searching Now</button>
   </div>
</div>
<div class="wrapper wrapperDark container-fluid">
   <div class="wrapperTitle title">Browse by Category</div>
   <div class="wrapper-3 col-lg-10 col-lg-offset-1">
      <div data-ripple="rgba(200,0,10,0.5)" class="categoryWrapper text-trim"><i class="m-r-5 fa fa-car"></i>Automotives</div>
      <div data-ripple="rgba(200,0,10,0.5)" class="categoryWrapper text-trim"><i class="m-r-5 fa fa-smile-o"></i>Beauty, Hair &amp; Spa</div>
      <div data-ripple="rgba(200,0,10,0.5)" class="categoryWrapper text-trim"><i class="m-r-5 fa fa-film"></i>Entertainment</div>
      <div data-ripple="rgba(200,0,10,0.5)" class="categoryWrapper text-trim"><i class="m-r-5 fa fa-birthday-cake"></i>Event Planning &amp; Services</div>
      <div data-ripple="rgba(200,0,10,0.5)" class="categoryWrapper text-trim"><i class="m-r-5 fa fa-car"></i>Automotives</div>
      <div data-ripple="rgba(200,0,10,0.5)" class="categoryWrapper text-trim"><i class="m-r-5 fa fa-smile-o"></i>Beauty, Hair &amp; Spa</div>
      <div data-ripple="rgba(200,0,10,0.5)" class="categoryWrapper text-trim"><i class="m-r-5 fa fa-film"></i>Entertainment</div>
      <div data-ripple="rgba(200,0,10,0.5)" class="categoryWrapper text-trim"><i class="m-r-5 fa fa-birthday-cake"></i>Event Planning &amp; Services</div>
      <div data-ripple="rgba(200,0,10,0.5)" class="categoryWrapper text-trim"><i class="m-r-5 fa fa-cutlery"></i>Food &amp; Beverages</div>
      <div data-ripple="rgba(200,0,10,0.5)" class="categoryWrapper text-trim"><i class="m-r-5 fa fa-medkit"></i>Healthcare Services</div>
      <div data-ripple="rgba(200,0,10,0.5)" class="categoryWrapper text-trim"><i class="m-r-5 fa fa-user-secret"></i>Professional Services</div>
      <div data-ripple="rgba(200,0,10,0.5)" class="categoryWrapper text-trim"><i class="m-r-5 fa fa-shopping-basket"></i>Retail Shopping</div>
      <div data-ripple="rgba(200,0,10,0.5)" class="categoryWrapper text-trim"><i class="m-r-5 fa fa-car"></i>Automotives</div>
      <div data-ripple="rgba(200,0,10,0.5)" class="categoryWrapper text-trim"><i class="m-r-5 fa fa-smile-o"></i>Beauty, Hair &amp; Spa</div>
      <div data-ripple="rgba(200,0,10,0.5)" class="categoryWrapper text-trim"><i class="m-r-5 fa fa-film"></i>Entertainment</div>
      <div data-ripple="rgba(200,0,10,0.5)" class="categoryWrapper text-trim"><i class="m-r-5 fa fa-birthday-cake"></i>Event Planning &amp; Services</div>
   </div>
   <div align="center">
      <button data-ripple="rgba(200,0,10,0.5)" class="button buttonWrapper btn-red B_3">More Categories</button>
   </div>
</div>
<div class="wrapper wrapperLight container-fluid">
   <div class="wrapperTitle title">Advertise for free</div>
   <div class="wrapper-4 col-lg-10 col-lg-offset-1">
      <div class="row">
         <div class="col-md-3 col-md-offset-0 col-sm-6 col-sm-offset-0 sm-500">
            <img src="{{ asset("images/5.jpg") }}" alt="Advertisement" class="img-responsive" />
            <div class="subTitle">Advertisement</div>
            <div class="text">Advertise your Business Online for Free. Add Contact Details, Maps, Images and Social Links of your Business on your page. You can Track Daily, Monthly and Quarterly Visits to your page.</div>
         </div>
         <div class="col-md-3 col-md-offset-0 col-sm-6 col-sm-offset-0 sm-500">
            <img src="{{ asset("images/6.jpg") }}" alt="Promotion" class="img-responsive" />
            <div class="subTitle">Promotion</div>
            <div class="text">Promote your Business Online and that too without any Cost. Let the World know about Your Business and What People think about your Business by Sharing your Best Reviews, Location and Contact Details.</div>
         </div>
         <div class="col-md-3 col-md-offset-0 col-sm-6 col-sm-offset-0 sm-500">
            <img src="{{ asset("images/7.jpg") }}" alt="Stay in Contact" class="img-responsive" />
            <div class="subTitle">Stay in Contact</div>
            <div class="text">Always stay Open and in Contact with your Customers. Answer their Queries, Reply their Reviews. Your Customers can even Contact You when You are Closed.</div>
         </div>
         <div class="col-md-3 col-md-offset-0 col-sm-6 col-sm-offset-0 sm-500">
            <img src="{{ asset("images/8.jpg") }}" alt="Maximize your Business" class="img-responsive" />
            <div class="subTitle">Maximize your Business</div>
            <div class="text">Maximizing the Business and Building trust among their Customers is the top priority of any Business. You can Maximize your Business by Promoting it with us. Genuine Reviews and Likes help in trust Building Among your Customers.</div>
         </div>
      </div>
   </div>
   <div align="center">
      <a data-ripple="rgba(200,0,10,0.5)" href="{{ route('register') }}" class="button buttonWrapper btn-red B_4" style="display:block;text-decoration: none;">Sign Up Now</a>
   </div>
</div>
@endsection

@section('scripts')
<!-- script for jQuery Autocomplete -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
   $(document).ready(function () {
      //Displays modal if user visits first time
      if (Cookies.get('CTSID') != '2') $('#m-city-modal').modal('show');

      //Scroll to top & Focus on input after button click
      $('.B_2').click(function () {$("html,body").animate({scrollTop:0}, 800, 'swing', function(){ $("#heroSearch").focus();});});

      //Changes text every refresh
      var quotes = ["Awesome Haircut", "Professional Lawyers", "Parlors", "Fun Zone", "Shopping Destinations", "Genuine Electronic Goods", "GREAT COFFEE"],
      randno = quotes[Math.floor( Math.random() * quotes.length )];
      $("#heroWords").text( randno );

      //Select all text when click in the textbox
      var timeOutSelect;
      $("#heroCitySearch").focus(function() {
         var save_this = $(this);
         clearTimeout(timeOutSelect);
         timeOutSelect = window.setTimeout (function(){
            save_this.select();
         }, 100);
      });

      //Function for City List
      $( "#heroCitySearch" ).autocomplete({
         minLength: 0,
         // autoFocus: true,
         source: '{{ route('fetch.city') }}',
         focus: function (event, ui) {
            event.preventDefault();
         },
         open : function(){
            $(".ui-autocomplete:visible").css({top:"+=1"});
            $(".ui-autocomplete").prepend("<li class='ui-menu-item'><div tabindex='-1' class='ui-menu-item-wrapper currentCity'><i class='fa fa-crosshairs m-r-10'></i>Current Location</div></li>");
         },
         select: function( event, ui ) {
            $( "#heroCitySearch" ).val( ui.item.city_name );
            $( "#heroCitySearchId" ).val( ui.item.city_id );
            return false;
         }
      })
      .autocomplete( "instance" )._renderItem = function( ul, item ) {
         if(item.city_id == '0'){
            return $('<li class="ui-state-disabled"><div>'+item.city_name+'</div></li>').appendTo(ul);
         } else {
            item.city_nameBold = item.city_name.replace(new RegExp("(?![^&;]+;)(?!<[^<>]*)(" + $.ui.autocomplete.escapeRegex(this.term) + ")(?![^<>]*>)(?![^&;]+;)", "gi"), "<strong>$1</strong>");
            return $( "<li>" )
            .append("<div><i class='fa fa-map-marker m-r-10'></i>" + item.city_nameBold + "</div>")
            .appendTo( ul );
         }
      };
   });
</script>
@endsection
