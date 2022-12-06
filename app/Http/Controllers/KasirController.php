<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class KasirController extends Controller
{
    public function index()
    {
        return view('layout.home')->with([
            'user' => Auth::user()
        ]);
    }
}
