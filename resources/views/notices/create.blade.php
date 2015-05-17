@extends('app')

@section('content')
	<h1 class="page-heading">Prepare DMCA Notice</h1>
	{!! Form::open() !!}

		<div class="form-group">
			{!! Form::label('provider_id', 'Who are we sending this to?') !!}
			{!! Form::select('provider_id', [], null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('infringing_title', 'Infringing_title:') !!}
			{!! Form::text('infringing_title', null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('infringing_link', 'Infringing_link:') !!}
			{!! Form::text('infringing_link', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('original_link', 'Original_link:') !!}
			{!! Form::text('original_link', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('original_description', 'Original_description:') !!}
			{!! Form::text('original_description', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Preview Notice', ['class' => 'btn btn-primary form-control']) !!}
		</div>

	{!! Form::close() !!}
@endsection