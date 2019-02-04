@extends('layouts.app')

@section('styles')
<style>
.panel-head{
   color: #fff;
   width: 100%;
   height: 44px;
   padding: 5px;
   font-size: 22px;
   margin-top: -30px;
   padding-left: 30px;
   background-color: #f4545f;
   border-bottom: 1px solid #f5454f;
}
.panel.panel-form .help-block {
   color: #777;
   font-size: 12px;
   margin-top: 0px;
   font-weight: 500;
   margin-bottom: 20px;
}
.tabWrapper {width: 100%; padding: 20px;}
.tabHeader{font-size: 24px;}
.categoryBox, .subCategoryBox {
   cursor: pointer;
   margin: 6px 4px;
   font-size: 14px;
   border: 1px solid;
   padding: 10px 15px;
   border-color: #ccc;
   display: inline-block;
   width: calc(25% - 11px);
}
.categoryBox:hover, .subCategoryBox:hover {
   color: #555;
   border-color: rgba(244, 84, 95, 0.6);
   background-color: rgba(244, 84, 95, 0.25);
}
#changeCategory ,
#changeSubCategory {
   float: right;
   margin-right: 15px;
   cursor: pointer;
   color: #3097D1;
}
#changeCategory:hover,
#changeSubCategory:hover {
   color: #158dd0;
}
#categoryName, #subCategoryName{
   float: right;
   width: 60%;
}
.subCatSelected, .subCatSelected:hover {
   color: #444;
   border-color: rgba(0, 131, 0, 0.6);
   background-color: rgba(0, 131, 0, 0.25);
}
.subCatFade {
   opacity: 0.5;
}
.tabButton{float: right;border: none;color: #ffffff;font-size: 18px;margin-top: 60px;padding: 8px 40px;margin-bottom: 20px;background-color: #4CAF50;}
.tabButton:hover {opacity: 0.8;}

   /*.form-group-mat {margin-top: 60px;}
   select:required:invalid {color: gray;}
   option[value=""][disabled] {display: none;}
   option {color: black;}*/
</style>
<style>
/* Hide all steps by default: */
/*.tab {
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

#nextBtn {
   background-color: #4CAF50;
   color: #ffffff;
   border: none;
   padding: 10px 20px;
   font-size: 16px;
}
button {
   background-color: #4CAF50;
   color: #ffffff;
   border: none;
   padding: 10px 20px;
   font-size: 17px;
   font-family: Raleway;
   cursor: pointer;
}

button:hover {
   opacity: 0.8;
}

#prevBtn {
   background-color: #bbbbbb;
}

 Make circles that indicate the steps of the form:
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

/* Mark the steps that are finished and valid:
.step.finish {
   background-color: #4CAF50;
}*/
</style>
@endsection

@section('content')
<div class="container">
   <div class="row">
      <div class="col-md-10 col-md-offset-1 col-xs-12">
         <div class="panel panel-form clearfix" style="margin-top: 50px;">
            <div class="panel-head"><i class="fa fa-plus-circle m-r-10"></i>Add New Listing</div>
            <div class="panel-body">
               <form id="registerProfileCategory" class="form-horizontal clearfix" method="POST" action="{{ route('register.user.details') }}" role="form" novalidate>
                  {{ csrf_field() }}
                  <div class="tabWrapper clearfix">
                     <div class="tabHeader clearfix">
                        <div class="first">Select Category :<span class="helpLink"><i class="fa fa-question-circle" data-ripple></i></span></div>
                        <div class="showCategoryName" style="background: antiquewhite; padding: 10px;margin-bottom: 20px;display:none;">Category:<div id='changeCategory' data-ripple><i class='fa fa-pencil'></i></div><div id="categoryName"></div></div>
                     </div>
                     <div class="divider first" style="margin: 10px 0px 20px;"></div>
                     <div class="first">
                        <div class="help-block">Choose a category that describes your business/profession best.
                           If your desired category is not listed here, Then choose 'Other' and specify your category in the textbox.
                        </div>
                        <input type="hidden" name="category" id="categoryInput" value="">
                        @foreach($categories as $categories)
                           <div class="categoryBox text-trim" data-value="{{$categories->id}}" title="{{$categories->category_name}}"><i class="fa {{$categories->category_icon}} m-r-10"></i>{{$categories->category_name}}</div>
                        @endforeach
                           <div class="categoryBox text-trim" data-value="100" title="Add New Category"><i class="fa fa-plus m-r-10"></i>Other</div>
                     </div>

                     <div class="tabHeader clearfix">
                        <div class="second" style="display:none;">Select Sub-Category:<span class="helpLink"><i class="fa fa-question-circle" data-ripple></i></span></div>
                        <div class="showSubCategoryName" style="background: antiquewhite; padding: 10px;margin-bottom: 20px;display:none;">Sub-Category:<div id='changeSubCategory' data-ripple><i class='fa fa-pencil'></i></div><div id="subCategoryName"></div></div>
                     </div>
                     <div class="divider second" style="margin: 10px 0px 20px; display:none;"></div>
                     <div class="second" style="display:none;">
                        <div class="help-block">Choose a sub-category that describes your business/profession best.
                           If your desired sub-category is not listed here, Then choose 'Other' and specify your sub-category in the textbox.
                        </div>
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
                        <div class="subCategoryBox"><i class="fa fa-coffee m-r-10"></i>Tea &amp; Coffee</div>
                        <div class="subCategoryBox"><i class="fa fa-bus m-r-10"></i>Travel &amp; Tour</div>
                        <div class="subCategoryBox"><i class="fa fa-plus m-r-10"></i>Other</div>
                     </div>

                     <div class="tabWrapper otherCat" style="display:none; margin-top:20px;">
                        <div class="form-group form-group-mat{{ $errors->has('pName') ? ' has-error' : '' }}">
                           <input id="pName" type="text" class="form-control" name="pName" value="{{ old('pName') }}" required spellcheck="false">
                           <label for="pName" class="control-label"><i class="fa fa-plus m-r-5"></i> Please specify your Category</label><i class="bar"></i>
                           <div id="error_pName" class=""></div>
                           @if ($errors->has('pName'))
                              <span class="help-block"> {{ $errors->first('pName') }} </span>
                           @endif
                        </div>
                        <div class="help-block" style="margin-top:30px;">Please  specify your category in the textbox above.
                        </div>
                     </div>
                     <button type="submit" class="tabButton" data-ripple>Next</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection

@section('scripts')
<script>
   $(document).ready(function(){
      // Variables for first
      var t_f = $('.first');
      var c_b = $('.categoryBox');
      var c_n = $('#categoryName');
      var c_i = $('#categoryInput');
      var c_c = $('#changeCategory');
      var s_cn = $('.showCategoryName');

      // Variables for second
      var t_s = $('.second');
      var sc_b = $('.subCategoryBox');
      var sc_n = $('#subCategoryName');
      var sc_i = $('#subCategoryInput');
      var sc_c = $('#changeSubCategory');
      var ss_cn = $('.showSubCategoryName')

      //Functions for first
      c_b.click(function() {
         var catVal = $(this).data('value');
         c_i.val(catVal);
         c_n.html($(this).html());
         s_cn.fadeIn(1000);
         $('.divider.first').css('display', 'none');
         t_f.animate({height: '0px', opacity: '0'}, 1000, function(){
            $(this).css('display', 'none');
         });
         if(catVal == '100'){
            $('.otherCat').delay(200).fadeIn(1200);
         } else {
            $('.second').delay(200).fadeIn(1000);
         }
      });

      c_c.click(function() {
         s_cn.css({'display' : 'none'});
         c_n.html('');
         c_i.val('');
         t_f.css({'display' : 'block'}).animate({height: '100%', opacity: '1'}, 1000);
         $('.second').css('display', 'none');
         ss_cn.css({'display' : 'none'});
         sc_n.html('');
         sc_i.val('');
         t_s.css('pointer-events', 'auto').animate({opacity: '1'}, 1000);
         sc_b.removeClass('subCatSelected').removeClass('subCatFade');
      });

      //Functions for second
      sc_b.click(function() {
         sc_i.val($(this).text());
         sc_n.html($(this).html());
         ss_cn.fadeIn(1000);
         $('.divider.second').css('display', 'none');
         $('.tabHeader > .second').animate({height: '0px', opacity: '0'}, 1000, function(){
            $('.tabHeader > .second').css('display', 'none');
         });
         t_s.animate({opacity: '0.5'}, 1000, function(){
            $(this).css('pointer-events', 'none');
         });
         sc_b.removeClass('subCatSelected').addClass('subCatFade');
         $(this).removeClass('subCatFade').addClass('subCatSelected');
      });
      sc_c.click(function() {
         ss_cn.css({'display' : 'none'});
         sc_n.html('');
         sc_i.val('');
         $('.tabHeader > .second').css({'display' : 'block'}).animate({height: '100%', opacity: '1'}, 1000);
         t_s.css({'display' : 'block', 'pointer-events': 'auto'}).animate({opacity: '1'}, 1000);
         sc_b.removeClass('subCatSelected').removeClass('subCatFade');
      });
   });
</script>
@endsection
