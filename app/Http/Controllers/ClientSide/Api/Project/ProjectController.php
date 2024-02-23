<?php

namespace App\Http\Controllers\ClientSide\Api\Project;

use App\Http\Controllers\Controller;
use App\Services\OperationsService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    use ApiResponse;

    private $operationService;

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

            $request->validate([
                'pagination' => 'nullable|integer',
                'type' => 'nullable|string|in:compound,apartment'
            ]);

            $services = $this->operationService->Project->index($request->pagination ?? 10, $request->type ?? 'compound');
            return $this->apiResponse($services, 'success', 200);
        } catch (\Exception $exception) {
            return $this->apiResponse(null, $exception->getMessage(), 500);
        }

    }

    function register(Request $request, $id)
    {
        try {
            $data = $request->validate([
                'phone' => 'required|string',
                'email' => 'required|email',
                'name' => 'required|string'
            ]);

            $this->operationService->Project->register($id, $data);
            return $this->apiResponse(null, 'success', $this->SUCCESS_CODE);
        } catch (\Exception $exception) {
            return $this->apiResponse(null, $exception->getMessage(), $this->SERVER_ERROR_CODE);
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
