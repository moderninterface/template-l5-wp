@extends('template')

@section('title', 'Home')

@section('meta')
	<meta name="description" content="Description here.">
	<meta property="og:description" content="Description here.">
	<meta property="og:image" content="{{ asset('img/image.jpg') }}">
@endsection

@section('js')
@endsection

@section('content')
	<div id="page-home">
		<div class="row">
			<div class="large-12 columns">
				<h1>Laravel 5 and Bootstrap Template</h1>
			</div>
		</div>
	</div>
@endsection
