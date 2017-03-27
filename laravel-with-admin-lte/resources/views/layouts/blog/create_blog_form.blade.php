@extends('layouts/layout')

@section('content')
	<h1>Create Post</h1>

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

	<form class="form-horizontal" method="POST" action="{{ url('/store') }}">
		{{ csrf_field() }}
		<div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Title</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="inputEmail3" placeholder="Title" name="title">
		    </div>
		</div>
		<br />
		<div class="form-group">
		    <label for="inputPassword3" class="col-sm-2 control-label">Body</label>
		    <div class="col-sm-10">
		    	<textarea name="body" id="" cols="30" rows="10" placeholder="Body"></textarea>
		    </div>
		</div>
		<div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <button type="submit" class="btn btn-default">Save</button>
		    </div>
		</div>
	</form>
<!-- Create Post Form -->
@endsection