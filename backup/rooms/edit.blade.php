@extends('layouts.admin')
@section('content')

  <div class="entry">
      <h3 class="judul text-uppercase">Edit Room</h3><br>
    <form action="{{ URL::route('rooms-edit-post') }}" enctype="multipart/form-data" class="form-horizontal has-success has-feedback" role="form" method="post">
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Room Name</label>
        <div class="col-sm-10">
          <input type="hidden" name="id" value="{{ $room->id }}">
          <input type="text" name="name_room" class="form-control" id="inputEmail3" value="{{ $room->name_room }}">
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
          <input type="text" name="adult_capacity" class="form-control" id="inputEmail3" value="{{ $room->adult_capacity }}">
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
          <input type="text" name="child_capacity" class="form-control" id="inputEmail3" value="{{ $room->child_capacity }}">
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
          <textarea class="form-control" name="facility" id="ckeditor" rows="3">{{ $room->facility }}</textarea>
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
          <input type="text" name="count" class="form-control" id="inputEmail3" value="{{ $room->count }}">
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
          <img src="{{ asset("uploads/".$room->image ) }}" width="100px" height="100px">
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
          <button type="submit" class="btn btn-default blue">Update</button>
        {{ Form::token() }}
        <a href="{{ URL::Route('rooms'); }}" class="btn btn-default blue">Cancel</a>
        </div>
      </div>
    </form>
      </form> <div class=" clearfix"></div>         
  </div>

 
@stop