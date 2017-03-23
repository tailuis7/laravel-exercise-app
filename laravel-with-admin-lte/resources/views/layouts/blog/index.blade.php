@extends('layouts/layout')

@section('content')
	
	<?php if (empty($checkLogin)) : ?>
	<a href="{{ url('/login') }}">Login</a> | <a href="{{ url('/register') }}">Register</a>
	<?php else : ?>
	<a href="{{ url('/logout') }}">Logout</a>
	<?php endif; ?>
	<h2>This is Home Page</h2>

	<h3>Blogs</h3>
	<hr />
	@foreach ($blogs as $blog)
	<a href="{{ url('/blog_detail') }}">Title: {{ $blog->title }}</a href="{{ url('/blog_detail') }}">
	<p>Body: {{ $blog->body }}</p>
	<span>Author: {{ $blog->name }}</span>
	<hr />
	@endforeach
	
@endsection