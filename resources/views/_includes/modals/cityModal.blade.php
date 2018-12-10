<div class="modal fade cityModal" id="m-city-modal" tabindex="-1" role="dialog" aria-labelledby="m-city-modal-label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header cityModal-header">
        <button data-ripple="rgba(255,0,0,0.5)" type="button" class="close cityModal-close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title" id="m-city-modal-label">Choose A City</h3>
      </div>
      <div class="modal-body cityModal-body">
        <form><!--  Add Other Attributes By Laravel -->
          <div class="form-group cityModal-form">
            <i class="fa fa-map-marker"></i>
            <input type="text" class="form-control" id="location" placeholder="Please Enter Your City Name">
            <!-- Use this position for suggestion of city while typing in input box -->
          </div>
        </form>
        <div class="cityModal-topCities col-xs-10 col-xs-offset-1 clearfix">
          <h4>Top Cities</h4>
          <div data-ripple="rgba(0,0,0,0.5)" class="cityCont text-trim selected">Delhi</div>
          <div data-ripple="rgba(0,0,0,0.5)" class="cityCont text-trim">Noida</div>
          <div data-ripple="rgba(0,0,0,0.5)" class="cityCont text-trim">Mumbai</div>
          <div data-ripple="rgba(0,0,0,0.5)" class="cityCont text-trim">Pune</div>
          <div data-ripple="rgba(0,0,0,0.5)" class="cityCont text-trim">Banglore</div>
          <div data-ripple="rgba(0,0,0,0.5)" class="cityCont text-trim">Vishakhapatannam</div>
          <div data-ripple="rgba(0,0,0,0.5)" class="cityCont text-trim">Chandigarh</div>
          <div data-ripple="rgba(0,0,0,0.5)" class="cityCont text-trim">Dehradun</div>
        </div>
      </div>
      <div class="modal-footer cityModal-footer">
          <!-- Use the modified Zendur site logo here -->
      </div>
    </div>
  </div>
</div>
