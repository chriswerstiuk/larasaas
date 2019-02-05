<ul class="list-reset">
	<li>
		<a href="{{ route('account.index') }}" class="block p-4 rounded no-underline font-bold border-l-4 border-transparent {{ return_if_else(on_page('account'), 'text-indigo-darker bg-indigo-lightest border-indigo', 'text-grey-darker hover:border-indigo hover:bg-indigo-lightest') }}">Account Overview</a>
	</li>
	<li>
		<a href="{{ route('account.profile.index') }}" class="block p-4 rounded no-underline font-bold border-l-4 border-transparent {{ return_if_else(on_page('account/profile'), 'text-indigo-darker bg-indigo-lightest border-indigo', 'text-grey-darker hover:border-indigo hover:bg-indigo-lightest') }}">Update Profile</a>
	</li>
	<li>
		<a href="{{ route('account.password.index') }}" class="block p-4 rounded no-underline font-bold border-l-4 border-transparent {{ return_if_else(on_page('account/password'), 'text-indigo-darker bg-indigo-lightest border-indigo', 'text-grey-darker hover:border-indigo hover:bg-indigo-lightest') }}">Change Password</a>
	</li>
</ul>
