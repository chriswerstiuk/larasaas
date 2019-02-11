@extends('account.layouts.default')

@section('account.content')
	<div class="bg-white rounded shadow">
		<div class="border-b border-grey-lighter py-8 font-bold text-grey-darkest text-center text-xl tracking-wide uppercase">
			{{ __('Two Factor') }}
		</div>

		@if (auth()->user()->twoFactorEnabled())
			<div class="px-8 py-8">
				<p class="mb-4">Two factor authentication is enabled for your account.</p>

				<form method="POST" action="{{ route('account.twoFactor.destroy') }}">
					@csrf
					@method('DELETE')

					<div class="flex flex-wrap -mx-3 mb-6">
						<div class="px-3">
							<button type="submit" class="rounded bg-indigo hover:bg-indigo-dark w-full p-4 text-sm text-white uppercase font-bold tracking-wide focus:outline-none">
								{{ __('Disable') }}
							</button>
						</div>
					</div>
				</form>
			</div>
		@else
			@if (auth()->user()->twoFactorPendingVerification())
				<form class="px-8 py-8" method="POST" action="{{ route('account.twoFactor.verify') }}">
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
			@else
				<form class="px-8 py-8" method="POST" action="{{ route('account.twoFactor.store') }}">
					@csrf

					<div class="flex flex-wrap -mx-3 mb-6">
		                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
		                    <label for="dial_code" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
		                        {{ __('Dialing Code') }}
		                    </label>

		                    <div class="relative">
		        				<select name="dial_code" id="dial_code" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter focus:outline-none focus:border-indigo-dark rounded py-3 px-4 mb-3" required>
		        					@foreach ($countries as $country)
		        						<option value="{{ $country->dial_code }}">{{ $country->name }} (+{{ $country->dial_code }})</option>
		        					@endforeach
		        				</select>

		        				<div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
		          					<svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
		        				</div>
		      				</div>

		                    @if ($errors->has('dial_code'))
		                        <div class="mt-2" role="alert">
		                            <p class="text-red text-xs font-semibold tracking-wide">{{ $errors->first('dial_code') }}</p>
		                        </div>
		                    @endif
		                </div>

		                <div class="w-full md:w-2/3 px-3">
		                    <label for="phone" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
		                        {{ __('Phone Number') }}
		                    </label>

		                    <input type="text" name="phone" id="phone" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter focus:outline-none focus:border-indigo-dark rounded py-3 px-4 mb-3" placeholder="23301934" required>

		                    @if ($errors->has('phone'))
		                        <div class="mt-2" role="alert">
		                            <p class="text-red text-xs font-semibold tracking-wide">{{ $errors->first('phone') }}</p>
		                        </div>
		                    @endif
		                </div>
		            </div>

					<div class="flex flex-wrap -mx-3 mb-6">
						<div class="px-3">
							<button type="submit" class="rounded bg-indigo hover:bg-indigo-dark w-full p-4 text-sm text-white uppercase font-bold tracking-wide focus:outline-none">
								{{ __('Enable') }}
							</button>
						</div>
					</div>
				</form>
			@endif
		@endif
	</div>
	@if (auth()->user()->twoFactorPendingVerification())
		<form class="px-8 py-6" method="POST" action="{{ route('account.twoFactor.destroy') }}">
			@csrf
			@method('DELETE')

			<div class="flex flex-wrap -mx-3 mb-6">
				<div class="px-3">
					<button type="submit" class="w-full text-md text-grey-darker font-bold tracking-wide hover:underline hover:text-indigo-dark">
						{{ __('Cancel Verification') }}
					</button>
				</div>
			</div>
		</form>
	@endif

@endsection
