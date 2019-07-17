<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends AccountBaseController
{
    //
    public function index(Request $request)
    {
        # code...
        return view("account.profile.profile");
    } //
    public function logout(Request $request)
    {
        # code...
        auth()->logout();
        return redirect(url('/'));
    }
}
