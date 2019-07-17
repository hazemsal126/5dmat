<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccountBaseController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:api', ['except' => ['register', 'login']]);

        $this->middleware('auth:web');
        $this->currentUser = auth()->user();
    }
}
