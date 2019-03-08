<div class="canopyBody">
    <div class="canopyHeader">
        <div class="canopyHeaderBg">
            <img alt="" class="hidden" style="transform: none;">
            {{-- <img alt="" src="https://pbs.twimg.com/profile_banners/1083029497/1441112980/1500x500" style="transform: translate3d(0px, 27.0117px, 0px);"> --}}
        </div>
        <div class="col-1-main">
            <div class="canopyUserAvatar">
                <div class="canopyUserImage">
                    @if($userNameComposer->image_path)
                        <img src="{{ asset('storage/images/uploads/'.date_format(new DateTime($userNameComposer->created_at), 'Y').'/'.date_format(new DateTime($userNameComposer->created_at), 'm').'/'.$userNameComposer->image_path) }}" alt="User Image">
                        @else
                        <span class="image_text"></span>
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
