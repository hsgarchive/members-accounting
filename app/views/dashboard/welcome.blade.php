@extends('layouts.front')

@section('home')
	<div class="inner cover">
		<h1 class="cover-heading">HackerspaceSG Membership Management System</h1>
		<p class="lead">Membership Management for HackerspaceSG</p>
	</div>
@stop

@section('loginForm')
	<div class="login-social">
		<a href="<?= Social::login('google') ?>"><img src="/assets/official-google-plus-logo-tile.png"></a>
	</div>
@stop

@section('footer')
	<a href="http://hackerspace.sg">HackerspaceSG</a>. Twitter: <a href="https://twitter.com/hackerspacesg">@HackerspaceSG</a>. Facebook: <a href="https://www.facebook.com/HackerspaceSG">HackerspaceSG</a>.
@stop