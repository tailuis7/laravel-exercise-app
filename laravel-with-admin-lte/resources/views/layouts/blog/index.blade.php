@extends('layouts/layout')

@section('content')
	
	<?php if (empty($checkLogin)) : ?>
	<a href="{{ url('/login') }}">Login</a> | <a href="{{ url('/register') }}">Register</a>
	<?php else : ?>
	<a href="{{ url('/logout') }}">Logout</a>
	<br /><br /><br />
	<a href="{{ url('/create') }}">Create Blog</a>
	<?php endif; ?>
	<h2>This is Home Page</h2>
	<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
		@if(Session::has('alert-' . $msg))

		<h2 class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} 	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		</h2>
		@endif
    @endforeach
  	</div> <!-- end .flash-message -->
	<h3>Blogs</h3>
	<hr />
	@foreach ($blogs as $blog)
	Title: <a href="{{ url('/blog_detail') }}">{{ $blog->title }}</a href="{{ url('/blog_detail') }}">
	<p>Body: {{ $blog->body }}</p>
	<span>Author: {{ $blog->name }}</span>
	<hr />
	@endforeach
	
@endsection