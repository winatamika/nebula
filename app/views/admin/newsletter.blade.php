@extends('layouts.admin')

@section('content')

	<!-- CONTENT -->
	<div class="main-content">

		<!-- <div class="progress">
		    <div class="progress-bar" role="progressbar" data-transitiongoal="100"></div>
		</div> -->

		<!-- FORM -->
		<h2>News Letter</h2>
		<form action="{{ URL::route('newsletter-send') }}" class="form-horizontal has-success has-feedback" role="form" method="post">
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Subject</label>
		    <div class="col-sm-10">
		      <input type="text" name="subject" class="form-control" id="inputEmail3" placeholder="Subject"{{ (Input::old('subject'))? ' value="' . Input::old('subject') . '"' : '' }}>
				@if($errors->has('subject'))
					{{ $errors->first('subject') }}
				@endif
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Content</label>
		    <div class="col-sm-10">
		      <textarea class="form-control" name="content" id="ckeditor" rows="3">{{ (Input::old('content'))? Input::old('content') : '' }}</textarea>
		      @if($errors->has('content'))
					{{ $errors->first('content') }}
				@endif
		    </div>
		  </div>
		  
		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <button type="submit" class="btn btn-default">Send</button>
				{{ Form::token() }}
		    </div>
		  </div>
		</form>

	</div> <!-- main-content -->

@stop