@if ($agent->isMobile())
  <!--SideNav Modal Starts Here-->
  @include('_includes.modals.sideNavModal')

  <!--City Modal Starts Here-->
  @include('_includes.modals.cityModal')

  <!--Search Modal Starts Here-->
  @include('_includes.modals.searchModal')
@endif
