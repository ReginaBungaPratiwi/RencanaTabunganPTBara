<?php

namespace App\Http\Controllers;

use App\Models\Tabungan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
{
    $tabungans = Tabungan::where('user_id', Auth::id())->get();
    return view('home', compact('tabungans'));
}

}
