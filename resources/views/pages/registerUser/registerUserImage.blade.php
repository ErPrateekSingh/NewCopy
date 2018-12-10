@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropper/3.1.4/cropper.css">
<style>
   .tabHeader{font-size: 24px;}
   .tabWrapper {margin: 0 auto;border: 1px solid #eee;margin-top: 50px;text-align: center;display: block;padding-left: 0px;padding-right: 0px;width: 250px;height: 250px;}
   .tabButton{float: right;border: none;color: #ffffff;font-size: 18px;margin-top: 60px;padding: 8px 40px;margin-bottom: 20px;background-color: #4CAF50;}
   .tabButton:hover {opacity: 0.9;}
   .fa-user {font-size: 100px; margin-top: 30px; margin-bottom: 15px; color: #ddd;}
   .uploadButton {font-size: 18px; text-align: center; background-color: #f4545f; color: #fff; padding: 5px; margin-top: 20px; cursor: pointer; border-radius: 19px;}
   .uploadButton:hover {background-color: #f5454f;}
   #userImage {display: none;}
   select:required:invalid {color: gray;}
   option[value=""][disabled] {display: none;}
   option {color: black;}
   img {max-width: 100%;} /* This rule is very important, please do not ignore this! */
   #canvas {height: 250px; width: 250px; background-color: #ffffff; cursor: default;}
</style>
@endsection

@section('content')
<div class="container">
   <div class="row">
      <div class="col-md-10 col-md-offset-1 col-xs-12">
         <div class="panel panel-form clearfix" style="margin-top: 50px;border-color: #ccc;">
            <div class="panel-body">
               <div class="col-xs-10 col-xs-offset-1">
                  <form id="registerUserImage" class="form-horizontal clearfix" method="POST" action="{{ route('register.user.image') }}" role="form" enctype="multipart/form-data" novalidate>
                     {{ csrf_field() }}
                     <div class="tabHeader pull-left">User Image :</div>
                     <a href="{{ route('home') }}" class="pull-right m-t-10" style="cursor: pointer;">Skip this step <i class="fa fa-angle-double-right"></i></a>
                     <div class="col-sm-6 col-sm-offset-3 col-sm-offset-right-3 col-xs-12 clearfix">
                        <div class="tabWrapper clearfix">
                           <input type="hidden" name="cropped_value" id="cropped_value" value="">
                           <input id="userImage" type="file" name="userImage" accept="image/*">
                           <i class="fa fa-user"></i>
                           <span class="col-xs-12 uploadText" style="font-size: 22px; margin: 5px auto 20px;">Upload User Image</span>
                           <canvas id="canvas" style="display: none;">
                              Your browser does not support the HTML5 canvas element.
                           </canvas>
                        </div>
                        <div id="error_userImage" class="" style="text-align: center;margin-top: 20px;margin-bottom:  0px;"></div>
                        @if ($errors->has('userImage'))
                        <span class="help-block" style="margin-top: 20px; color: #ff4949; text-align: center; font-weight: bold; font-size: 14px;">
                           {{ $errors->first('userImage') }}
                        </span>
                        @endif
                     </div>
                     <button type="button" class="uploadButton flatButton col-sm-6 col-sm-offset-3 col-sm-offset-right-3 col-xs-12" onclick="chooseFile();" data-ripple>Choose Image</button>
                     <button type="submit" class="tabButton" data-ripple>Next</button>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropper/3.1.4/cropper.min.js"></script>
<script>
function chooseFile(){
   $("#userImage").click();
}

$(document).ready(function(){
   var valid = false;
   var canvas  = $("#canvas");
   context = canvas.get(0).getContext("2d");
   $('#userImage').on( 'change', function() {
      $(".help-block").text("");
      if (this.files && this.files[0]) {
         if ( this.files[0].type.match(/^image\//) ) {
            var reader = new FileReader();
            reader.onload = function(evt) {
               var img = new Image();
               var imgwidth = 0;
               var imgheight = 0;
               var minwidth = 250;
               var minheight = 250;
               img.onload = function() {
                  imgwidth = this.width;
                  imgheight = this.height;
                  if(imgwidth >= minwidth && imgheight >= minheight) {
                     $('.fa-user, .uploadText').hide();
                     $('.tabWrapper').css("border", "0");
                     $(".uploadButton").text('Choose Other Image');
                     $("#error_userImage").removeClass("error").text("");
                     canvas.show();
                     context.canvas.height = img.height;
                     context.canvas.width  = img.width;
                     context.drawImage(img, 0, 0);
                     // Destroy the old cropper instance
                     canvas.cropper('destroy');
                     // Replace url
                     canvas.attr('src', this.result);
                     var cropper = canvas.cropper({
                        viewMode: 3,
                        modal: false,
                        guides: false,
                        center: false,
                        restore: false,
                        autoCropArea: 1,
                        dragMode: 'move',
                        highlight: false,
                        cropBoxMovable: false,
                        cropBoxResizable: false,
                        crop: function(data){
                        var json = [ Math.round(data.width), Math.round(data.height), Math.round(data.x), + Math.round(data.y) ].join();
                        $('#cropped_value').val(json);
                        }
                     });
                     valid = true;
                  } else { $("#error_userImage").addClass("error").text("Minimum Image size must be 250px X 250px!"); }
               };
               img.src = evt.target.result;
            };
            reader.readAsDataURL(this.files[0]);
         } else { $("#error_userImage").addClass("error").text("Invalid file type! Please select an image file!"); }
      } else { $("#error_userImage").addClass("error").text("No file selected!"); }
   });

   $('#registerUserImage').on('submit', function(e){
      if(!valid) e.preventDefault();
   });
});
</script>
@endsection
