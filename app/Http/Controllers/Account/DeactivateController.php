<?php

namespace App\Http\Controllers\Account;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Account\DeactivateStoreRequest;

class DeactivateController extends Controller
{
    public function index()
    {
        return view('account.deactivate.index');
    }

    public function update(User $user, DeactivateStoreRequest $request)
    {
        Auth::logout();

        $user->delete();

        return redirect()->route('login')->withSuccess('Your account has been deactivated.');
    }
}
