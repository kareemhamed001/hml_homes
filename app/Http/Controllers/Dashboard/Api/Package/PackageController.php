<?php

namespace App\Http\Controllers\Dashboard\Api\Package;

use App\Http\Controllers\Controller;
use App\Services\OperationsService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class PackageController extends Controller
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
            $services = $this->operationService->Package->index($request->pagination??10);
            return $this->apiResponse($services,'success', 200);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }

    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $service = $this->operationService->Package->store($request->all());
            return $this->apiResponse($service,'success', 200);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $service = $this->operationService->Package->show($id);
            return $this->apiResponse($service,'success', 200);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $service = $this->operationService->Package->update($id,$request->all());
            return $this->apiResponse($service,'success', 200);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $service = $this->operationService->Package->delete($id);
            return $this->apiResponse($service,'success', 200);
        } catch (\Exception $exception) {
            return $this->apiResponse(null,$exception->getMessage(), 500);
        }
    }
}
