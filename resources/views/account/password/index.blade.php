@extends('account.layouts.default')

@section('account.content')
	<div class="bg-white rounded shadow">
		<div class="border-b border-grey-lighter py-8 font-bold text-grey-darkest text-center text-xl tracking-wide uppercase">
			{{ __('Update Profile') }}
		</div>

		<form class="px-8 py-8" method="POST" action="{{ route('account.password.update', auth()->id()) }}">
			@csrf
			@method('PATCH')

			<div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3 mb-6 md:mb-0">
                    <label for="password-current" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
                        {{ __('Current Password') }}
                    </label>

                    <input type="password" name="password_current" id="password-current" class="appearance-none block w-full bg-grey-lighter text-grey-darker border rounded border-grey-lighter focus:outline-none focus:border-indigo-dark py-3 px-4 mb-3" placeholder="********" required autofocus>

                    @if ($errors->has('password_current'))
                        <div class="mt-2" role="alert">
                            <p class="text-red text-xs font-semibold tracking-wide">{{ $errors->first('password_current') }}</p>
                        </div>
                    @endif
                </div>
            </div>

			<div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label for="password" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
                        {{ __('New Password') }}
                    </label>

                    <input type="password" name="password" id="password" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter focus:outline-none focus:border-indigo-dark rounded py-3 px-4 mb-3" placeholder="********" required>

                    @if ($errors->has('password'))
                        <div class="mt-2" role="alert">
                            <p class="text-red text-xs font-semibold tracking-wide">{{ $errors->first('password') }}</p>
                        </div>
                    @endif
                </div>

                <div class="w-full md:w-1/2 px-3">
                    <label for="password-confirm" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
                        {{ __('Confirm Password') }}
                    </label>

                    <input type="password" name="password_confirmation" id="password-confirm" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter focus:outline-none focus:border-indigo-dark rounded py-3 px-4 mb-3" placeholder="********" required>
                </div>
            </div>

			<div class="flex flex-wrap -mx-3 mb-6">
				<div class="px-3">
					<button type="submit" class="rounded bg-indigo hover:bg-indigo-dark w-full p-4 text-sm text-white uppercase font-bold tracking-wide focus:outline-none">
						{{ __('Change') }}
					</button>
				</div>
			</div>
		</form>
	</div>
@endsection
