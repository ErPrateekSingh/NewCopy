@extends('layouts.app')

@section('title', 'Page Category')

@section('styles')
<style>
.alert {display: none;}
.panel-head{color: #fff;width: 100%;height: 44px;padding: 5px;font-size: 22px;margin-top: -30px;padding-left: 30px;background-color: #f4545f;border-bottom: 1px solid #f5454f;}
.panel.panel-form .help-block {color: #777;font-size: 12px;margin-top: 0px;font-weight: 500;margin-bottom: 20px;}
.categoryBox, .subCategoryBox {cursor: pointer;margin: 6px 4px;font-size: 14px;border: 1px solid;padding: 10px 15px;border-color: #ccc;display: inline-block;width: calc(25% - 11px);}
.categoryBox:hover, .subCategoryBox:hover {color: #555;border-color: rgba(244, 84, 95, 0.4);background-color: rgba(244, 84, 95, 0.05);}
#changeCategory ,#changeSubCategory {float: right;margin-right: 15px;cursor: pointer;color: #3097D1;}
#changeCategory:hover,#changeSubCategory:hover {color: #158dd0;}
#categoryName, #subCategoryName{width: 60%;float: right;}
/* .subCatSelected, .subCatSelected:hover {color: #444;border-color: rgba(0, 131, 0, 0.6);background-color: rgba(0, 131, 0, 0.25);} */
/* .subCatFade { opacity: 0.5;} */
.tabButton{float: right;border: none;color: #ffffff;font-size: 18px;margin-top: 60px;padding: 8px 40px;margin-bottom: 20px;background-color: #4CAF50;}
.tabButton:hover {opacity: 0.8;}
</style>
@endsection

@section('content')
<div class="container-fluid">
   <div class="row">
      <div class="col-1-main">
         <div class="panel panel-form p-t-0">
            <div class="panel-head m-t-0"><i class="fa fa-plus-circle m-r-10"></i>Add New Listing</div>
            <div class="panel-body">
               <form id="registerPageCategory" class="form-horizontal clearfix" method="POST" action="{{ route('register.page.category') }}" role="form" novalidate>
                  {{ csrf_field() }}
                  <div class="m-a-10 p-a-10">
                    <div class="alert" role="alert" @if ($errors->has('category') || $errors->has('subCategory')) style="display: block;" @endif>
                      <strong>{{ $errors->first('category') }}<br>{{ $errors->first('subCategory') }}</strong>
                    </div>
                     <div class="h3">
                        <div class="first">Select Category :<span class="helpLink" data-toggle="tooltip" data-placement="top" title="Quick Help"><i class="fa fa-question-circle" data-ripple></i></span></div>
                        <div class="showCategoryName p-a-15 b-a-1" style="margin-bottom: 50px; display:none;">Category:
                          <div id='changeCategory' data-ripple data-toggle="tooltip" data-placement="top" title="Edit"><i class='fa fa-pencil'></i></div>
                          <div id="categoryName" class=" h4 m-a-5 text-trim"></div>
                        </div>
                     </div>
                     <div class="b-b-1 first m-t-15 m-b-15 m-l-0 m-r-0"></div>
                     <div class="first">
                        <div class="help-block p-t-5 p-b-5">
                          Choose a category that describes your business/profession best. If your desired category is not listed here, Then choose 'Other' and proceed.
                        </div>
                        <input type="hidden" name="category" id="categoryInput" value="">
                        @foreach($categories as $categories)
                           <div class="categoryBox text-trim" data-value="{{$categories->id}}" title="{{$categories->name}}"><i class="fa fa-{{$categories->icon}} m-r-10"></i>{{$categories->name}}</div>
                        @endforeach
                           <div class="categoryBox text-trim" data-value="100" title="Add New Category"><i class="fa fa-plus m-r-10"></i>Other</div>
                     </div>

                     <div class="h3 clearfix">
                        <div class="second" style="display:none;">Select Sub-Category:<span class="helpLink" data-toggle="tooltip" data-placement="top" title="Quick Help"><i class="fa fa-question-circle" data-ripple></i></span></div>
                        <div class="showSubCategoryName p-a-15 b-a-1" style="margin-bottom: 50px; display:none;">Sub-Category:
                          <div id='changeSubCategory' data-ripple data-toggle="tooltip" data-placement="top" title="Edit"><i class='fa fa-pencil'></i></div>
                          <div id="subCategoryName" class=" h4 m-a-5 text-trim"></div>
                        </div>
                     </div>
                     <div class="b-b-1 second m-t-15 m-b-15 m-l-0 m-r-0" style="display:none;"></div>
                     <div class="second" style="display:none;">
                        <div class="help-block p-t-5 p-b-5">
                          Choose a sub-category that describes your business/profession best. If your desired sub-category is not listed here, Then choose 'Other' and proceed.
                        </div>
                        <input type="hidden" name="subCategory" id="subCategoryInput" value="">
                        <div id="subCatBox"></div>
                        <div class="loaderImage" style="width: 100%; height: 200px; text-align: center; font-size: 36px; padding-top: 60px;"><i class="fa fa-refresh fa-spin" style="display: block; margin-bottom: 15px;"></i><span>Please Wait...</span></div>
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
  function validateForm() {
      var valid = true;
      var catValue = $("#categoryInput").val();
      var subCatValue = $("#subCategoryInput").val();
      if (catValue != "") {
        if (catValue != "100"){
          if (subCatValue != "") {
            valid = true;
          } else {
            $(".alert").addClass("alert-danger").removeClass('alert-success').html("<strong>Please select a Sub-Category!</strong>").css({'display' : 'block'}).animate({height: '100%', opacity: '1'}, 1000);
            valid = false;
          }
        } else {
          valid = true;
        }
      } else {
        $(".alert").addClass("alert-danger").removeClass('alert-success').html("<strong>Please select a Category!</strong>").css({'display' : 'block'}).animate({height: '100%', opacity: '1'}, 1000);
        valid = false;
      }
      return valid;
  }

  function ajaxGetSubCategory() {
      $('.loaderImage').show();
      var category = 'id=' + $('#categoryInput').val();
      $.ajax({
          type: 'POST',
          url: "/get/subcategory",
          data: category,
          success: function(data) {
              if (data) {
                  $("#subCatBox").empty();
                  $.each(data, function(value) {
                      $("#subCatBox").append('<div class="subCategoryBox text-trim" data-value="' + data[value].id + '" title="' + data[value].name + '"><i class="fa fa-'+ data[value].icon +' m-r-10"></i>' + data[value].name + '</div>');
                      $('.loaderImage').hide();
                  });
                  $("#subCatBox").append('<div class="subCategoryBox text-trim" data-value="100" title="Add New Sub-Category"><i class="fa fa-plus m-r-10"></i>Other</div>');
              } else {
                  $("#subCatBox").empty();
              }
          }
      });
  }

   $(document).ready(function(){
      // Variables for first
      var t_f = $('.first');
      var c_b = $('.categoryBox');
      var c_n = $('#categoryName');
      var c_i = $('#categoryInput');
      var c_c = $('#changeCategory');
      var s_cn = $('.showCategoryName');

      //Functions for first
      c_b.click(function() {
         var catVal = $(this).data('value');
         c_i.val(catVal);
         if (catVal != 100) {
           $(".alert").animate({height: '0px', opacity: '0'}, 1000, function(){
             $(this).css('display', 'none');
           });
           ajaxGetSubCategory();
         } else {
           $(".alert").addClass('alert-success').removeClass("alert-danger").html("<strong>Please proceed to next step to Specify your Business Category.</strong>").css({'display' : 'block'}).animate({height: '100%', opacity: '1'}, 1000);
         }
         c_n.html($(this).html());
         s_cn.fadeIn(1000);
         t_f.animate({height: '0px', opacity: '0'}, 1000, function(){
            $(this).css('display', 'none');
         });
         if(catVal != '100'){
            $('.second').delay(200).fadeIn(1000);
         }
      });

      c_c.click(function() {
         s_cn.css({'display' : 'none'});
         c_n.html('');
         c_i.val('');
         $(".alert").animate({height: '0px', opacity: '0'}, 1000, function(){
            $(this).css('display', 'none');
         });
         t_f.css({'display' : 'block'}).animate({height: '100%', opacity: '1'}, 1000);
         $('.second').css('display', 'none');
         ss_cn.css({'display' : 'none'});
         sc_n.html('');
         sc_i.val('');
         t_s.css('pointer-events', 'auto').animate({opacity: '1'}, 1000);
         // sc_b.removeClass('subCatSelected').removeClass('subCatFade');
      });

      // Variables for second
      var t_s = $('.second');
      var sc_bp = $('#subCatBox');
      var sc_b = $('.subCategoryBox');
      var sc_n = $('#subCategoryName');
      var sc_i = $('#subCategoryInput');
      var sc_c = $('#changeSubCategory');
      var ss_cn = $('.showSubCategoryName')

      //Functions for second
      sc_bp.on('click', '.subCategoryBox', function() {
         sc_i.val($(this).data('value'));
         sc_n.html($(this).html());
         ss_cn.fadeIn(1000);
         if ($(this).data('value') != 100) {
           $(".alert").animate({height: '0px', opacity: '0'}, 500, function(){
             $(this).css('display', 'none');
           });
         } else {
           $(".alert").addClass('alert-success').removeClass("alert-danger").html("<strong>Please proceed to next step to Specify your Business Sub-Category.</strong>").css({'display' : 'block'}).animate({height: '100%', opacity: '1'}, 1500);
         }
         $('.h3 > .second').animate({height: '0px', opacity: '0'}, 1000, function(){
            $('.h3 > .second').css('display', 'none');
         });
         t_s.animate({height: '0px', opacity: '0'}, 1000, function(){
            t_s.css('display', 'none');
         });
         // t_s.animate({opacity: '0.5'}, 1000, function(){
         //    $(this).css('pointer-events', 'none');
         // });
         // sc_b.removeClass('subCatSelected').addClass('subCatFade');
         // $(this).removeClass('subCatFade').addClass('subCatSelected');
      });
      sc_c.click(function() {
         ss_cn.css({'display' : 'none'});
         sc_n.html('');
         sc_i.val('');
         $(".alert").animate({height: '0px', opacity: '0'}, 500, function(){
           $(this).css('display', 'none');
         });
         $('.h3 > .second').css({'display' : 'block'}).animate({height: '100%', opacity: '1'}, 1000);
         t_s.css({'display' : 'block', 'pointer-events': 'auto'}).animate({height: '100%', opacity: '1'}, 1000);
         // sc_b.removeClass('subCatSelected').removeClass('subCatFade');
      });

      $('#registerPageCategory').on('submit', function(e) {
          if (!validateForm()) e.preventDefault();
      });
   });
</script>
@endsection
