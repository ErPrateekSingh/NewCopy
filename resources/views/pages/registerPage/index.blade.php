@extends('layouts.app')

@section('title', 'Add Free Listing')

@section('styles')
<style>
</style>
@endsection

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-full col-light">
        <div class="col-1-main">
          <div class="col-half p-a-15" style="margin-top: 40px;">
            <div class="h1 color-dark p-a-15 m-a-15">Grow your business with your free {{ $siteName }} page</div>
            <div class="p font-16 m-a-15 p-a-15">Millions of people are on {{ $siteName }} looking for businesses like yours. Show them why they should choose you. Join the community and start telling your story your way: Upload photos, respond to reviews, update your business info, and more.</div>
            <div class="text-center">
              <a data-ripple class="btn btn-lg button flatButton btn-red m-t-15 m-b-15" href="{{ route('register.page.category') }}">Add Free Listing Now</a>
            </div>
          </div>
          <div class="col-half">
            <div style="background-image: url({{ asset("images/bg_desktop.png") }});width: 100%;position: relative;background-size: cover;background-position: center;background-repeat: no-repeat;height: 450px;"></div>
          </div>
        </div>
      </div>

      <div class="col-full col-light b-t-1">
        <div class="p font-16 m-a-15 p-a-15 text-center">Stand out to a community of millions of people ready to buy, visit, and hire.</div>
        <div class="text-center h2 m-a-15"><i class="fa fa-angle-down"></i></div>
        <div class="col-1-main p-b-15 m-b-15">
          <div class="col-half p-a-15" style="margin-top: 90px;">
            <div class="h1 color-dark p-a-15 m-a-15">Help people get to know you</div>
            <div class="p font-16 m-a-15 p-a-15">Manage your page and update info like hours and phone number so people can find you. Add photos to showcase the best of your business.</div>
          </div>
          <div class="col-half p-a-15">
            <div style="background-image: url({{ asset("images/biz_cons_app.png") }});width: 100%;position: relative;background-size: contain;background-position: center;background-repeat: no-repeat;height: 500px;"></div>
          </div>
        </div>
      </div>

      <div class="col-full col-dark b-t-1">
        <div class="col-1-main p-b-15 m-b-15">
          <div class="col-half p-a-15">
            <div style="background-image: url({{ asset("images/reviews_biz_app.png") }});width: 100%;position: relative;background-size: contain;background-position: center;background-repeat: no-repeat;height: 500px;"></div>
          </div>
          <div class="col-half p-a-15" style="margin-top: 90px;">
            <div class="h1 color-dark p-a-15 m-a-15">Make customers happy</div>
            <div class="p font-16 m-a-15 p-a-15">Stay on top of feedback and respond to reviews as soon as they come in. Engage with your customers and keep them coming back.</div>
          </div>
        </div>
      </div>

      <div class="col-full col-light b-t-1">
        <div class="col-1-main p-b-15 m-b-15">
          <div class="col-half p-a-15" style="margin-top: 90px;">
            <div class="h1 color-dark p-a-15 m-a-15">Get the info you need</div>
            <div class="p font-16 m-a-15 p-a-15">See what’s happening on your page in real time. Track clicks, calls, page visits - and learn more about your potential customers.</div>
          </div>
          <div class="col-half p-a-15">
            <div style="background-image: url({{ asset("images/activity_biz_app.png") }});width: 100%;position: relative;background-size: contain;background-position: center;background-repeat: no-repeat;height: 500px;"></div>
          </div>
        </div>
      </div>

      <div class="col-full col-dark b-t-1">
        <div class="col-1-main p-b-15 m-b-15">
          <div class="col-half p-a-15">
            <div style="background-image: url({{ asset("images/raq_cons_app.png") }});width: 100%;position: relative;background-size: contain;background-position: center;background-repeat: no-repeat;height: 500px;"></div>
          </div>
          <div class="col-half p-a-15" style="margin-top: 90px;">
            <div class="h1 color-dark p-a-15 m-a-15">Connect with your community</div>
            <div class="p font-16 m-a-15 p-a-15">Turn page visitors into customers. Let them get quotes, make appointments, or ask questions right from your business page.</div>
          </div>
        </div>
      </div>

      <div class="col-full col-light b-t-1">
        <div class="col-1-main">
          <div class="text-center p-a-15" style="margin-top: 50px;">
            <div class="h1 color-dark p-a-15 m-a-15">Manage your free {{ $siteName }} page</div>
            <div class="p font-16 m-a-15 p-b-15">Reach more customers on the #1 ranked review site for finding local businesses.</div>
            <div><a data-ripple class="btn btn-lg button flatButton btn-red m-t-15 m-b-15" href="{{ route('register.page.category') }}">Add Free Listing Now</a></div>
          </div>
        </div>
      </div>

    </div>
  </div>
@endsection

@section('scripts')
</script>
@endsection
