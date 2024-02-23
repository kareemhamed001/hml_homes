<?php

namespace App\Http\Controllers\Dashboard\Web\ExclusiveProperty;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExclusivePropertyController extends Controller
{
    function index(){
        return view('dashboard.exclusiveProperty.index');
    }
}
