@extends("layouts.app")

@section("content")
	<div class="container">
		<h1>Post List</h1>

		@if(session('info'))
			<div class="alert alert-info">
				{{ session('info') }}
			</div>
		@endif

		{{ $posts->links() }}

		@foreach($posts as $post)
			<div class="panel panel-default"> <!-- card -->
				<div class="panel-heading"> <!-- card-header -->
					<a href="{{ url("posts/view/$post->id") }}">
						{{ $post->title }}
					</a>
				</div>
				<div class="panel-body"> <!-- card-body -->
					{{ $post->body }}
				</div>
				<div class="panel-footer"> <!-- card-footer -->
					<b>Category :</b> {{ $post->category->name }},
					<b>By</b> {{ $post->user->name }},
					{{ $post->created_at->diffForHumans() }}

					<div class="pull-right">
						<span class="badge">
							{{ count($post->comments) }}
						</span>
						Comments
					</div>
				</div>
			</div>
		@endforeach
	</div>
@endsection