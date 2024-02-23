<?php

namespace App\Http\Controllers\Dashboard\Web\OffPlan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OffPlanController extends Controller
{
    function index(){
        return view('dashboard.offPlan.index');
    }
}
