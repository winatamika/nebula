@extends ('layouts.admin')
@section('content')

  <!-- CONTENT -->
  <div class="main-content">
<h1>Create Priceplan</h1>

{{ Form::model($price, array('method' => 'PATCH',  'route' =>array('priceplan.update', $price->id) , 'files'=>true)) }} 
<div class="form-group">
    {{ Form::label('room_id', 'room_id', array('class'=>'col-sm-2 control-label')) }}
             <div class="col-sm-10">
    {{ Form::select('room_id', $Roomlist, null, array('class' => 'form-control' , 'id'=> 'inputEmail3')) }}
  </div>
</div>


       <div class="form-group">
        {{ Form::label('start date', 'start date:', array('class'=>'col-sm-2 control-label')) }}
          <div class="col-sm-10">
           {{ Form::text('start_date',null,array('id'=>'checkin')) }}
    </div>
    </div>
    
   <div class="form-group">
        {{ Form::label('end date', 'end date:', array('class'=>'col-sm-2 control-label')) }}
           <div class="col-sm-10">
           {{ Form::text('end_date',null,array('id'=>'checkout')) }}
    </div>
    </div>

  <div class="form-group">
      {{ Form::label('sun', 'sun', array('class'=>'col-sm-2 control-label'))}}
         <div class="col-sm-10">
           {{ Form::text('sun') }}
  </div>
  </div>

    <div class="form-group">
      {{ Form::label('mon', 'mon', array('class'=>'col-sm-2 control-label'))}}
         <div class="col-sm-10">
       {{ Form::text('mon') }}
  </div>
  </div>

   <div class="form-group">
      {{ Form::label('tue', 'tue', array('class'=>'col-sm-2 control-label'))}}
         <div class="col-sm-10">
         {{ Form::text('tue') }}
  </div>
  </div>

   <div class="form-group">
      {{ Form::label('wed', 'wed', array('class'=>'col-sm-2 control-label'))}}
         <div class="col-sm-10">
          {{ Form::text('wed') }}
        </div>
  </div>

   <div class="form-group">
      {{ Form::label('thu', 'thu', array('class'=>'col-sm-2 control-label'))}}
         <div class="col-sm-10">
          {{ Form::text('thu') }}
        </div>
  </div>

   <div class="form-group">
      {{ Form::label('fri', 'fri', array('class'=>'col-sm-2 control-label'))}}
         <div class="col-sm-10">
          {{ Form::text('fri') }}
        </div>
  </div>
   <div class="form-group">
      {{ Form::label('sat', 'sat', array('class'=>'col-sm-2 control-label'))}}
         <div class="col-sm-10">
           {{ Form::text('sat') }}
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