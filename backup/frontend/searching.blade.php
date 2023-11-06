@extends('layouts.theme.using')

@section('content')
<script>
function validateSearchResultForm(){
  var rmsavailable  = document.getElementsByName('roomcount[]');  
  for(var i = 0; i < rmsavailable.length; i++){
    if(rmsavailable[i].value > 0){
      return true;
    }
  }   
  alert('alert, anda belum memilih kamar');
  return false; 
}
</script>
<!-- CONTENT -->
	<div class="main-content">
	<!-- FORM -->

    <center>
  <div class="container">
  
   <table cellpadding="0"  cellspacing="7" border="0" align="left" style="text-align:left;">
    <tr>
     <td><strong>CHECK IN DATE:</strong></td>
     <td><?=$_SESSION['sv_checkindate'] ?></td>
    </tr>
    <tr>
     <td><strong>CHECK OUT DATE:</strong></td>
     <td><?=$_SESSION['sv_checkoutdate']  ?></td>
    </tr>
    <tr>
     <td><strong>TOTAL NIGHT:</strong></td>
     <td><?=$_SESSION['sv_nightcount'] ?></td>
    </tr>
    <tr>
     <td><strong>ADULT ROOM:</strong></td>
     <td><?=$_SESSION['sv_adultCap'] ?></td>
    </tr>
      <tr>
     <td><strong>CHILD ROOM:</strong></td>
     <td><?=$_SESSION['sv_childCap'] ?></td>
    </tr>
   </table>
  </div>

@if ($roomsList->count())
  <?php 
  $arrayprice=0; 
  ?>
<form role="form" action="{{ URL::route('booking-detail') }}" method="post" onsubmit="return validateSearchResultForm();">
    @foreach ($roomsList as $room)
    <table class="table table-striped table-bordered">
    <tbody>
    <tr>
     <tr>
      <input type="hidden" name="room_id[]" value="<?php echo $room->id; ?>">
      <th colspan="2"><center>{{ $room->name_room }}</center></th>
    </tr>
      <tr><td><b>Adult capacity</b> {{ $room->adult_capacity }}</td>
      <td><b>Child capacity</b>  {{ $room->child_capacity }}</td>  </tr>
      <tr>
        <td rowspan="2"><img src="{{asset('uploads/'.$room->image)}}" alt="Smiley face" height="100" width="100"></td>
      </tr>
       <tr>
      <td><b>description</b> {{ $room->description }}
      <br>
    <b>facility</b><br>
       <?php 
       if($room->facility != "")
       {
            $facility = DB::select('select * FROM facility;');
            $value_faciliy = json_decode($room->facility);
            foreach($facility as $list){
                        if (in_array($list->idfacility, $value_faciliy)) {
                          echo $list->name; echo '<br>';
                    }
             }
     }
        ?>
        <br>
        @if($room->extrabed > 0)
          <b>Extra bed is available for this room</b>
        @else
          <b>Extra bed is not available for this room</b>
        @endif
      </td>
       </tr>
      <tr>
         <td><b>Room</b> </b></td>
         <td>
<?php 
if($status == 0)
{
?>
<select name="roomcount[]" id="roomcount"  onChange="showPrice(this.value,<?php echo $room->id;?>)">
<option value="0">Select</option>
@for($i=1;$i<=$room->count;$i++) 
<option value={{$i}}>{{$i}}</option>
@endfor
</select> 
<?php 
} else 
{
?>
      <?php   
    if (in_array($room->id, $room_id))
    {
        $key = array_search($room->id, $room_id);
         $result = $room->count - $count[$key];
                  echo '<select name="roomcount[]" id="roomcount"  onChange="showPrice(this.value,'.$room->id.')">
                  <option value="select" value="0">Select</option>' ?>
                  @for($i=1;$i<=$result;$i++) 
                  <option value={{$i}}>{{$i}}</option>
                  @endfor
                  <?php echo '
                  </select>';

    }else {
         $result = $room->count;
            echo '<select name="roomcount[]" id="roomcount"  onChange="showPrice(this.value,'.$room->id.')">
                  <option value="select" value="0">Select</option>' ?>
                  @for($i=1;$i<=$result;$i++)
                  <option value={{$i}}>{{$i}}</option>
                  @endfor
                  <?php echo '
                  </select>';
    }
}
    ?>
      </td>
    </tr>
       <tr>
       <td><b>Price</b></td>
         <td><b>
          <?php echo $priceresult[$arrayprice]; ?>
            <?php $arrayprice++; ?>
         </b>
<div id="list-<?php echo $room->id;?>"></div>
       </td>
    </tr>
        </tbody>
</table>
    @endforeach

  <button type="submit" class="submit" id="submit">Booking now</button>
</form>
@else
There are no rooms
@endif
	</center>
</div>

<script>
//usahakan buat menampilan room id per combobox, trus ambil data2 yg diperlukan nanti mengarah ke fuction getprice yang menampilkan div  
//getprice($checkin,$checkout,$nightcount,$totalDays,$dayName,$room->id, jumlah kamar pesan combobox)   
 
  function showPrice(str,id) {
   if (str=="") {
    document.getElementById("list-"+id).innerHTML="";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
 
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
 
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("list-"+id).innerHTML=xmlhttp.responseText;

    }
  }

  xmlhttp.open("GET","http://nebula.baliorange.net/autoprice?roomid="+id+"&count="+str,true);
  xmlhttp.send();
  }
</script>

@stop