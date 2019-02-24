@extends('layouts.default')

@section('default.content')
    <div class="bg-white rounded shadow">
        <div class="border-b border-grey-lighter py-8 font-bold text-grey-darkest text-center text-xl tracking-wide uppercase">
            {{ __('Impersonate A User') }}
        </div>

        <form class="px-8 py-8" method="POST" action="{{ route('admin.impersonate.store') }}">
            @csrf

            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3 mb-6 md:mb-0">
                    <label for="email" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
                        {{ __('E-Mail Address') }}
                    </label>

                    <input type="email" name="email" id="email" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded p-3 focus:outline-none focus:border-indigo-dark" placeholder="john@example.com" value="{{ old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                        <div class="mt-2" role="alert">
                            <p class="text-red text-xs font-semibold tracking-wide">{{ $errors->first('email') }}</p>
                        </div>
                    @endif
                </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="px-3">
                    <button type="submit" class="rounded bg-indigo hover:bg-indigo-dark w-full p-4 text-sm text-white uppercase font-bold tracking-wide focus:outline-none">
                        {{ __('Impersonate') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
