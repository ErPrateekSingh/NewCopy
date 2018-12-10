@extends('layouts.app')

@section('content')
<style>
/* Hide all steps by default: */
.tab {
   width: 100%;
   display: none;
   min-height: 350px;
   position: relative;
}
.tabHead{
   font-size: 24px;
   margin-bottom: 10px;
}
.categoryName, .subCategoryName {
   font-size: 18px;
   margin-top: 7px;
   font-weight: 500;
   text-align: center;
}
.changeCategory, .changeSubCategory {
    float: right;
    color: #3097D1;
    font-size: 14px;
    margin-top: 11px;
    margin-right: 10px;
    text-decoration: none;
}
.changeCategory:hover, .changeSubCategory:hover {
   color: #216a94;
   cursor: pointer;
   text-decoration: underline;
}
.tabWrapper {
   width: 100%;
}
.categoryBox, .subCategoryBox {
   margin: 1%;
   cursor: pointer;
   font-size: 14px;
   line-height: 0.9;
   border: 1px solid;
   padding: 11px 15px;
   border-color: #ccc;
   display: inline-block;
   width: calc(23% - 3px);
}
.categoryBox:hover, .subCategoryBox:hover {
   color: #555;
   border-color: rgba(244, 84, 95, 0.6);
   background-color: rgba(244, 84, 95, 0.25);
}
.subCatSelected, .subCatSelected:hover {
   color: #444;
   border-color: rgba(0, 131, 0, 0.6);
   background-color: rgba(0, 131, 0, 0.25);
}
.subCatFade {
   opacity: 0.5;
}

#nextBtn {
   background-color: #4CAF50;
   color: #ffffff;
   border: none;
   padding: 10px 20px;
   font-size: 16px;
}
/*button {
   background-color: #4CAF50;
   color: #ffffff;
   border: none;
   padding: 10px 20px;
   font-size: 17px;
   font-family: Raleway;
   cursor: pointer;
}*/

button:hover {
   opacity: 0.8;
}

#prevBtn {
   background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
   height: 15px;
   width: 15px;
   margin: 0 2px;
   background-color: #bbbbbb;
   border: none;
   border-radius: 50%;
   display: inline-block;
   opacity: 0.5;
}

.step.active {
   opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
   background-color: #4CAF50;
}
</style>
<div class="container">
   <div class="row">
      <div class="col-md-10 col-md-offset-1 col-xs-12">
         <div class="reg-progress clearfix">
            <div class="reg-bar-box"><i class="fa fa-th"></i><span>Category</span></div>
            <div class="reg-bar"></div>
            <div class="reg-bar-box"><i class="fa fa-building"></i><span>Profile</span></div>
            <div class="reg-bar"></div>
            <div class="reg-bar-box"><i class="fa fa-image"></i><span>Photo</span></div>
         </div>
         <div class="panel panel-form clearfix" style="margin-top: 50px;">
            <form id="regForm" action="#" method="post">
               <!-- One "tab" for each step in the form: -->
               <div class="tab">
                  <div class="tabHead first clearfix">
                     <div class="col-lg-4" style="padding: 0px;">Category :</div>
                     <div class="categoryName col-lg-4" style="display:none;"></div>
                     <span class="changeCategory" style="display:none;"><i class="fa fa-pencil m-r-5"></i>Change</span>
                  </div>
                  <hr  class="first">
                  <div class="tabWrapper first">
                     <input type="hidden" name="category" id="categoryInput" value="">
                     <div class="categoryBox"><i class="fa fa-automobile m-r-10"></i>Automobile</div>
                     <div class="categoryBox"><i class="fa fa-heart m-r-10"></i>Beauty &amp; Spa</div>
                     <div class="categoryBox"><i class="fa fa-birthday-cake m-r-10"></i>Event Organiser</div>
                     <div class="categoryBox"><i class="fa fa-building m-r-10"></i>Real Estate</div>
                     <div class="categoryBox"><i class="fa fa-bed m-r-10"></i>Hotel</div>
                     <div class="categoryBox"><i class="fa fa-ambulance m-r-10"></i>Healthcare</div>
                     <div class="categoryBox"><i class="fa fa-balance-scale m-r-10"></i>Legal</div>
                     <div class="categoryBox"><i class="fa fa-truck m-r-10"></i>Packers &amp; Movers</div>
                     <div class="categoryBox"><i class="fa fa-camera m-r-10"></i>Photography</div>
                     <div class="categoryBox"><i class="fa fa-cutlery m-r-10"></i>Restaurant</div>
                     <div class="categoryBox"><i class="fa fa-cab m-r-10"></i>Taxi Sevice</div>
                     <div class="categoryBox"><i class="fa fa-coffee m-r-10"></i>Tea and Coffee</div>
                     <div class="categoryBox"><i class="fa fa-bus m-r-10"></i>Travel and Tour</div>
                     <div class="categoryBox"><i class="fa fa-plus m-r-10"></i>Other</div>
                     <div class="help-block m-t-10">Please choose a category that describes your business / profession best.
                        If your desired category is not listed here, Then choose 'Other' and specify your category in the textbox.
                     </div>
                  </div>
                  <div class="tabWrapper otherCat" style="display:none; margin-top:80px;">
                     <div class="form-group form-group-mat{{ $errors->has('pName') ? ' has-error' : '' }}">
                        <input id="pName" type="text" class="form-control" name="pName" value="{{ old('pName') }}" required spellcheck="false">
                        <label for="pName" class="control-label"><i class="fa fa-plus m-r-5"></i> Please specify your Category</label><i class="bar"></i>
                        <div id="error_pName" class=""></div>
                        @if ($errors->has('pName'))
                           <span class="help-block"> {{ $errors->first('pName') }} </span>
                        @endif
                     </div>
                     <div class="help-block" style="margin-top:35px;">Please  specify your category in the textbox above.
                     </div>
                  </div>
                  <div class="tabHead second clearfix" style="display:none;">
                     <div class="col-lg-4" style="padding: 0px;">Sub-Category :</div>
                     <div class="subCategoryName col-lg-4" style="display:none;"></div>
                     <span class="changeSubCategory" style="display:none;"><i class="fa fa-pencil m-r-5"></i>Change</span>
                  </div>
                  <hr class="second" style="display:none;">
                  <div class="tabWrapper second" style="display:none;">
                     <input type="hidden" name="subCategory" id="subCategoryInput" value="">
                     <div class="subCategoryBox"><i class="fa fa-automobile m-r-10"></i>Automobile</div>
                     <div class="subCategoryBox"><i class="fa fa-heart m-r-10"></i>Beauty &amp; Spa</div>
                     <div class="subCategoryBox"><i class="fa fa-birthday-cake m-r-10"></i>Event Organiser</div>
                     <div class="subCategoryBox"><i class="fa fa-building m-r-10"></i>Real Estate</div>
                     <div class="subCategoryBox"><i class="fa fa-bed m-r-10"></i>Hotel</div>
                     <div class="subCategoryBox"><i class="fa fa-ambulance m-r-10"></i>Healthcare</div>
                     <div class="subCategoryBox"><i class="fa fa-balance-scale m-r-10"></i>Legal</div>
                     <div class="subCategoryBox"><i class="fa fa-truck m-r-10"></i>Packers &amp; Movers</div>
                     <div class="subCategoryBox"><i class="fa fa-camera m-r-10"></i>Photography</div>
                     <div class="subCategoryBox"><i class="fa fa-cutlery m-r-10"></i>Restaurant</div>
                     <div class="subCategoryBox"><i class="fa fa-cab m-r-10"></i>Taxi Sevice</div>
                     <div class="subCategoryBox"><i class="fa fa-coffee m-r-10"></i>Tea and Coffee</div>
                     <div class="subCategoryBox"><i class="fa fa-bus m-r-10"></i>Travel and Tour</div>
                     <div class="subCategoryBox"><i class="fa fa-plus m-r-10"></i>Other</div>
                     <div class="help-block m-t-10">Please choose a sub-category that describes your business / profession best.
                        If your desired sub-category is not listed here, Then choose 'Other' and specify your sub-category in the textbox.
                     </div>
                  </div>
               </div>

               <div class="tab">
                  <div class="tabHead">Profile Details</div>
                  <div class="tabWrapper">
                     <div class="form-group form-group-mat{{ $errors->has('pName') ? ' has-error' : '' }}">
                        <input id="pName" type="text" class="form-control" name="pName" value="{{ old('pName') }}" required spellcheck="false">
                        <label for="pName" class="control-label"><i class="fa fa-envelope m-r-5"></i> Name of Business</label><i class="bar"></i>
                        <div id="error_pName" class=""></div>
                        @if ($errors->has('pName'))
                           <span class="help-block"> {{ $errors->first('pName') }} </span>
                        @endif
                     </div>
                  </div>
                  <h3 style="margin-top:70px;">Address &amp; Contact Details</h3>
                  <div class="tabWrapper">
                     <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 fname-xs">
                           <div class="form-group form-group-mat{{ $errors->has('fname') ? ' has-error' : '' }}">
                              <input id="fname" type="text" class="form-control" name="fname" value="{{ old('fname') }}" required autocomplete="off" spellcheck="false">
                              <label for="fname" class="control-label"><i class="fa fa-building m-r-5"></i> Building/House No.</label><i class="bar"></i>
                              <div id="error_fname" class=""></div>
                              @if ($errors->has('fname'))
                              <span class="help-block"> {{ $errors->first('fname') }} </span>
                              @endif
                           </div>
                        </div>
                        <div class="col-lg-5 col-lg-offset-1 col-md-5 col-md-offset-1 col-sm-5 col-sm-offset-1 col-xs-5 col-xs-offset-1 lname-xs">
                           <div class="form-group form-group-mat{{ $errors->has('lname') ? ' has-error' : '' }}">
                              <input id="lname" type="text" class="form-control" name="lname" value="{{ old('lname') }}" required autocomplete="off" spellcheck="false">
                              <label for="lname" class="control-label"><i class="fa fa-road m-r-5"></i> Street Name</label><i class="bar"></i>
                              <div id="error_lname" class=""></div>
                              @if ($errors->has('lname'))
                              <span class="help-block"> {{ $errors->first('lname') }} </span>
                              @endif
                           </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 fname-xs">
                           <div class="form-group form-group-mat{{ $errors->has('fname') ? ' has-error' : '' }}">
                              <input id="fname" type="text" class="form-control" name="fname" value="{{ old('fname') }}" required autocomplete="off" spellcheck="false">
                              <label for="fname" class="control-label"><i class="fa fa-map-signs m-r-5"></i> Area/Town</label><i class="bar"></i>
                              <div id="error_fname" class=""></div>
                              @if ($errors->has('fname'))
                              <span class="help-block"> {{ $errors->first('fname') }} </span>
                              @endif
                           </div>
                        </div>
                        <div class="col-lg-5 col-lg-offset-1 col-md-5 col-md-offset-1 col-sm-5 col-sm-offset-1 col-xs-5 col-xs-offset-1 lname-xs">
                           <div class="form-group form-group-mat{{ $errors->has('lname') ? ' has-error' : '' }}">
                              <select class="form-control" id="lname" name="lname">
                                 <option>Allahabad</option>
                                 <option>Varanasi</option>
                              </select>
                              <label for="lname" class="control-label"><i class="fa fa-map-marker m-r-5"></i> City</label><i class="bar"></i>
                              <div id="error_lname" class=""></div>
                              @if ($errors->has('lname'))
                              <span class="help-block"> {{ $errors->first('lname') }} </span>
                              @endif
                           </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 fname-xs">
                           <div class="form-group form-group-mat{{ $errors->has('fname') ? ' has-error' : '' }}">
                              <input id="fname" type="text" class="form-control" name="fname" value="{{ old('fname') }}" required autocomplete="off" spellcheck="false">
                              <label for="fname" class="control-label"><i class="fa fa-map-pin m-r-5"></i> Landmark</label><i class="bar"></i>
                              <div id="error_fname" class=""></div>
                              @if ($errors->has('fname'))
                              <span class="help-block"> {{ $errors->first('fname') }} </span>
                              @endif
                           </div>
                        </div>
                        <div class="col-lg-5 col-lg-offset-1 col-md-5 col-md-offset-1 col-sm-5 col-sm-offset-1 col-xs-5 col-xs-offset-1 lname-xs">
                           <div class="form-group form-group-mat{{ $errors->has('lname') ? ' has-error' : '' }}">
                              <input id="lname" type="text" class="form-control" name="lname" value="{{ old('lname') }}" required autocomplete="off" spellcheck="false">
                              <label for="lname" class="control-label"><i class="fa fa-map m-r-5"></i> State</label><i class="bar"></i>
                              <div id="error_lname" class=""></div>
                              @if ($errors->has('lname'))
                              <span class="help-block"> {{ $errors->first('lname') }} </span>
                              @endif
                           </div>
                        </div>

                     </div>
                  </div>
               </div>
               <div class="tab">Birthday:
                  <p><input placeholder="dd" oninput="this.className = ''" name="dd"></p>
                  <p><input placeholder="mm" oninput="this.className = ''" name="nn"></p>
                  <p><input placeholder="yyyy" oninput="this.className = ''" name="yyyy"></p>
               </div>
               <div class="tab">Login Info:
                  <p><input placeholder="Username..." oninput="this.className = ''" name="uname"></p>
                  <p><input placeholder="Password..." oninput="this.className = ''" name="pword" type="password"></p>
               </div>
               <div class="help-block bottomHelp">For the complete list of categories and their sub-categories, Please <span style="cursor: pointer;" onclick="showHelp(1)"><u>Click Here</u></span>.</div>
               <div style="overflow:auto;">
                  <div style="float:right;">
                     <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                     <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                  </div>
               </div>
               <!-- Circles which indicates the steps of the form: -->
               <div style="text-align:center;margin-top:40px;">
                  <span class="step"></span>
                  <span class="step"></span>
                  <span class="step"></span>
                  <span class="step"></span>
               </div>
            </form>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script>
               $(document).ready(function(){
                  // Variables for first
                  var c_b = $('.categoryBox');
                  var c_n = $('.categoryName');
                  var c_i = $('#categoryInput');
                  var c_c = $('.changeCategory');
                  var t_f = $('.tabWrapper.first');
                  // Variables for second
                  var sc_b = $('.subCategoryBox');
                  var sc_n = $('.subCategoryName');
                  var sc_i = $('#subCategoryInput');
                  var sc_c = $('.changeSubCategory');
                  var t_s = $('.tabWrapper.second');

                  //Functions for first
                  c_b.click(function() {
                     var cat = $(this).text();
                     c_i.val(cat);
                     c_n.html($(this).html()).add(c_c).fadeIn(1000);
                     t_f.animate({height: '0px', opacity: '0'}, 1000, function(){
                        $(this).css('display', 'none');
                     });
                     $('hr.first').animate({borderTopWidth: '2px'},1000);
                     if(cat == 'Other'){
                        $('.otherCat').delay(200).fadeIn(1200);
                     } else {
                        $('.second').delay(200).fadeIn(1000);
                     }
                  });
                  c_c.click(function() {
                     c_n.add(c_c).fadeOut(700,function(){c_n.text('');c_i.val('');});
                     t_f.css({'display' : 'block'}).animate({height: '100%', opacity: '1'}, 1000);
                     $('hr.first').animate({borderTopWidth: '1px'},1000);
                     $('.second').css('display', 'none');

                     sc_n.add(sc_c).fadeOut(700,function(){sc_n.text('');sc_i.val('');});
                     t_s.css('pointer-events', 'auto').animate({opacity: '1'}, 1000);
                     sc_b.removeClass('subCatSelected').removeClass('subCatFade');
                  });

                  //Functions for second
                  sc_b.click(function() {
                     sc_i.val($(this).text());
                     sc_n.html($(this).html()).add(sc_c).fadeIn(1000);
                     t_s.animate({opacity: '0.5'}, 1000, function(){
                        $(this).css('pointer-events', 'none');
                     });
                     sc_b.removeClass('subCatSelected').addClass('subCatFade');
                     $(this).removeClass('subCatFade').addClass('subCatSelected');
                  });
                  sc_c.click(function() {
                     sc_n.add(sc_c).fadeOut(700,function(){sc_n.text('');sc_i.val('');});
                     t_s.css('pointer-events', 'auto').animate({opacity: '1'}, 1000);
                     sc_b.removeClass('subCatSelected').removeClass('subCatFade');
                  });
               });
            </script>

            <script>
            var currentTab = 0; // Current tab is set to be the first tab (0)
            showTab(currentTab); // Display the crurrent tab

            function showTab(n) {
               // This function will display the specified tab of the form...
               var x = document.getElementsByClassName("tab");
               x[n].style.display = "block";
               //... and fix the Previous/Next buttons:
               if (n == 0) {
                  document.getElementById("prevBtn").style.display = "none";
               } else {
                  document.getElementById("prevBtn").style.display = "inline";
               }
               if (n == (x.length - 1)) {
                  document.getElementById("nextBtn").innerHTML = "Submit";
               } else {
                  document.getElementById("nextBtn").innerHTML = "Next";
               }
               //... and run a function that will display the correct step indicator:
               fixStepIndicator(n)
            }

            function nextPrev(n) {
               // This function will figure out which tab to display
               var x = document.getElementsByClassName("tab");
               // Exit the function if any field in the current tab is invalid:
               // if (n == 1 && !validateForm()) return false;
               // Hide the current tab:
               x[currentTab].style.display = "none";
               // Increase or decrease the current tab by 1:
               currentTab = currentTab + n;
               // if you have reached the end of the form...
               if (currentTab >= x.length) {
                  // ... the form gets submitted:
                  document.getElementById("regForm").submit();
                  return false;
               }
               // Otherwise, display the correct tab:
               showTab(currentTab);
            }

            function validateForm() {
               // This function deals with validation of the form fields
               var x, y, i, valid = true;
               x = document.getElementsByClassName("tab");
               y = x[currentTab].getElementsByTagName("input");
               // A loop that checks every input field in the current tab:
               for (i = 0; i < y.length; i++) {
                  // If a field is empty...
                  if (y[i].value == "") {
                     // add an "invalid" class to the field:
                     y[i].className += " invalid";
                     // and set the current valid status to false
                     valid = false;
                  }
               }
               // If the valid status is true, mark the step as finished and valid:
               if (valid) {
                  document.getElementsByClassName("step")[currentTab].className += " finish";
               }
               return valid; // return the valid status
            }

            function fixStepIndicator(n) {
               // This function removes the "active" class of all steps...
               var i, x = document.getElementsByClassName("step");
               for (i = 0; i < x.length; i++) {
                  x[i].className = x[i].className.replace(" active", "");
               }
               //... and adds the "active" class on the current step:
               x[n].className += " active";
            }
            </script>
         </div>
      </div>
   </div>
</div>
@endsection
