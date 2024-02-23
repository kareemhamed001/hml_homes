<?php

namespace App\Http\Controllers\Dashboard\Web\Cover;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CoverController extends Controller
{
    function index(){
        return view('dashboard.covers.index');
    }
}
