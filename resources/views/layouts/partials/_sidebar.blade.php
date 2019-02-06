<aside>
	<div class="mb-4">
		<p class="text-grey-dark tracking-wide font-normal uppercase mb-2">General</p>
		<div>
			<a href="{{ route('dashboard.index') }}" class="block p-4 rounded no-underline font-bold border-r-4 border-transparent {{ return_if_else(on_page('dashboard'), 'text-indigo-darker bg-indigo-lightest border-indigo', 'text-grey-darker hover:border-indigo hover:bg-indigo-lightest') }}">Dashboard</a>
		</div>
	</div>
	<div class="mb-4">
		<p class="text-grey-dark tracking-wide font-normal uppercase mb-2">Account</p>
		<div>
			<a href="{{ route('account.profile.index') }}" class="block p-4 rounded no-underline font-bold border-r-4 border-transparent {{ return_if_else(on_page('account/profile'), 'text-indigo-darker bg-indigo-lightest border-indigo', 'text-grey-darker hover:border-indigo hover:bg-indigo-lightest') }}">Setting</a>
			<a href="{{ route('account.password.index') }}" class="block p-4 rounded no-underline font-bold border-r-4 border-transparent {{ return_if_else(on_page('account/password'), 'text-indigo-darker bg-indigo-lightest border-indigo', 'text-grey-darker hover:border-indigo hover:bg-indigo-lightest') }}">Change Password</a>
			<a href="{{ route('account.deactivate.index') }}" class="block p-4 rounded no-underline font-bold border-r-4 border-transparent {{ return_if_else(on_page('account/deactivate'), 'text-indigo-darker bg-indigo-lightest border-indigo', 'text-grey-darker hover:border-indigo hover:bg-indigo-lightest') }}">Deactivate</a>
		</div>
	</div>
</aside>
