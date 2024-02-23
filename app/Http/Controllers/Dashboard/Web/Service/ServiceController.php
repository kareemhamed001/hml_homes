<?php

namespace App\Http\Controllers\Dashboard\Web\Service;

use App\Http\Controllers\Controller;
use App\Services\OperationsService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        try {
            return view('dashboard.covers.index');
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }

    }


}
