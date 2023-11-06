@extends('layouts.admin')
@section('content')
   <script type="text/javascript" src="{{URL::asset('ckeditor/ckeditor.js')}}"></script>
  <!-- CONTENT -->
    <script type="text/javascript" src="{{URL::asset('js/jquery-1.3.2.min.js')}}"></script> 
    <script type="text/javascript">
  
 var noconflic_js = jQuery.noConflict();

noconflic_js(document).ready(function(){
 
    var counter = 1;
 
    noconflic_js("#addButton").click(function () {
 
  if(counter>10){
            alert("Only 10 textboxes allow");
            return false;
  }   
 
  var newTextBoxDiv = noconflic_js(document.createElement('div'))
       .attr("id", 'TextBoxDiv' + counter);
 
  newTextBoxDiv.after().html('<label>Size #'+ counter + ' : </label>' +
        '<input type="file" name="multiimage[]" id="textbox" value="" >');
 
  newTextBoxDiv.appendTo("#TextBoxesGroup");
 
 
  counter++;
     });
 
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
  <div class="main-content">
<h1>Create Room</h1>
{{ Form::open(array('route' => 'rooms.store','files'=>true)) }}
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
      {{ Form::label('count', 'count')}}
      {{ Form::text('count')}}

  </div>
     <div class="form-group">
  {{ Form::label('image','Primary Image',array('id'=>'','class'=>'')) }}
  {{ Form::file('image','',array('id'=>'','class'=>'')) }}
    </div>

      <div  class="form-group" id='TextBoxesGroup'>
         {{ Form::label('multiimage','Multiple image',array('id'=>'','class'=>'')) }}
<input type='button' value='Add Image' id='addButton'>
<input type='button' value='Remove Image' id='removeButton'>
</div>

   <div class="form-group">
  {{ Form::label('Facility','Facility',array('id'=>'','class'=>'')) }}
  <br>
 @foreach ($facility as $list)
 <input type="checkbox" name="facility[]" value="{{$list->idfacility}}">{{$list->name}}<br>

    @endforeach
    </div>

    <div class="form-group">
 {{ Form::label('Extrabed','Extrabed',array('id'=>'','class'=>'')) }}
 <input type="checkbox" name="extrabed" value="1">
    </div>

  </div>

   <div class="form-group">
        {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}
    </div>

{{ Form::close() }}
@if ($errors->any())
 <div class="form-group">
    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
</div>
    <?php echo Form::close() ?>
</div>



    </div> <!-- main-content -->
@endif
@stop