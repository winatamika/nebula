<?php
 
class SearchController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public $checkInDate = '';
	public $checkOutDate = '';
	public $adultCap = '';
	public $childCap = '';
	public $nightCount = '';

	public $totalDays = '';
	public $dayName = '';

	public $earlybird = 0;
	public $lastminute = 0;

	public function index()
	{
		//
		$adultcapacity = DB::select('select max(adult_capacity) AS a FROM rooms;');
		$childcapacity = DB::select('select max(child_capacity) AS b FROM rooms;');

		return View::make('frontend.index',array('adultcapacity'=>$adultcapacity , 'childcapacity' => $childcapacity));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */

	public function search(){
		$checkin = Input::get('checkin');
		$checkout = Input::get('checkout');
		$adult = Input::get('adult');
		$child = Input::get('child');

		$nightcount =  $this->getnightcount($checkin,$checkout);  //total malam
        $totalDays = $this->getDateRangeArray($checkin,$checkout);  //total hari dlm array dimana berisi tgl dan nama hari 
        $dayName=array_count_values($totalDays[1]);   // dayName nama hari dalam array 
        $this->checkInDate = $checkin; 
		$this->checkOutDate =  $checkout;
		$this->nightCount = $nightcount ;	
		$this->adultCap = $adult;
	    $this->childCap = $child;
	    $this->totalDays =  $totalDays;
	    $this->dayName = $dayName;
        $this->setMySessionVars();   // set session untuk boking detail


        	//search jika saat itu ada kamar yang dibooking 
			$adultcapacity = DB::select('select * from bookings where ("'.$checkin.'" between start_date and end_date) or ("'.$checkout.'" between start_date and end_date) or (start_date between "'.$checkin.'" and "'.$checkout.'") or (end_date between "'.$checkin.'" and "'.$checkout.'")');
			//jika kosong 
			if(empty($adultcapacity)){
				//search id kamar
				$roomsList = Room::where('adult_capacity', '>=', $adult  ) ->where('child_capacity' , '>=' , $child)->get();
				
				foreach($roomsList as $room){
				
					$priceresult[]  = $this->getprice($checkin,$checkout,$nightcount,$totalDays,$dayName,$room->id);
				}
				$status = 0; //intinya tampilkan jumlah kamar secara penuh tanpa dikurangi
        				return View::make('frontend.searching',compact('roomsList', 'priceresult', 'status' ));
        			
			} //jika isi
			else
			{
		
				foreach ($adultcapacity as $adultcap){
					$booking_id[] =  $adultcap->booking_id;
				}
				$getbookingid = implode(",",$booking_id);
				$roomcouunt = DB::select('select *,count(*) as count from reservation where booking_id in ('.$getbookingid.') GROUP BY room_id');
				
				foreach($roomcouunt as $room){
					$room_id[] =  $room->room_id;
					$count[] = $room->count;
				}
							
		
				$roomsList = Room::where('adult_capacity', '>=', $adult  ) ->where('child_capacity' , '>=' , $child)->get();
					foreach($roomsList as $room){
					$priceresult[]  = $this->getprice($checkin,$checkout,$nightcount,$totalDays,$dayName,$room->id);
				}
					$status = 1; //tampilkan jumlah kamar sesudah dikurangi yang mesan
				return View::make('frontend.searching',compact('roomsList','room_id', 'count','priceresult', 'status' ));

			}
	
	}

	private function getnightcount($mysqlCheckInDate,$mysqlCheckOutDate){
		$checkin_date = getdate(strtotime($mysqlCheckInDate));
		$checkout_date = getdate(strtotime($mysqlCheckOutDate));
		$checkin_date_new = mktime( 12, 0, 0, $checkin_date['mon'], $checkin_date['mday'], $checkin_date['year']);
		$checkout_date_new = mktime( 12, 0, 0, $checkout_date['mon'], $checkout_date['mday'], $checkout_date['year']);
		return $nightCount = round(abs($checkin_date_new - $checkout_date_new) / 86400);

	}

		private function getDateRangeArray($startDate, $endDate, $nightAdjustment = true) {	
		$date_arr = array(); 
		$day_array=array(); 
		$total_array=array();
	     $time_from = mktime(1,0,0,substr($startDate,5,2), substr($startDate,8,2),substr($startDate,0,4));
		 $time_to = mktime(1,0,0,substr($endDate,5,2), substr($endDate,8,2),substr($endDate,0,4));		
		if ($time_to >= $time_from) { 
			if($nightAdjustment){
				while ($time_from < $time_to) {      
					array_push($date_arr, date('Y-m-d',$time_from));
					array_push($day_array, date('D',$time_from));
					$time_from+= 86400; 
				}
			}else{
				while($time_from <= $time_to) {      
					array_push($date_arr, date('Y-m-d',$time_from));
					array_push($day_array, $time_from);
					$time_from+= 86400; 
				}
			}			
		}  
		array_push($total_array, $date_arr);
		array_push($total_array, $day_array);
		return $total_array;		
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

	public function earlybird_status($roomTypeId){
		$earlycheckin = $_SESSION['sv_checkindate'] ; 
		$earlycheckout = $_SESSION['sv_checkoutdate'] ; 
		$today = date('Y-m-d');
		
					$tgl1=$earlycheckin;
					$tgl2=$earlycheckout ;
					
					$pecah1=explode("-" , $tgl1);
					$date1=$pecah1[2];
					$month1=$pecah1[1];
					$year1=$pecah1[0];
					
					$pecah2=explode("-" , $tgl2);
					$date2=$pecah2[2];
					$month2=$pecah2[1];
					$year2=$pecah2[0];
					
					$jd1 = GregorianToJD($month1, $date1, $year1);
				
					$jd2 = GregorianToJD($month2, $date2, $year2);
					
					$selisih = $jd2 - $jd1 ;
					
		$resultt = DB::select("select * from earlybirdprocess where '".$earlycheckin."' BETWEEN checkin_start and checkin_finish 
		and  '".$earlycheckin."' - INTERVAL earlybird_days DAY >= '".$today."'
		and ".$selisih." >= minimum_stay and roomtype_id=".$roomTypeId."");
		$disc = 0;
		foreach($resultt as $currentrow){
			if($currentrow->roomtype_id > 0 ){ 	
										//$this->earlybird = 1;
										$disc = $currentrow->discount ; 
										
									}
		}
		return $disc;

	}


	public static function lastminute_status($roomTypeId)
	{
		$earlycheckin = $_SESSION['sv_checkindate'] ; 
		$earlycheckout = $_SESSION['sv_checkoutdate'] ; 
		$today = date('Y-m-d');
		
					$tgl1=$earlycheckin;
					$tgl2=$earlycheckout ;
					
					$pecah1=explode("-" , $tgl1);
					$date1=$pecah1[2];
					$month1=$pecah1[1];
					$year1=$pecah1[0];
					
					$pecah2=explode("-" , $tgl2);
					$date2=$pecah2[2];
					$month2=$pecah2[1];
					$year2=$pecah2[0];
					
					$jd1 = GregorianToJD($month1, $date1, $year1);
					$jd2 = GregorianToJD($month2, $date2, $year2);
					
					$selisih = $jd2 - $jd1 ;
					
							
		$resultt = DB::select("select * from lastminute
		where '".$earlycheckin."' BETWEEN checkin_start and checkin_finish 
		and  '".$earlycheckin."' - INTERVAL lastminute_days DAY  <= '".$today."' 
		and '".$selisih."' >= minimum_stay 
		and roomtype_id=".$roomTypeId."");
		
		$disc = 0;
			foreach($resultt as $currentrow){
			if($currentrow->roomtype_id > 0 ){ 	
										//$this->lastminute = 1;
										$disc = $currentrow->discount ; 
										
							
									}
					
		}
			return $disc;		
		}

	 // $nightcount  total malam
     // $totalDays total hari dlm array dimana berisi tgl dan nama hari   array ke nol itu tgl array ke 1 itu naa hari 
     // $dayName dayName nama hari dalam array  Sun Mon Tue ... 
	public function getprice($checkin,$checkout,$nightcount,$totalDays,$dayName, $room_id){


		$price_details_html = '';

		$earlybird_disc =  $this->earlybird_status($room_id);
		$lastminute_disc = $this->lastminute_status($room_id);
		if($earlybird_disc > 0){
		$price_details_html.= 'get earlybird disc '.$earlybird_disc.' %<br>';
		}else{
		$price_details_html.= 'get lastminute disc '.$lastminute_disc.' %<br>';
		}
							//cari apakah ini bulan yang sama 
        					$_month = date('M',strtotime($checkin));   
								$month_ = date('M',strtotime($checkout)); 
								if($_month == $month_){  
									$mon = $_month;
								}else{  
									$mon = $_month.' - '.$month_;
								}

			//ambil variable bulan diatas	
	
			$price_details_html.='<b>'.$mon.'</b><br>';

			  foreach($dayName as $days => $totalnum){  
			
				 if($days == 'Sat' || $days == 'Sun'){   
				 	 $price_details_html.=' <b>'.$totalnum.' x '.$days.'</b> ';   //total num berarti berapa kali melewati days tsb 
			 	 }else{
					 $price_details_html.=' <b>'.$totalnum.' x '.$days.'</b> ';
				 }
			
				 $$days=0;  //dibuatkan variable masing2 hari dengaan nilai 0

			 }
			
			 $price_details_html.=' = total night is <b>'.$nightcount.' Night(s)</b><br>';  //bilang total malam
			 foreach($totalDays[0] as $date2 => $val){
			 //date2 sebagai key nomor array,, $val sebagai value tanggal
				$pricesql = DB::select('select * from priceplan where room_id = '.$room_id.' and  "'.$val.'" between start_date and end_date'); //cari di priceplan jika ada tgl tsb yg harga baru 

				if(!empty($pricesql)){
					$row=$pricesql;   
				}else{
					$pricesql2 = DB::select('select * from priceplan where room_id = '.$room_id.' and default_plan = 1');
					$row=$pricesql2;  

				}
				
				$day=date('D',strtotime($val)); 
			
				for ($i = 0, $c = count($row); $i < $c; ++$i) {
    				$row[$i] = (array) $row[$i];
    				$$day+=$row[$i][strtolower($day)];  //taruh disini bukan dibawah ini menaruh nilai masing2 hari
				}
	
				//$$day+=$row[0][strtolower($day)];  
			 
			}
			$night_count_at_customprice = 0;	 
			$searchresult['prices'] = array();
			
			$getconfig = $this->getconfig();

			$currency_symbol = $getconfig['conf_currency_symbol'];;
				$totalamt3 = 0;	
				if($getconfig['conf_tax_amount'] > 0 && $getconfig['conf_price_with_tax']== 1 ){  //cek disini d configure jika harga tambah dengan tax service
				
				$disc_early = (100 -  $earlybird_disc) /100 ;
				$disc_lastmin = (100 -  $lastminute_disc) /100 ;

				foreach($dayName as $days => $totalnum){
				
						if($earlybird_disc > 0 ){
						$pricewithtax=($disc_early * $$days +(($$days * $getconfig['conf_tax_amount'])/100));	
						}
						elseif($lastminute_disc > 0){
						$pricewithtax=($disc_lastmin * $$days +(($$days * $getconfig['conf_tax_amount'])/100));	
						}else{
						$pricewithtax= $$days +(($$days * $getconfig['conf_tax_amount'])/100);
						}
						
						
					if($days == 'Sat' || $days == 'Sun'){
					 	$price_details_html.=' '.$currency_symbol.number_format($pricewithtax, 2 , '.', ',').' ';		
					}else{
						$price_details_html.=' '.$currency_symbol.number_format($pricewithtax, 2 , '.', ',').' ';					
					} 	
					$totalamt3=$totalamt3+$pricewithtax;
						
					
			    }
				
			 }else{

				foreach($dayName as $days => $totalnum){
				   if($days == 'Sat' || $days == 'Sun'){			 
					 	$price_details_html.=' '.$currency_symbol.number_format($$days, 2 , '.', ',').' ';			
				   }else{ 
						$price_details_html.=' '.$currency_symbol.number_format($$days, 2 , '.', ',').' ';						
				   } 
				   $totalamt3=$totalamt3+$$days;				 
				} 
			 }
			 
			 $price_details_html.='<br>Total Price '.$currency_symbol.number_format($total_price_amount=$totalamt3, 2 , '.', ',').' ';
			 $price_details_html.='<input type="hidden" name="total[]" value="'.$totalamt3.'">';
			return $price_details_html;
	}

	

			public function getautoprice(){
				session_start();
				$room_id = Input::get('roomid');
				$count = Input::get('count');

				$checkin = $_SESSION['sv_checkindate'] ;
				$checkout =  $_SESSION['sv_checkoutdate'];
				$nightcount = $_SESSION['sv_nightcount'];	
				$totalDays = $_SESSION['sv_totalDays'];
				$dayName = $_SESSION['sv_dayName'];
				$price_details_html ='';
		//PROMO
		$earlybird_disc =  $this->earlybird_status($room_id);
		$lastminute_disc = $this->lastminute_status($room_id);
		

							//cari apakah ini bulan yang sama 
        					$_month = date('M',strtotime($checkin));   
								$month_ = date('M',strtotime($checkout)); 
								if($_month == $month_){  
									$mon = $_month;
								}else{  
									$mon = $_month.' - '.$month_;
								}

			//ambil variable bulan diatas	
								
			//$price_details_html.='<b>'.$mon.'</b><br>';

			  foreach($dayName as $days => $totalnum){  
			
				 if($days == 'Sat' || $days == 'Sun'){   
				 	 //$price_details_html.=' <b>'.$totalnum.' x '.$days.'</b> ';   //total num berarti berapa kali melewati days tsb 
			 	 }else{
					 //$price_details_html.=' <b>'.$totalnum.' x '.$days.'</b> ';
				 }
			
				 $$days=0;  //dibuatkan variable masing2 hari dengaan nilai 0

			 }
			
			 //$price_details_html.=' = total night is <b>'.$nightcount.' Night(s)</b><br>';  //bilang total malam
			 foreach($totalDays[0] as $date2 => $val){
			 //date2 sebagai key nomor array,, $val sebagai value tanggal
				$pricesql = DB::select('select * from priceplan where room_id = '.$room_id.' and  "'.$val.'" between start_date and end_date'); //cari di priceplan jika ada tgl tsb yg harga baru 

				if(!empty($pricesql)){
					$row=$pricesql;   
				}else{
					$pricesql2 = DB::select('select * from priceplan where room_id = '.$room_id.' and default_plan = 1');
					$row=$pricesql2;  

				}
				
				$day=date('D',strtotime($val)); 
			
				for ($i = 0, $c = count($row); $i < $c; ++$i) {
    				$row[$i] = (array) $row[$i];
    				$$day+=$row[$i][strtolower($day)];  //taruh disini bukan dibawah ini menaruh nilai masing2 hari
				}
	
				//$$day+=$row[0][strtolower($day)];  
			 
			}
			$night_count_at_customprice = 0;	 
			$searchresult['prices'] = array();
			
			$getconfig = $this->getconfig();

			$currency_symbol = $getconfig['conf_currency_symbol'];;
				$totalamt3 = 0;	
				if($getconfig['conf_tax_amount'] > 0 && $getconfig['conf_price_with_tax']== 1 ){  //cek disini d configure jika harga tambah dengan tax service
				$disc_early = (100 -  $earlybird_disc) /100 ;
				$disc_lastmin = (100 -  $lastminute_disc) /100 ;
				foreach($dayName as $days => $totalnum){
				
					
						if($earlybird_disc > 0 ){
						$pricewithtax=($disc_early * $$days +(($$days * $getconfig['conf_tax_amount'])/100));	
						}
						elseif($lastminute_disc > 0){
						$pricewithtax=($disc_lastmin * $$days +(($$days * $getconfig['conf_tax_amount'])/100));	
						}else{
						$pricewithtax= $$days +(($$days * $getconfig['conf_tax_amount'])/100);
						}
						
						
						
					if($days == 'Sat' || $days == 'Sun'){
					 	//$price_details_html.=' '.$currency_symbol.number_format($pricewithtax, 2 , '.', ',').' ';		
					}else{
						//$price_details_html.=' '.$currency_symbol.number_format($pricewithtax, 2 , '.', ',').' ';					
					} 	
					$totalamt3=$totalamt3+$pricewithtax;
						
					
			    }
				
			 }else{

				foreach($dayName as $days => $totalnum){
				   if($days == 'Sat' || $days == 'Sun'){			 
					 	//$price_details_html.=' '.$currency_symbol.number_format($$days, 2 , '.', ',').' ';			
				   }else{ 
						//$price_details_html.=' '.$currency_symbol.number_format($$days, 2 , '.', ',').' ';						
				   } 
				   $totalamt3=$totalamt3+$$days;				 
				} 
			 }
			 if($count != 0){
			 $totalamt3 = $count * $totalamt3;
			 }else{
			 	$count = 1;
			 }

			 $price_details_html.='<br>Total Price '.$count.' rooms '.$currency_symbol.number_format($total_price_amount=$totalamt3, 2 , '.', ',').' ';
			
			return $price_details_html;
		
	}


	private function setMySessionVars(){
  		session_start();


		if(isset($_SESSION['sv_checkindate'])) unset($_SESSION['sv_checkindate']);
		if(isset($_SESSION['sv_checkoutdate'])) unset($_SESSION['sv_checkoutdate']);
		if(isset($_SESSION['sv_adultCap'])) unset($_SESSION['sv_adultCap']);
		if(isset($_SESSION['sv_childCap'])) unset($_SESSION['sv_childCap']);
		if(isset($_SESSION['sv_nightcount'])) unset($_SESSION['sv_nightcount']);
		if(isset($_SESSION['sv_totalDays'])) unset($_SESSION['sv_totalDays']);
		if(isset($_SESSION['sv_dayName'])) unset($_SESSION['sv_dayName']);
		
	    $_SESSION['sv_checkindate'] = $this->checkInDate;
		$_SESSION['sv_checkoutdate'] = $this->checkOutDate;
		$_SESSION['sv_nightcount'] = $this->nightCount;		
		$_SESSION['sv_adultCap'] = $this->adultCap;	
		$_SESSION['sv_childCap'] = $this->childCap;
		$_SESSION['sv_totalDays'] = $this->totalDays;
		$_SESSION['sv_dayName'] = $this->dayName;


	}

	public function get_facility($facility){
		json_decode($facility);
		$list_facility = DB::select('select * from facility;');
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
