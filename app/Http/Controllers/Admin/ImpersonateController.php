<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ImpersonateStoreRequest;

class ImpersonateController extends Controller
{
    public function index()
    {
    	return view('admin.impersonate.index');
    }

    public function store(ImpersonateStoreRequest $request)
    {
    	$user = User::where('email', $request->email)->first();

    	session()->put('impersonate', $user->id);

    	return redirect('/dashboard');
    }

    public function destroy()
    {
    	session()->forget('impersonate');

    	return redirect('/dashboard');
    }
}
