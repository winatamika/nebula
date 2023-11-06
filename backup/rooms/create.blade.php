@extends('layouts.admin')
@section('content')

  <div class="entry">
      <h3 class="judul text-uppercase">Create Room</h3><br>
    <form action="{{ URL::route('rooms-create') }}" enctype="multipart/form-data" class="form-horizontal has-success has-feedback" role="form" method="post">
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Room Name</label>
        <div class="col-sm-10">
          <input type="text" name="name_room" class="form-control" id="inputEmail3"{{ (Input::old('name_room'))? ' value="' . Input::old('name_room') . '"' : '' }}>
        <div class="error-field">
        @if($errors->has('name_room'))
          {{ $errors->first('name_room') }}
        @endif
        </div> <!-- error -->
        </div>
      </div>
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Adult Capacity</label>
        <div class="col-sm-10">
          <input type="text" name="adult_capacity" class="form-control" id="inputEmail3"{{ (Input::old('adult_capacity'))? ' value="' . Input::old('adult_capacity') . '"' : '' }}>
        <div class="error-field">
        @if($errors->has('adult_capacity'))
          {{ $errors->first('adult_capacity') }}
        @endif
        </div> <!-- error -->
        </div>
      </div>
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Child Capacity</label>
        <div class="col-sm-10">
          <input type="text" name="child_capacity" class="form-control" id="inputEmail3"{{ (Input::old('child_capacity'))? ' value="' . Input::old('child_capacity') . '"' : '' }}>
        <div class="error-field">
        @if($errors->has('child_capacity'))
          {{ $errors->first('child_capacity') }}
        @endif
        </div> <!-- error -->
        </div>
      </div>
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Facility</label>
        <div class="col-sm-10">
          <textarea class="form-control" name="facility" id="ckeditor" rows="3">{{ (Input::old('facility'))? Input::old('facility') : '' }}</textarea>
          <div class="error-field">
          @if($errors->has('facility'))
          {{ $errors->first('facility') }}
        @endif
        </div> <!-- error -->
        </div>
      </div>
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Count</label>
        <div class="col-sm-10">
          <input type="text" name="count" class="form-control" id="inputEmail3"{{ (Input::old('count'))? ' value="' . Input::old('count') . '"' : '' }}>
        <div class="error-field">
        @if($errors->has('count'))
          {{ $errors->first('count') }}
        @endif
        </div> <!-- error -->
        </div>
      </div>
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">File Image</label>
        <div class="col-sm-10">
          <input type="file" id="exampleInputFile" name="image">
          <p class="help-block">Support file png, jpg.</p>
          <div class="error-field">
            @if($errors->has('image'))
              {{ $errors->first('image') }}
            @endif
          </div> <!-- error -->
        </div>
      </div>
      
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-default blue">Create</button>
        {{ Form::token() }}
        </div>
      </div>
    </form>
      </form> <div class=" clearfix"></div>         
  </div>

@stop