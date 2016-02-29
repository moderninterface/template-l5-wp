@extends('template')

@section('title', 'About')

@section('meta')
	<meta name="description" content="Description here.">
	<meta property="og:description" content="Description here.">
	<meta property="og:image" content="{{ asset('img/image.jpg') }}">
@endsection

@section('js')
@endsection

@section('content')
<div id="pages-about">
	<div class="row">
		<div class="large-12 columns">
			<h1>About Page</h1>
		</div>
	</div>
</div>
@endsection
