@extends('layouts.admin')

@section('content')

	<!-- CONTENT -->
	<div class="main-content">
		<!-- FORM -->
		<h2>Edit Email Content</h2>		
		<form action="{{ URL::Route('email-edit-post') }}" class="form-horizontal has-success has-feedback" role="form" method="post">
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Type</label>
		    <div class="col-sm-10">
		    <input type="hidden" name="id" value="{{ $emails->id }}">
		      <input type="text" name="type" class="form-control" id="inputEmail3" placeholder="{{ $emails->email_name }}" disabled>
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Subject</label>
		    <div class="col-sm-10">
		      <input type="text" name="subject" class="form-control" id="inputEmail3" placeholder="First Name" value="{{ $emails->email_subject }}">
		      @if($errors->has('subject'))
					{{ $errors->first('subject') }}
				@endif
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Content</label>
		    <div class="col-sm-10">
		     <textarea class="form-control" name="content" id="ckeditor" rows="3">{{ $emails->email_html }}</textarea>
		      @if($errors->has('content'))
					{{ $errors->first('content') }}
				@endif
		    </div>
		  </div>
		  
		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <button type="submit" class="btn btn-default">Update</button>
				{{ Form::token() }}
		    </div>
		  </div>
		</form>

	</div> <!-- main-content -->

@stop