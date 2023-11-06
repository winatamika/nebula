@extends('layouts.admin')

@section('content')

	<!-- CONTENT -->
	<div class="main-content">
		
		<!-- Table -->
		<h2>Calendar View of Availability</h2>

		<hr>

		<div class="row">
			<div class="col-md-3">
				<select class="form-control">
				<?php
					$xdate = date("Y");
					$maxdate = $xdate+5;

					for($x=$xdate;$x<=$maxdate;$x++){
						echo"<option>".$x."</option>";
					}
				?>
				  
				</select>
			</div>

			<div class="col-md-3">
				<select class="form-control">

				
				@foreach ($roomsList as $room)
			
				  <option>{{ $room->name_room }}</option>

				@endforeach
				</select>
			</div>

			<!-- <div class="col-md-3">
				<select class="form-control">
				  <option>1</option>
				  <option>2</option>
				  <option>3</option>
				  <option>4</option>
				  <option>5</option>
				</select>
			</div> -->
			
			<div class="col-md-3">
				<button type="submit" class="btn btn-default">Search</button>
			</div>

		</div>

		<hr>

		<?php
			$events = array(
		        "2014-04-09 10:30:00" => array(
		            "Event 1",
		            "Event 2 <strong> with html</stong>",
		        ),
		        "2014-04-12 14:12:23" => array(
		            "Event 3",
		        ),
		        "2014-05-14 08:00:00" => array(
		            "Event 4",
		        ),
		    );

		    $cal = Calendar::make();
		    /**** OPTIONAL METHODS ****/
		    $cal->setDate(Input::get('cdate')); //Set starting date
		    $cal->setBasePath('/nebula/public/calendar'); // Base path for navigation URLs
		    $cal->showNav(true); // Show or hide navigation
		    $cal->setView(Input::get('cv')); //'day' or 'week' or null
		    $cal->setStartEndHours(8,20); // Set the hour range for day and week view
		    $cal->setTimeClass('ctime'); //Class Name for times column on day and week views
		    $cal->setEventsWrap(array('<p>', '</p>')); // Set the event's content wrapper
		    $cal->setDayWrap(array('<div>','</div>')); //Set the day's number wrapper
		    $cal->setNextIcon('>>'); //Can also be html: <i class='fa fa-chevron-right'></i>
		    $cal->setPrevIcon('<<'); // Same as above
		    $cal->setDayLabels(array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat')); //Label names for week days
		    $cal->setMonthLabels(array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December')); //Month names
		    $cal->setDateWrap(array('<div>','</div>')); //Set cell inner content wrapper
		    $cal->setTableClass('table'); //Set the table's class name
		    $cal->setHeadClass('table-header'); //Set top header's class name
		    $cal->setNextClass('btn'); // Set next btn class name
		    $cal->setPrevClass('btn'); // Set Prev btn class name
		    $cal->setEvents($events); // Receives the events array
		    /**** END OPTIONAL METHODS ****/

		    echo $cal->generate() // Return the calendar's html;
		?>

		<table class="table table-hover table-bordered calendarView">
		  <thead>
		  	<tr>
		  		<th>Month</th>
		  		<th class="bgOrange">Su</th>
		  		<th>Mo</th>
		  		<th>Tu</th>
		  		<th>We</th>
		  		<th>Th</th>
		  		<th>Fr</th>
		  		<th class="bgOrange">Sa</th>

		  		<th class="bgOrange">Su</th>
		  		<th>Mo</th>
		  		<th>Tu</th>
		  		<th>We</th>
		  		<th>Th</th>
		  		<th>Fr</th>
		  		<th class="bgOrange">Sa</th>

		  		<th class="bgOrange">Su</th>
		  		<th>Mo</th>
		  		<th>Tu</th>
		  		<th>We</th>
		  		<th>Th</th>
		  		<th>Fr</th>
		  		<th class="bgOrange">Sa</th>

		  		<th class="bgOrange">Su</th>
		  		<th>Mo</th>
		  		<th>Tu</th>
		  		<th>We</th>
		  		<th>Th</th>
		  		<th>Fr</th>
		  		<th class="bgOrange">Sa</th>
		  	</tr>
		  </thead>
		  <tbody>
		  	<tr>
		  		<td class="month-name">January</td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>

		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>

		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>

		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  	</tr>
		  	<tr>
		  		<td class="month-name">February</td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>

		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>

		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>

		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  	</tr>
		  	<tr>
		  		<td class="month-name">March</td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>

		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>

		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>

		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  	</tr>

		  	<tr>
		  		<td class="month-name">April</td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>

		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>

		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>

		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  	</tr>

		  	<tr>
		  		<td class="month-name">May</td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>

		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>

		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>

		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  	</tr>

		  	<tr>
		  		<td class="month-name">June</td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>

		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>

		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>

		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  	</tr>

		  	<tr>
		  		<td class="month-name">July</td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>

		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>

		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>

		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  	</tr>

		  	<tr>
		  		<td class="month-name">August</td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>

		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>

		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>

		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  	</tr>

		  	<tr>
		  		<td class="month-name">September</td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>

		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>

		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>

		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  	</tr>

		  	<tr>
		  		<td class="month-name">October</td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>

		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>

		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>

		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  	</tr>

		  	<tr>
		  		<td class="month-name">November</td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>

		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>

		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>

		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  	</tr>

		  	<tr>
		  		<td class="month-name">December</td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>

		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>

		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>

		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  		<td>1<br><div class="calendarBox">122</div></td>
		  	</tr>
		  </tbody>
		</table>


	</div> <!-- main-content -->

@stop