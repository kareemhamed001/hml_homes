<?php

namespace App\Http\Controllers\Dashboard\Web\About;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    function index(){
        return view('dashboard.about.index');
    }
}
