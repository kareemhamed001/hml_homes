<?php

namespace App\Http\Controllers\Dashboard\Api\Service;

use App\Http\Controllers\Controller;
use App\Services\OperationsService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class ServiceController extends Controller
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
            $services = $this->operationService->Service->index($request->pagination ?? 10);
            return $this->apiResponse($services, 'success', 200);
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
        try {
            $data = $request->all();

            $service = $this->operationService->Service->store($data);
            return $this->apiResponse($service, 'success', 200);
        } catch (\Exception $exception) {
            return $this->apiResponse(null, $exception->getMessage(), 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $service = $this->operationService->Service->show($id);
            return $this->apiResponse($service, 'success', 200);
        } catch (\Exception $exception) {
            return $this->apiResponse(null, $exception->getMessage(), 500);
        }
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
        try {

            $data = $request->validate([
                'title' => 'nullable|string|max:255',
                'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'status' => 'nullable|in:active,inactive',
            ]);

            $service = $this->operationService->Service->update($id, $data);
            return $this->apiResponse($service, 'success', 200);
        } catch (\Exception $exception) {
            return $this->apiResponse(null, $exception->getMessage(), 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {

            $service = $this->operationService->Service->delete($id);
            return $this->apiResponse($service, 'success', 200);
        } catch (\Exception $exception) {
            return $this->apiResponse(null, $exception->getMessage(), 500);
        }
    }
}
