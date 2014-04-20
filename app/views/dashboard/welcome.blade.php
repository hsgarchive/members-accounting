@extends('layouts.dashboard')

@section('home')
	<div class="inner cover">
		<h1 class="cover-heading">HackerspaceSG Memebership Management System</h1>
		<p class="lead">Membership Management for HackerspaceSG</p>
	</div>
@stop

@section('loginForm')
	{{ Form::open(array('url'=>'users/signin', 'class'=>'form-signin')) }}
	    <h2 class="form-signin-heading">Please Login</h2>
	 
	    {{ Form::text('email', null, array('class'=>'input-block-level', 'placeholder'=>'Email Address')) }}
	    <br/>
	    {{ Form::password('password', array('class'=>'input-block-level', 'placeholder'=>'Password')) }}
	 
	    {{ Form::submit('Login', array('class'=>'btn btn-large btn-primary btn-block'))}}
	{{ Form::close() }}
@stop

@section('footer')
	<a href="http://hackerspace.sg">HackerspaceSG</a>. Twitter: <a href="https://twitter.com/hackerspacesg">@HackerspaceSG</a>. Facebook: <a href="https://www.facebook.com/HackerspaceSG">HackerspaceSG</a>.
@stop