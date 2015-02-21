<!-- app/views/nerds/create.blade.php -->

<!DOCTYPE html>
<html>
<head>
	<title>Look! I'm CRUDding</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
	<div class="navbar-header">
		<a class="navbar-brand" href="{{ URL::to('wines') }}">Wine Alert</a>
	</div>
	<ul class="nav navbar-nav">
		<li><a href="{{ URL::to('wines') }}">View All Wines</a></li>
		<li><a href="{{ URL::to('wine/create') }}">Create a Wine</a>
	</ul>
</nav>

<h1>Create a Wine</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('route' => 'wine_store')) }}

	<div class="form-group">
		{{ Form::label('name', 'Name') }}
		{{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('img_file_path', 'img_file_path') }}
		{{ Form::text('img_file_path', Input::old('img_3'), array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('varietal', 'varietal') }}
		{{ Form::text('varietal', Input::old('email'), array('class' => 'form-control')) }}
	</div>
	
	<div class="form-group">
		{{ Form::label('region', 'region') }}
		{{ Form::text('region', Input::old('region'), array('class' => 'form-control')) }}
	</div>
	
	<div class="form-group">
		{{ Form::label('vintage', 'vintage') }}
		{{ Form::text('vintage', Input::old('vintage'), array('class' => 'form-control')) }}
	</div>
	
	<div class="form-group">
		{{ Form::label('profile', 'profile') }}
		{{ Form::text('profile', Input::old('profile'), array('class' => 'form-control')) }}
	</div>
	
	<div class="form-group">
		{{ Form::label('color', 'color') }}
		{{ Form::text('color', Input::old('color'), array('class' => 'form-control')) }}
	</div>
	
	<div class="form-group">
		{{ Form::label('alcohol_content', 'alcohol_content') }}
		{{ Form::text('alcohol_content', Input::old('alcohol_content'), array('class' => 'form-control')) }}
	</div>
	
	<div class="form-group">
		{{ Form::label('rating', 'rating') }}
		{{ Form::text('rating', Input::old('rating'), array('class' => 'form-control')) }}
	</div>

	{{ Form::submit('Create the Wine!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>