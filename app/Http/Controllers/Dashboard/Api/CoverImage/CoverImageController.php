<?php

namespace App\Http\Controllers\Dashboard\Api\CoverImage;

use App\Http\Controllers\Controller;
use App\Services\OperationsService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class CoverImageController extends Controller
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
            $coverImages = $this->operationService->CoverImage->index($request->pagination??8);
            return $this->apiResponse($coverImages,'success', 200);
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
            $data=$request->validate([
                'name' => 'nullable|string|max:255',
                'description' => 'nullable|string|max:255',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
                'status' => 'required|in:active,inactive'
            ]);
            $coverImage = $this->operationService->CoverImage->store($data);
            return $this->apiResponse($coverImage,'success', 200);
        } catch (\Exception $exception) {
            return $this->apiResponse(null,$exception->getMessage(), 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $coverImage = $this->operationService->CoverImage->show($id);
            return $this->apiResponse($coverImage,'success', 200);
        } catch (\Exception $exception) {
            return $exception->getMessage();
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
            $data=$request->validate([
                'name' => 'nullable|string|max:255',
                'description' => 'nullable|string|max:255',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
                'status' => 'nullable|in:active,inactive'
            ]);
            $coverImage = $this->operationService->CoverImage->update($id, $data);
            return $this->apiResponse($coverImage,'success', 200);
        } catch (\Exception $exception) {
            return $this->apiResponse(null,$exception->getMessage(), 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $this->operationService->CoverImage->delete($id);
            return $this->apiResponse(null,'success', 200);
        }catch (\Exception $exception){
            return $this->apiResponse(null,$exception->getMessage(), 500);
        }
    }
}
