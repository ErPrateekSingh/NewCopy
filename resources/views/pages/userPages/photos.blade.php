@extends('layouts.app')

@section('title', 'Photos | '. $userNameComposer->fname .' '. $userNameComposer->lname .' (@'.$userNameComposer->username.')')

@section('styles')
<style media="screen">
  .photoPage-photoContainer {
    padding-left: 4px;
    padding-right: 4px;
  }
  .photoPage-photoContainer > ul > li {
    float: left;
    width: 180px;
    height: 180px;
    border: 1px solid #ccc;
  }
  .photoPage-photoContainer > ul > li > a > img {
    width: 100% !important;
    height: 100% !important;
    object-fit: cover;
  }
  .photoPage-photoContainer > button {
    width: 250px;
    margin: 0 auto;
    margin-top: 30px;
    margin-bottom: 10px;
  }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="canopy">

          <!-- Partial for pageHeader -->
          @include('pages.userPages.partials.pageHeader')

          <!-- Partial for pageNav -->
          @include('pages.userPages.partials.pageNav')

        </div>
        <div class="col-1-main" style="margin-top: 40px;">
            <div class="col-2-main m-r-10">
                <div class="col-2-main m-b-10">
                    <div class="col-2-2-side m-r-10">
                        <!-- Partial for basicUserInfo -->
                        @include('pages.userPages.partials.pageBasicUserInfo')
                    </div>
                    <div class="col-2-2-main">
                        <!-- Partial for pageFilterBox -->
                        @include('pages.userPages.partials.pageFilterBox')
                    </div>
                </div>
                <div class="col-2-main">
                  <div class="col-wall p-a-15">
                    <div class="h3 p-l-10 p-b-10 b-b-1 m-t-10 m-b-10">Photos</div>
                    <div class="photoPage-photoContainer p-t-15">
                      @if ($images->isEmpty())
                        <div class="text-center m-a-15 p-a-15"><div class="h1 p-a-15 color-ddd no-text-select">0 Photos</div></div>
                      @else
                        <ul class="no-list-style clearfix">
                          @foreach ($images as $image)
                            <li class="m-a-5">
                              <a href="{{ asset('storage/images/uploads/'.date_format(new DateTime($image->created_at), 'Y').'/'.date_format(new DateTime($image->created_at), 'm').'/'.$image->image_path) }}">
                                <img class="img-responsive" src="{{ asset('storage/images/uploads/'.date_format(new DateTime($image->created_at), 'Y').'/'.date_format(new DateTime($image->created_at), 'm').'/'.$image->image_path) }}" alt="image">
                              </a>
                            </li>
                          @endforeach
                        </ul>
                      @endif
                      @if ($images->isNotEmpty())
                        @if ($images->lastPage() > 1)
                          <div class="paginateContainer b-t-1 b-b-1 m-t-15 clearfix p-l-5">
                            <div class="paginatePageCount pull-left">
                              <div class="m-t-10 m-b-10 l-h-1">Page {{ $images->currentPage() }} of {{ $images->lastPage() }}</div>
                            </div>
                            <div class="paginateLinkBar pull-right">
                              {{ $images->links('vendor.pagination.custom-default') }}
                            </div>
                          </div>
                        @endif
                      @endif
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-2-side">
                <!-- Partial for miniFooter -->
                @include('pages.userPages.partials.pageRightSideBar')
                <!-- Partial for miniFooter -->
                @include('pages.userPages.partials.pageFooter')
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>

</script>
@endsection
