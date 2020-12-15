<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('account.index', ['user' => Auth::user()->name]);
    }
}
