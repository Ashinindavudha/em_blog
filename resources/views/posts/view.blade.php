@extends("layouts.app")

@section("content")
	<div class="container">

		@if(session('info'))
			<div class="alert alert-info">
				{{ session('info') }}
			</div>
		@endif

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

				<div class="pull-right"> <!-- float-right -->
					<a href="{{ url("/posts/edit/$post->id") }}">
						<i class="fas fa-edit"></i> Edit
					</a> | 
					<a class="text-danger" 
						href="{{ url("/posts/delete/$post->id") }}">
						<i class="fas fa-trash"></i>
					</a>
				</div>
			</div>
		</div>

		<hr>
		<h2>Comments ({{ count($post->comments) }})</h2>
		<ul class="list-group">
			@foreach($post->comments as $comment)
				<li class="list-group-item">
					<a class="pull-right"
						href="{{ url("/comments/delete/$comment->id") }}">
						<i class="far fa-times-circle"></i>
					</a>
					{{ $comment->comment }}
					<small class="text-muted muted">
						-- {{ $comment->user->name }}
					</small>
				</li>
			@endforeach
		</ul>
		<form action="{{ url("/comments/add") }}" method="post">
			{{ csrf_field() }}
			<input type="hidden" name="post_id" value="{{ $post->id }}">
			<textarea name="comment" class="form-control"></textarea>
			<input type="submit" value="Add Comment" class="btn btn-default">
		</form>
		<br><br><br>
	</div>
@endsection