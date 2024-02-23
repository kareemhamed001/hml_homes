<?php

namespace App\Http\Controllers\Dashboard\Web\Contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    function index(Request $request)
    {
        return view('dashboard.contact.index');
    }
}
