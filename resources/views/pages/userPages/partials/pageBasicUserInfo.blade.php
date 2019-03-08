<div class="col-wall @if (Route::is('profilePage')) p-a-15 @else p-t-10 p-b-10 p-l-15 p-r-15 @endif">
    <div class="u-name-box m-t-5">
        <a class="u-name-lg text-trim l-h-1 p-b-5" href="{{ route('profilePage', $userNameComposer->username) }}">
            {{ $userNameComposer->fname .' '. $userNameComposer->lname }}
        </a>
        <span class="u-name-tick m-b-5" data-toggle="tooltip" data-placement="right" title="Verified Account">
            <img class="img-responsive" src="{{ asset('images/282944038008211-18X18.png') }}" alt="Verified tick">
        </span>
    </div>
    <div class="u-userName-lg"><a class="text-trim" href="{{ route('profilePage', $userNameComposer->username) }}">{{ '@'.$userNameComposer->username }}</a></div>
    @if (Route::is('profilePage'))
      {{-- <div class="m-b-5"><i class="fa fa-globe m-r-10"></i><span class="text-trim"><a href="https://www.narendramodi.in" target="_blank">narendramodi.in</a></span></div> --}}
      <div class="m-b-5 m-t-15"><i class="fa fa-map-marker m-r-10"></i><span class="text-trim">{{ $userNameComposer->city_name .', '. $userNameComposer->state_name }}</span></div>
      <div class="m-b-5"><i class="fa fa-calendar m-r-10"></i><span class="text-trim">Joined {{ Carbon\Carbon::parse($userNameComposer->profileCreated_at)->format('F Y') }}</span></div>
      <div class="m-b-5"><i class="fa fa-birthday-cake m-r-10"></i><span class="text-trim">Born {{ Carbon\Carbon::parse($userNameComposer->dob)->format('F d, Y') }}</span></div>
    @endif
</div>
