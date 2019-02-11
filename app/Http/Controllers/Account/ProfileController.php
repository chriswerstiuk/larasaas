<?php

namespace App\Http\Controllers\Account;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Account\ProfileUpdateRequest;

class ProfileController extends Controller
{
    public function index()
    {
        return view('account.profile.index');
    }

    public function update(User $user, ProfileUpdateRequest $request)
    {
        $user->update($request->only('name', 'email'));

        return back()->withSuccess('Your profile is updated.');
    }
}
