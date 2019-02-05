<?php

namespace App\Http\Controllers\Account;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\Account\PasswordUpdated;
use App\Http\Requests\Account\PasswordUpdateRequest;

class PasswordController extends Controller
{
    public function index()
    {
    	return view('account.password.index');
    }

    public function update(User $user, PasswordUpdateRequest $request)
    {
    	$user->update([
    		'password' => bcrypt($request->password)
    	]);

    	Mail::to($user)->send(new PasswordUpdated);

    	return back()->withSuccess('Your password is changed.');
    }
}
