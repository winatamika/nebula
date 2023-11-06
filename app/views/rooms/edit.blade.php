@extends('layouts.admin')
@section('content')

  <!-- CONTENT -->
     <script type="text/javascript" src="{{URL::asset('ckeditor/ckeditor.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('js/jquery-1.3.2.min.js')}}"></script> 
  <div class="main-content">
<h1>Edit Room</h1>
<!--{{ Form::model($room, array('method' => 'PATCH',  'route' =>array('rooms.update', $room->id))) }} -->
{{ Form::model($room, array('method' => 'PATCH',  'route' =>array('rooms.update', $room->id) , 'files'=>true)) }} 
<!--{{ Form::model($room, array('method' => 'PATCH','route' => 'rooms.update', $room->id, 'files'=>true)) }}-->
 <div class="form-group">
        {{ Form::label('name room', 'name room:') }}
        {{ Form::text('name_room') }}
    </div>
   <div class="form-group">
        {{ Form::label('adult capacity', 'adult capacity:') }}
        {{ Form::text('adult_capacity') }}
    </div>
     <div class="form-group">
        {{ Form::label('child capacity', 'child capacity:') }}
        {{ Form::text('child_capacity') }}
    </div>
   <div class="form-group">
    {{ Form::label('desc', 'desc:') }}
        {{ Form::textarea('desc', null, array(
            'class' => 'ckeditor',
            'rows' => 10,
        )) }}
    </div>
     <div class="form-group">
 <div class="form-group">
      {{ Form::label('count', 'count')}}
      {{ Form::text('count')}}

  </div>
</div>

<div class="form-group">
<img src="{{ asset("uploads/".$room->image ) }}" height="50px" width="50px">
  {{ Form::label('image','File',array('id'=>'','class'=>'')) }}
  {{ Form::file('image','',array('id'=>'','class'=>'')) }}
 
</div>

  <div  class="form-group" id='TextBoxesGroup'>
<input type='button' value='Add Image' id='addButton'>
<input type='button' value='Remove Image' id='removeButton'>
</div>
<?php
$status = 0;
if($room->facility !=""){
$value_facility = json_decode($room->facility);
$status = 1;
}
?>
   <div class="form-group">
  {{ Form::label('Facility','Facility',array('id'=>'','class'=>'')) }}
  <br>
 @foreach ($facility as $list)
 <?php 
if($status == 1)
{
      if (in_array($list->idfacility, $value_facility)) {
          echo '<input type="checkbox" name="facility[]" value="'.$list->idfacility.'" checked >'.$list->name.'<br>';
      }else{
           echo '<input type="checkbox" name="facility[]" value="'.$list->idfacility.'" >'.$list->name.'<br>';
      }
  }
else
{
        echo '<input type="checkbox" name="facility[]" value="'.$list->idfacility.'" >'.$list->name.'<br>';
}

 ?>
    @endforeach
    </div>

  <div class="form-group">
  {{ Form::label('Extrabed','Extrabed',array('id'=>'','class'=>'')) }}
  @if ($room->extrabed > 0) 
  <input type="checkbox" name="extrabed" value="1" checked>
  @else
  <input type="checkbox" name="extrabed" value="1">
  @endif
         </div>

<div class="form-group" >
   {{ Form::submit('Update', array('class' => 
                 'btn btn-warning'))}}
        {{ link_to_route('rooms.index', 'Cancel', $room->
                  id,array('class' => 'btn btn-danger')) }}
</div>



<?php 
$time = 0;
$img = "";
if($room->multiimage !=""){
$has_image  = json_decode($room->multiimage);
foreach ($has_image as $row ){
$time++;
$img[] = $row;
}
}
?>



<script type="text/javascript">
 
 var noconflic_js = jQuery.noConflict();

noconflic_js(document).ready(function(){
var time = "<?php echo $time; ?>";
 var counter = 2;

if (time > 0) {

var $img = <?php echo json_encode($img);?>;

var counter =  time ;

  var loop = time;
  for(i=0; i<$img.length; i++){
    var newTextBoxDiv = noconflic_js(document.createElement('div'))
       .attr("id", 'TextBoxDiv' + i);
 
  newTextBoxDiv.after().html(
        '<input type="text" name="img[]" value="' +$img[i] +'"><img src="http://localhost/nebula/public/uploads/' +$img[i] +'" height="22" width="22"><input type="file" name="multiimage[]" id="textbox' + counter + '" >'
        );
 
  newTextBoxDiv.appendTo("#TextBoxesGroup");
  }

    noconflic_js("#addButton").click(function () {
 
  if(counter>10){
            alert("Only 10 textboxes allow");
            return false;
  }   
 
  var newTextBoxDiv = noconflic_js(document.createElement('div'))
       .attr("id", 'TextBoxDiv' + counter);
 
  newTextBoxDiv.after().html(
    '<input type="text" name="img[]" value="baru"><input type="file" name="multiimage[]" id="textbox' + counter + '" >'
         );
 
  newTextBoxDiv.appendTo("#TextBoxesGroup");
 
 
  counter++;
     });

  }
  else{
 
    noconflic_js("#addButton").click(function () {
 
  if(counter>10){
            alert("Only 10 textboxes allow");
            return false;
  }   
 
  var newTextBoxDiv = noconflic_js(document.createElement('div'))
       .attr("id", 'TextBoxDiv' + counter);
 
  newTextBoxDiv.after().html(
        '<input type="input" name="img[]" id="textbox' + counter + '" value="baru" ><input type="file" name="multiimage[]" id="textbox' + counter + '">');
 
  newTextBoxDiv.appendTo("#TextBoxesGroup");
 
 
  counter++;
     });

 }
     noconflic_js("#removeButton").click(function () {
  if(counter==1){
          alert("No more textbox to remove");
          return false;
       }   
 
  counter--;
 
        noconflic_js("#TextBoxDiv" + counter).remove();
 
     });
 
     noconflic_js("#getButtonValue").click(function () {
 
  var msg = '';
  for(i=1; i<counter; i++){
      msg += "\n Textbox #" + i + " : " + noconflic_js('#textbox' + i).val();
  }
        alert(msg);
     });
  });
</script>
 

{{ Form::close() }}
@if ($errors->any())
 <div class="form-group">
    {{implode('',$errors->all('<li class="error">:message</li>'))}}
</div>
</div>
@endif
@stop