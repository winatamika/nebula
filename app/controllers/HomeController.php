<?php

class HomeController extends BaseController {

	public function showWelcome()
	{
		return View::make('hello');
	}

	public function index()
	{

	//Rumus list 10 booking 
	$listA = DB::select("SELECT booking_id, DATE_FORMAT(start_date, '%m/%d/%Y') AS start_date, DATE_FORMAT(end_date, '%m/%d/%Y') AS end_date, total_cost, DATE_FORMAT(booking_time, '%m/%d/%Y') AS booking_time , client_id FROM bookings where payment_success= 1 order by booking_id desc limit 10");


	//list check in today 
	$listB = DB::select("SELECT booking_id, DATE_FORMAT(start_date, '%m/%d/%Y') AS start_date, DATE_FORMAT(end_date, '%m/%d/%Y') AS end_date, total_cost, DATE_FORMAT(booking_time, '%m/%d/%Y') AS booking_time, client_id FROM bookings where payment_success=1 and DATE_FORMAT(start_date, '%Y-%m-%d')=CURDATE()");

	//list check out today 
	$listC = DB::select("SELECT booking_id, DATE_FORMAT(start_date, '%m/%d/%Y') AS start_date, DATE_FORMAT(end_date, '%m/%d/%Y') AS end_date, total_cost, DATE_FORMAT(booking_time, '%m/%d/%Y') AS booking_time, client_id FROM bookings where payment_success=1 and DATE_FORMAT(end_date, '%Y-%m-%d')=CURDATE()");

	return View::make('admin.booking-list',array('listsA'=>$listA , 'listsB' => $listB , 'listsC' => $listC ));
	}

}
