@extends('layouts.master')

@section('content')
    <div class="h-2 bg-indigo"></div>
    <div class="container mx-auto px-4 md:px-8 py-4">
    	@include('layouts.partials._nav')

        <div class="mx-auto max-w-md mt-16">
            <div class="bg-white rounded shadow">
                <div class="border-b border-grey-lighter py-8 font-bold text-grey-darkest text-center text-xl tracking-wide uppercase">
                    {{ __('Two Factor Authentication') }}
                </div>

                <form class="px-8 py-8" method="POST" action="{{ route('login.twofactor.verify') }}">
                    @csrf

                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3 mb-6 md:mb-0">
                            <label for="token" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
                                {{ __('Verification Token') }}
                            </label>

                            <input type="text" name="token" id="token" class="appearance-none block w-full bg-grey-lighter text-grey-darker border rounded border-grey-lighter focus:outline-none focus:border-indigo-dark py-3 px-4 mb-3" placeholder="118xe8" value="{{ old('token') }}" required autofocus>

                            @if ($errors->has('token'))
                                <div class="mt-2" role="alert">
                                    <p class="text-red text-xs font-semibold tracking-wide">{{ $errors->first('token') }}</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="px-3">
                            <button type="submit" class="rounded bg-indigo hover:bg-indigo-dark w-full p-4 text-sm text-white uppercase font-bold tracking-wide focus:outline-none">
                                {{ __('Verify') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
