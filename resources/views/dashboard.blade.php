@extends('layouts.default')

@section('default.content')
    <div class="bg-white rounded shadow">
        <div class="border-b border-grey-lighter py-8 font-bold text-grey-darkest text-center text-xl tracking-wide uppercase">
            Dashboard
        </div>

        <div class="px-8 py-8">
			@if (session('status'))
                <div class="bg-green-lightest border-l-4 border-green text-green-dark p-4 mb-6" role="alert">
                    <p class="font-bold">{{ session('status') }}</p>
                </div>
            @endif

            You are logged in!
        </div>
    </div>
@endsection
