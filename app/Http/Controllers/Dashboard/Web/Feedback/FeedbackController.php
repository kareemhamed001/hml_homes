<?php

namespace App\Http\Controllers\Dashboard\Web\Feedback;

use App\Http\Controllers\Controller;
use App\Services\OperationsService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    use ApiResponse;
    private $operationService ;

    function __construct()
    {
        $this->operationService = OperationsService::getInstance();
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            return view('dashboard.feedback.index');
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
