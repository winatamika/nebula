<?php

class DetailsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public $invoiceHtml			       = '';
	public $roomid_session = array();
	public $totalprice_session = '';
	public $totalroom_session = '';
 
	public function index()
	{
		// 
		$rooms = Input::get('room_id');
		$count = Input::get('roomcount');
		$total = Input::get('total');
		$totalroom = 0;
		$totalprice = 0;
		$theroom = count($count);
		$getconfig = $this->getconfig();
		$currency_symbol = $getconfig['conf_currency_symbol'];
		$this->setMySessionVars();

		for($i = 0; $i < $theroom; $i++){
				if($count[$i] > 0){
					$no_of_room[] = $count[$i];
					$totalroom = $totalroom + $count[$i];
					$totalgross[] = $total[$i] * $count[$i]; 
					$totalprice = $totalprice + ($total[$i] * $count[$i]);
					$roomid[] = $rooms[$i];	


				}
		}

		$this->roomid_session = $roomid;
		$this->totalprice_session = $totalprice;
		$this->totalroom_session = $totalroom;
		$this->setMySessionVars2();


		//select * where id room

			$getroomid = implode(",",$roomid); 
		  	$roomsList = DB::select('select * from rooms where id in ('.$getroomid.') ;');
		  	$payment_gateway = Payment::where('enabled', '=', '1'  )->get();
				return View::make('frontend.details',compact('roomsList','payment_gateway', 'no_of_room', 'totalgross', 'totalroom', 'totalprice', 'currency_symbol'));
        			

	}
 
	private function setMySessionVars(){
			session_start();
			$_SESSION['sv_checkindate'];
			$_SESSION['sv_checkoutdate'] ;
			$_SESSION['sv_nightcount'];	
			$_SESSION['sv_adultCap'];
			$_SESSION['sv_childCap'];

	}

	private function setMySessionVars2(){
			if(isset($_SESSION['sv_roomid'])) unset($_SESSION['sv_roomid']);
			if(isset($_SESSION['sv_totalprice'])) unset($_SESSION['sv_totalprice']);
			if(isset($_SESSION['sv_totalroom'])) unset($_SESSION['sv_totalroom']);

			
		    $_SESSION['sv_roomid'] = $this->roomid_session;
			$_SESSION['sv_totalprice'] = $this->totalprice_session ;
			$_SESSION['sv_totalroom'] = $this->totalroom_session;	
	}

	private function getconfig(){
		$getconfigs = Setting::distinct()->select('conf_key as key', 'conf_value as value')->get();
		foreach ($getconfigs as $getconfig) {

			if($getconfig->key){
				if($getconfig->value){
					$config[$getconfig->key] = $getconfig->value;
				}else{
					$config[$getconfig->key] = false;
				}
			}
		}

		return $config;
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */

	public function save(){
		$count_id = Input::get('count_id');
		$room_id = Input::get('room_id');
		$totalprice = Input::get('totalprice');
		$priceking = Input::get('priceking');
		

	$validator = Validator::make(Input::all(),
			array(
				'email_name' => 'required|max:30',
				'first_name' => 'required|max:30',
				'last_name'	=> 'required|max:30',
				'title' =>  'required|max:30',
				'gateway' => 'required|max:30',
				'address'	=> 'required',
				'city'		=> 'required|max:20',
				'province'	=> 'required|max:20',
				'zip'		=> 'required|max:20',
				'country'	=> 'required|max:20',
				'phone'		=> 'required|max:20'
			)
		);
	$messages = $validator->messages();

		if ($validator->fails())
		{
   			return View::make('frontend.failed',compact('messages'));
   			break;	
		}

	$email_name = Input::get('email_name');
	$title = Input::get('title');
	$first_name = Input::get('first_name');
	$last_name = Input::get('last_name');
	$address = Input::get('address');
	$city = Input::get('city');
	$province = Input::get('province');
	$state = Input::get('state');
	$country = Input::get('country');
	$zip = Input::get('zip');
	$phone = Input::get('phone');
	$fax = Input::get('fax');
	$gateway = Input::get('gateway');
	$request = Input::get('request');

	foreach ($gateway as $selectedgateway)
	{
	$selectedgateway;
	}

	//scan client by email tb_client 
	$get_email_id = DB::select('select * from clients where email = "'.$email_name.'"');
		//if ada get id client jika tidak ada buat baru get id 
		if(empty($get_email_id)){
			 $client = new Clients;
			 $client->email = $email_name;
			$client->first_name 		= $first_name;
			$client->last_name 			= $last_name;
			$client->title 				= $title;
			$client->street_addr 		= $address;
			$client->city 				= $city;
			$client->province 			= $province;
			$client->zip 				= $zip;
			$client->country 			= $country;
			$client->phone 				= $phone;
			$client->fax 				= $fax;	
			
				$saveclient = $client->save();
			if(!$saveclient){
	       			
      					return View::make('frontend.failed');
      					break;
				}
		
			
		}
	
	
		$clients = DB::select('select max(id) AS id FROM clients where email = "'.$email_name.'";');
			foreach ($clients as $client){
					$client_id = $client->id;
				}
					
		//save data di tb_booking get bookingtime,start_date, end_date, client id, adult , child , totalcost, payment amount , payment success 
			$this->setMySessionVars();
			$booking = new Bookings;
			$booking->booking_time = date("Y-m-d H:i:s"); 
			$booking->start_date = $_SESSION['sv_checkindate'];
			$booking->end_date = $_SESSION['sv_checkoutdate'] ;
			$booking->client_id = $client_id;
			$booking->adult = $_SESSION['sv_adultCap'];
			$booking->child = $_SESSION['sv_childCap'];
			$booking->total_cost = $totalprice ;
			$booking->payment_ammount = $totalprice ;
			$booking->payment_success = 1;
			$booking->payment_type = $selectedgateway;
			$booking->special_request = $request;

			
						$savebooking = $booking->save();
			if(!$savebooking){
	       			
      					return View::make('frontend.failed');
      					break;
				}
			
		$bookingid = DB::select('select max(booking_id) AS id FROM bookings;');
		foreach ($bookingid as $book_id){
		$bId = $book_id->id;
		}


		//get booking id  lalu save booking id , room id x per count di tb_reservation
		
		$count_in = count($count_id);
		for ($i=0; $i<$count_in; $i++){
		
				for($j=0; $j<$count_id[$i]; $j++){
			$reserve = new Reservation;
			$reserve->booking_id = $bId;
			$reserve->room_id = $room_id[$i];
			$savereservasi = $reserve->save(); 
					
				}
		
		}


		$client_data = array($email_name,$title,$first_name,$last_name,$address,$city,$province,$state,$country,$zip,$phone,$fax,$selectedgateway,$request);
		$booking_invoice = $this->createInvoice($client_data,$priceking);
		$invoices = new Invoice;
		$invoices->booking_id = $bId;
		$invoices->client_name = $first_name;
		$invoices->client_email = $email_name;
		$invoices->invoice = $booking_invoice;
		$invoices->save();
		
		
		/*Mail::send('emails.auth.welcome', array('firstname'=>$booking_invoice), function($message)use ($email_name, $email_name){
        $message->to($email_name)->subject('Thanks to booking with us!');
  		  });*/

		return View::make('frontend.finish');
    
   		
	}


	Public function fetch(){
		$fetch = Input::get('emailFetch');
		
		if(!empty($fetch)){
			$thefetch = DB::select("select * from clients where email='".$fetch."'");
			return View::make('frontend.details', array('thefetch'=>$thefetch));
			
		}
		else {
			// return View::make('priceplan.null');
			return  Redirect::route('booking-detail');
		}

	}


	function createInvoice($client_data,$priceking){
		$invoiceHtml = "";
	 	$count = count($client_data);
	 	$data = array('email name','title','first_name','last_name','address','city','province','state','country','zip','phone','fax','selectedgateway','request');
	 	for($i=0;$i<$count;$i++){
	 		$invoiceHtml.="".$data[$i]." ".$client_data[$i]."";
	 		$invoiceHtml.="<br>";
	 	}
		$invoiceHtml.= '<table class="table table-striped table-bordered">
    	<tr>
    		<td colspan="5"><center><b>Your Booking Details</b></center></td>
    	</tr>
    	<tr>
    		<td><b>Checkin Date</b></td>
    		<td><b>Checkout Date</b></td>
    		<td><b>Total Night</b></td>
   			<td><b>Total Room</b></td>
   			<td><b>Total price</b></td>
 
    	</tr>
    	<tr>
    		<td>'.$_SESSION['sv_checkindate'].'</td>
    		<td>'.$_SESSION['sv_checkoutdate'].'</td>
    		<td>'.$_SESSION['sv_nightcount'].'</td>
    		<td>'.$_SESSION['sv_totalroom'].'</td>
    		<td>'.$_SESSION['sv_totalprice'].' </td>
    	</tr>
    	
		<tr>
    		<td colspan = "5"><b>Room Lists</b></td>
    	</tr>
		
     ';

    	$getroomid = implode(",",$_SESSION['sv_roomid']); 
		$roomsList = DB::select('select * from rooms where id in ('.$getroomid.') ;');
		$i=0;
		foreach($roomsList as $room){
			$invoiceHtml.='<tr>
				<td colspan = "4">'.$room->name_room.'</td>
				<td>'.$priceking[$i].'</td>
			</tr>';
		$i++;
		}

		$invoiceHtml.='</table>';

    	return $invoiceHtml;

	}

	public function getcust(){

		$this->errorCode = 0;
		$this->errorMsg = "";	
		
		$existing_email = Input::get('existing_email');	
		//$existing_email = $_GET['existing_email'];	
		$existing_email = str_replace("existing_email=","",$existing_email);
		$client_sql= DB::select('select * from clients where email = "'.$existing_email.'" limit 1;');
		$count = count($client_sql);
		$select_title = "";

		if($count !=0){	
			
		foreach($client_sql as $client_row){

			$title_array=array("Mr","Ms","Mrs","Miss","Dr","Prof");
			$select_title='<select name="title" class="form-control" >';
			
			for($p=0; $p<6; $p++){
				if($title_array[$p]==$client_row->title){
					$select_title.='<option value="'.$title_array[$p].'" selected="selected">'.$title_array[$p].'</option>';
				}else{
					$select_title.='<option value="'.$title_array[$p].'" >'.$title_array[$p].'</option>';
				}
			}

				$select_title.='</select>';

			$first_name = $client_row->first_name;
			$last_name = $client_row->last_name;
			$street_addr=$client_row->street_addr;
			$city = $client_row->city;
			$province = $client_row->province;
			$zip =$client_row->zip;
			$country =$client_row->country;
			$phone = $client_row->phone;
			$fax = $client_row->fax;
			$email = $client_row->email;

		}
			echo json_encode(array("errorcode"=>$this->errorCode, "title"=>$select_title, "first_name"=>$first_name, "last_name"=>$last_name,"street_addr"=>$street_addr,"city"=>$city,"province"=>$province,"zip"=>$zip,"country"=>$country,"phone"=>$phone,"fax"=>$fax,"email"=>$email ));	
		}
		else{
			$this->errorCode = 1;
			$this->errorMsg  = "Details Not Found. Please Sign up";
			echo json_encode(array("errorcode"=>$this->errorCode,"strmsg"=>$existing_email ));	
		}
	
	
		
	}


	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
