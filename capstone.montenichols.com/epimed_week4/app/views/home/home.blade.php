@extends ('layouts.masterLayout')

@section ('header')
	@parent
	<h2>Home Page</h2>
@stop

@section ('content')	
	@unless(Auth::check())
		{{ Form::open (array ('url' => 'login', 'method' => 'post')) }}
			@if ($errors->has('login'))
				<div class="alert alert-error">{{ $errors->first('login', ':message') }}</div>
			@endif

			<div class="control-group">
				{{ Form::label('username', 'Username', array('class' => 'control-label')) }}
				<div class="controls">
					{{ Form::text('username') }}
				</div>
			</div>

			<div class="control-group">
				{{ Form::label('password', 'Password') }}
				<div class="controls">
					{{ Form::password('password') }}
				</div>
			</div>

			<br>
			
			<div class="form-actions">
				{{ Form::submit('Login', array('class' => 'btn btn-inverse btn-login')) }}
			</div>

		{{ Form::close (); }}
	@else
		<p>You are already logged in. Would you like to <a href="{{ URL::to ('logout') }}">logout</a>?</p>
	@endunless				
@stop