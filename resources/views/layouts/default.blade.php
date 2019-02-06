@extends('layouts.master')

@section('content')
	<div class="h-2 bg-indigo-dark"></div>
	<div class="container mx-auto px-4 md:px-8 py-4">
		@include('layouts.partials._nav')

		<div class="mt-16">
			<div class="flex -mx-4">
				<div class="w-1/4 px-4">
					@include('layouts.partials._sidebar')
				</div>
				<div class="w-3/4 px-4">
					@yield('default.content')
				</div>
			</div>
		</div>
	</div>
@endsection
