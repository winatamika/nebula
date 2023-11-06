@extends('layouts.theme.using')

@section('content')

<!-- CONTENT -->
	<div class="main-content">
	<!-- FORM -->
		<center>

@if ($roomsList->count())

  <!--  <thead>
    <tr>
        <th>Name</th>
        <th>Adult</th>
        <th>Child</th>
        <th>Facility</th>
        <th>count</th>
    </tr>
    </thead>
-->
  <?php $arrayprice=0; ?>
    @foreach ($roomsList as $room)
    <table class="table table-striped table-bordered">
       <tbody>
    <tr>
      <th colspan="2"><center>{{ $room->name_room }}</center></th>
    </tr>
      <tr><td><b>Adult capacity</b> {{ $room->adult_capacity }}</td>
      <td><b>Child capacity</b>  {{ $room->child_capacity }}</td>  </tr>
      <tr>
        <td rowspan="2"><img src="{{asset('uploads/'.$room->image)}}" alt="Smiley face" height="100" width="100"></td>
      </tr>
       <tr>
      <td><b>description</b> {{ $room->facility }}</td>
       </tr>
      <tr>
      <td><b>Room</b> </b></td>
     <td>
        <select name="roomcount" id="roomcount">
<option value="select">Select</option>
@for($i=1;$i<=$room->count;$i++) 
<option value={{$i}}>{{$i}}</option>";
@endfor
</select> 

     </td>
    </tr>
    <tr>
       <td><b>Price</b></td>

         <td><b>
          <?php echo $priceresult[$arrayprice]; ?>
            <?php $arrayprice++; ?>
</b></td>
    </tr>
        </tbody>
</table>

    @endforeach

  <button type="submit" class="btn btn-default">Booking now</button>
@else
There are no rooms
@endif
	</center>
</div>

@stop