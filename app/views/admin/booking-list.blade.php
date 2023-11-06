@extends('layouts.admin')

@section('content')
  <!-- CONTENT -->

  <div class="main-content">
LIST BOOKING <br>
 <!-- main-content -->
 <?php 
$customers = new CustomerController;
 ?>
  <h2>Customer Booking List</h2>
<table class="table table-hover table-bordered">
 <thead>
  <tr>
    <th colspan = "7"><center>Last 10 Bookings</center></th>
  </tr>
        <tr>
          <th>BOOKING_ID</th>
          <th>NAME</th>
          <th>CHECK_IN</th>
          <th>CHECK_OUT</th>
          <th>AMOUNT</th>
          <th>BOOKING_DATE</th>
          <th>&nbsp;</th>
        </tr>
      </thead>
  @foreach ($listsA as $list)
<tr>
              <td>{{$list->booking_id}}</td>
              <td>{{$customers->getName($list->client_id)}}</td>
              <td>{{$list->start_date}}</td>
              <td>{{$list->end_date}}</td>
              <td>{{$list->total_cost}}</td>
              <td>{{$list->booking_time}}</td>
              <td>
                <a href="{{ URL::Route('customer-detail-booking', array($list->booking_id)) }}">Details</a>  
              </td>
              </tr>
  @endforeach

</table>
<br>


<table class="table table-hover table-bordered">
 <thead>
  <tr>
    <th colspan = "7"><center>Today Checkin list</center></th>
  </tr>
        <tr>
          <th>BOOKING_ID</th>
          <th>NAME</th>
          <th>CHECK_IN</th>
          <th>CHECK_OUT</th>
          <th>AMOUNT</th>
          <th>BOOKING_DATE</th>
          <th>&nbsp;</th>
        </tr>
      </thead>
  @foreach ($listsB as $list)
<tr>
              <td>{{$list->booking_id}}</td>
              <td>{{$customers->getName($list->client_id)}}</td>
              <td>{{$list->start_date}}</td>
              <td>{{$list->end_date}}</td>
              <td>{{$list->total_cost}}</td>
              <td>{{$list->booking_time}}</td>
              <td>
                <a href="{{ URL::Route('customer-detail-booking', array($list->booking_id)) }}">Details</a>  
              </td>
              </tr>
  @endforeach
</table>
<br>


<table class="table table-hover table-bordered">
 <thead>
  <tr>
    <th colspan = "7"><center>Today Checkout list</center></th>
  </tr>
        <tr>
          <th>BOOKING_ID</th>
          <th>NAME</th>
          <th>CHECK_IN</th>
          <th>CHECK_OUT</th>
          <th>AMOUNT</th>
          <th>BOOKING_DATE</th>
          <th>&nbsp;</th>
        </tr>
      </thead>
  @foreach ($listsC as $list)
<tr>
              <td>{{$list->booking_id}}</td>
              <td>{{$customers->getName($list->client_id)}}</td>
              <td>{{$list->start_date}}</td>
              <td>{{$list->end_date}}</td>
              <td>{{$list->total_cost}}</td>
              <td>{{$list->booking_time}}</td>
              <td>
                <a href="{{ URL::Route('customer-detail-booking', array($list->booking_id)) }}">Details</a>  
              </td>
              </tr>
  @endforeach
</table>

@stop