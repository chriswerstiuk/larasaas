@extends('account.layouts.default')

@section('account.content')
	<div class="bg-white rounded shadow">
		<div class="border-b border-grey-lighter py-8 font-bold text-grey-darkest text-center text-xl tracking-wide uppercase">
			{{ __('Update Profile') }}
		</div>

		<form class="px-8 py-8" method="POST" action="{{ route('account.profile.update', auth()->id()) }}">
			@csrf
			@method('PATCH')

			<div class="flex flex-wrap -mx-3 mb-6">
				<div class="w-full px-3 mb-6 md:mb-0">
					<label for="name" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
						{{ __('Name') }}
					</label>

					<input type="text" name="name" id="name" class="appearance-none block w-full bg-grey-lighter text-grey-darker border rounded border-grey-lighter focus:outline-none focus:border-indigo-dark py-3 px-4 mb-3" placeholder="John Doe" value="{{ old('name', auth()->user()->name) }}" required autofocus>

					@if ($errors->has('name'))
						<div class="mt-2" role="alert">
							<p class="text-red text-xs font-semibold tracking-wide">{{ $errors->first('name') }}</p>
						</div>
					@endif
				</div>
			</div>

			<div class="flex flex-wrap -mx-3 mb-6">
				<div class="w-full px-3">
					<label for="email" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
						{{ __('E-Mail Address') }}
					</label>

					<input type="email" name="email" id="email" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter focus:outline-none focus:border-indigo-dark rounded py-3 px-4 mb-3" placeholder="johndoe@example.com" value="{{ old('email', auth()->user()->email) }}" required>

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
						{{ __('Update') }}
					</button>
				</div>
			</div>
		</form>
	</div>
@endsection
