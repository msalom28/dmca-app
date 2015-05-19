@extends('app')

@section('content')
	<h1 class="page-heading">Your notices</h1>

	<table class="table table-stripped table-bordered">
		<thead>
			<th>This Content</th>
			<th>Accessible here:</th>
			<th>Is Infringing my work here:</th>
			<th>Notice Sent:</th>
			<th>Content Removed:</th>
		</thead>
		<tbody>
			@foreach ($notices as $notice)
				<tr>
					<td>{!! $notice->infringing_title !!}</td>
					<td>{!! link_to($notice->infringing_link) !!}</td>
					<td>{!! link_to($notice->original_link) !!}</td>
					<td>{!! $notice->created_at->diffForHumans() !!}</td>
					<td>
						{!! Form::open(['method' => 'PATCH', 'url' => 'notices/' . $notice->id]) !!}
						<div class="checkbox">
							<label>
								{!! Form::checkbox('content_removed', $notice->content_removed, $notice->content_removed) !!}
							</label>
						</div>
						{!! Form::submit('submit', ['class' => 'btn btn-default']) !!}
						{!! Form::close() !!}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
		@unless(count($notices))
			<p class="text-center">You haven't sent any DMCA notices yet!</p>
		@endunless



@endsection