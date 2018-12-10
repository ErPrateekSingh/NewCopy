@extends('layouts.manage')

@section('content')
<div class="container-fluid">
   <div class="row">
      @include('_includes.nav.manageSideNav')
      <div id="dbWrapper">
         <div id="dbContent">
            <div class="container-fluid">
               <div class="row">
                  <div id="dbContent-header"><i class="fa fa-dashboard"></i>Dashboard</div>
                  <hr>
                  <div class="col-lg-3 col-xs-6">
                     <div class="small-box bg-aqua">
                        <div class="inner clearfix">
                           <h3>1056</h3>
                           <p><strong>New Views</strong></p>
                           <p class="m-b-5">Total Views : 10523</p>
                        </div>
                        <div class="icon"><i class="fa fa-users"></i></div>
                        <a href="performance.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                     </div>
                  </div>
                  <div class="col-lg-3 col-xs-6">
                     <div class="small-box bg-green">
                        <div class="inner clearfix">
                           <h3>245</h3>
                           <p><strong>New Reviews</strong></p>
                           <p class="m-b-5">Total Reviews : 2458</p>
                        </div>
                        <div class="icon"><i class="fa fa-star-half-empty"></i></div>
                        <a href="reviews.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                     </div>
                  </div>
                  <div class="col-lg-3 col-xs-6">
                     <div class="small-box bg-yellow">
                        <div class="inner clearfix">
                           <h3>104</h3>
                           <p><strong>New Queries</strong></p>
                           <p class="m-b-5">Total Queries : 1542</p>
                        </div>
                        <div class="icon"><i class="fa fa-comments"></i></div>
                        <a href="queries.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                     </div>
                  </div>
                  <div class="col-lg-3 col-xs-6">
                     <div class="small-box bg-red">
                        <div class="inner clearfix">
                           <h3>2568</h3>
                           <p><strong>New Likes</strong></p>
                           <p class="m-b-5">Total Likes : 245875</p>
                        </div>
                        <div class="icon"><i class="fa fa-thumbs-o-up"></i></div>
                        <a href="performance.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                     </div>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     <div class="graphWrapper">
                        <div class="graphHeader">
                           <span class="graphHeading"><i class="fa fa-bar-chart m-r-10"></i>Views</span>
                           <div class="btn-group pull-right">
                              <button type="button" class="actionButton dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Select Range<span class="caret m-l-5"></span></button>
                              <ul class="dropdown-menu pull-right dropDownAction" role="menu">
                                 <li onclick="drawItems(7)" style="cursor:pointer;"><a>Last 7 days</a></li>
                                 <li onclick="drawItems(30)" style="cursor:pointer;"><a>Last 30 days</a></li>
                                 <li onclick="drawItems(90)" style="cursor:pointer;"><a>Last 90 days</a></li>
                              </ul>
                           </div>
                        </div>
                        <div class="graphBody" style="padding-bottom: 20px;">
                           <div id="lineChart"></div>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-6 col-sm-12 col-xs-12">
                     <div class="queryWrapper">
                        <div class="queryHeader">
                           <span class="queryHeading"><i class="fa fa-comments m-r-10"></i>Queries</span>
                        </div>
                        <div class="queryBody">
                           <div class="queryInner">
                              @for ($i = 0; $i < 4; $i++)
                              <div class="queryItem clearfix">
                                 <span class="queryUserImage" style="background-image: url({{ asset('images/userImage44.jpg') }});"></span>
                                 <div class="queryItemHeader">
                                    <span class="queryUserName">Prateek Singh</span>
                                    <span class="queryTime pull-right"><i class="fa fa-clock-o m-r-5"></i>Today, 12:10 A.M.</span>
                                 </div>
                                 <div class="queryItemBody">
                                    <p class="queryMassage">
                                       I would like to meet you to discuss the latest news about the arrival of the new theme. They say it is going to be one the best themes on the market.
                                    </p>
                                 </div>
                                 <div class="queryItemReplyBody clearfix">
                                    <a href="#" class="pull-right" id="replyText"><i class="fa fa-reply m-r-5"></i>Reply</a>
                                 </div>
                              </div>
                              <div class="divider"></div>
                              <div class="queryItem clearfix">
                                 <span class="queryUserImage" style="background-image: url({{ asset('images/userImage44.jpg') }});"></span>
                                 <div class="queryItemHeader">
                                    <span class="queryUserName">Prateek Singh</span>
                                    <span class="queryTime pull-right"><i class="fa fa-calendar m-r-5"></i>25 July 2015</span>
                                 </div>
                                 <div class="queryItemBody">
                                    <p class="queryMassage">I would like to meet you to discuss the latest news about the arrival of the new theme. They say it is going to be one the best themes on the market.</p>
                                 </div>
                                 <div class="queryItemReplyBody clearfix">
                                    <a href="#" class="pull-right" id="replyText"><i class="fa fa-reply m-r-5"></i>Reply</a>
                                 </div>
                              </div>
                              <div class="divider"></div>
                              @endfor
                           </div>
                        </div>
                        <div class="queryBottom">
                           <a href="queries.php">View All Queries</a>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-6 col-sm-12 col-xs-12">
                     <div class="reviewWrapper">
                        <div class="reviewHeader">
                           <span class="reviewHeading"><i class="fa fa-star-half-empty m-r-10"></i>Reviews</span>
                        </div>
                        <div class="reviewBody">
                           <div class="reviewInner">
                              @for ($i = 0; $i < 4; $i++)
                              <div class="reviewItem clearfix">
                                 <span class="reviewUserImage" style="background-image: url({{ asset('images/userImage44.jpg') }});"></span>
                                 <div class="reviewItemHeader">
                                    <span class="reviewUserName">Prateek Singh</span>
                                    <span class="reviewTime pull-right"><i class="fa fa-clock-o m-r-5"></i> Yesterday, 12:10 A.M.</span>
                                 </div>
                                 <div class="reviewItemStars">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                 </div>
                                 <div class="reviewItemBody">
                                    <p class="reviewMassage">
                                       I would like to meet you to discuss the latest news about the arrival of the new theme. They say it is going to be one the best themes on the market.
                                    </p>
                                 </div>
                              </div>
                              <div class="divider"></div>
                              @endfor
                           </div>
                        </div>
                        <div class="reviewBottom">
                           <a href="reviews.php">View All Reviews</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
	<script type="text/javascript" src="assets/js/script/sidebarMenu.js"></script>

	<!--<script type="text/javascript" src="assets/js/chart.min.js"></script><script type="text/javascript" src="assets/js/script/graphApp.js"></script<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>>-->


	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
	<script type="text/javascript">
		google.load("visualization", "1", {packages:["corechart"]});
		google.setOnLoadCallback(drawChart);
		function drawChart() {
			var data = google.visualization.arrayToDataTable([ ['Date', 'Views']
			<?php
			//$results = $mainfunctions->AdminViews();
			if(!empty($results)){
				foreach($results as $row) {
					$vDate = str_replace("-",", ",$row['visit_date_time']);
					echo ",[new Date('".$vDate."'),".$row['count']."]";
				}
			} ?> ]);

			var options = {
				pointSize: 5,
				legend: { position: 'top', alignment: 'end' },
				hAxis: { format: 'MMM dd', gridlines: {count: 5, color: 'none'} },
				vAxis: { minValue: 0 }
			};
			var chart = new google.visualization.LineChart(document.getElementById("lineChart"));
			chart.draw(data, options);
		}

		function drawItems(num) {
			if(num===7){var c = 7;$(".actionButton").html('Last 7 days<span class="caret"style=" margin-left: 5px;"></span>');}
			else if(num===30){var c = 5;$(".actionButton").html('Last 30 days<span class="caret"style=" margin-left: 5px;"></span>');}
			else if(num===90){var c = 10;$(".actionButton").html('Last 90 days<span class="caret"style=" margin-left: 5px;"></span>');}
			var jsonLineChartData = $.ajax({
			  url: "backend/lineChartData.php",
			  data: "q="+num,
			  dataType:"json",
			  async: false
			}).responseText;

			var linechartdata = new google.visualization.DataTable(jsonLineChartData);
			var options = {
				pointSize: 5,
				legend: { position: 'top', alignment: 'end' },
				hAxis: { format: 'MMM dd', gridlines: {count: c, color: 'none'} },
				vAxis: { minValue: 0 }
			};
			var chart = new google.visualization.LineChart(document.getElementById('lineChart'));
			chart.draw(linechartdata, options);
		}
	</script>

@endsection
