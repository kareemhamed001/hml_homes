<?php

namespace App\Http\Controllers\Dashboard\Api\Project;

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
            $services = $this->operationService->Project->index($request->pagination ?? 10, $request->type ?? 'compound');
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

            $data = $request->validate([
                'project_name' => ['required', 'string', 'max:255'],
                'project_summary' => ['required', 'string', 'max:255'],
                'project_description' => ['nullable', 'string'],
                'type' => ['required', 'string', 'in:compound,apartment'],
                'features' => ['nullable', 'array'],
                'features.*.image' => ['required_with:features', 'image'],
                'features.*.title' => ['required_with:features', 'string', 'max:50'],
                'project_cover_image' => ['required', 'image'],
                'manager_name' => ['required', 'string', 'max:255'],
                'manager_description' => ['nullable', 'string'],
                'manager_image' => ['required', 'image'],
                'images' => ['nullable', 'array'],
                'images.*.image' => ['required_with:images', 'image'],
                'images.*.type' => ['required_with:images', 'string', 'in:outside'],
                'photos' => ['nullable', 'array'],
                'photos.*.image' => ['required_with:photos', 'image'],
                'photos.*.type' => ['required_with:images', 'string', 'in:inside'],
                'prices' => ['nullable', 'array'],
                'prices.*.configuration' => ['required_with:prices', 'string'],
                'prices.*.area' => ['required_with:prices', 'string'],
                'prices.*.price' => ['required_with:prices', 'string'],
                'plans' => ['nullable', 'array'],
                'plans.*.step' => ['required_with:plans', 'string'],
                'plans.*.name' => ['required_with:plans', 'string'],
                'plans.*.description' => ['required_with:plans', 'string'],
                'project_location_image' => ['nullable', 'image'],
                'gps_location' => ['nullable', 'string'],
                'near_places' => ['nullable', 'array'],
                'near_places.*.id' => ['nullable', 'numeric'],
                'near_places.*.place' => ['required_if:near_places.*.id,null', 'string'],
                'near_places.*.distance' => ['nullable', 'string'],
                'near_places.*.time' => ['required_if:near_places.*.id,null', 'string'],

            ]);

            $project = $this->operationService->Project->store($data);
            return $this->apiResponse($project, 'success', 200);
        } catch (\Exception $exception) {
            return $this->apiResponse(null, $exception->getMessage(), 500);
        }
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
        try {
            $data = $request->validate([
                'project_name' => ['required', 'string', 'max:255'],
                'project_summary' => ['required', 'string', 'max:255'],
                'project_description' => ['nullable', 'string'],
                'type' => ['required', 'string', 'in:compound,apartment'],
                'features' => ['nullable', 'array'],
                'features.*.image' => ['required_if:features.*.id,null', 'image'],
                'features.*.title' => ['required_with:features', 'string', 'max:50'],
                'features.*.id' => ['nullable', 'numeric'],
                'project_cover_image' => ['nullable', 'image'],
                'manager_name' => ['required', 'string', 'max:255'],
                'manager_description' => ['required', 'string'],
                'manager_image' => ['nullable', 'image'],
                'images' => ['nullable', 'array'],
                'images.*.image' => ['required_if:images.*.id,null', 'image'],
                'images.*.type' => ['required_with:images', 'string', 'in:outside'],
                'images.*.id' => ['nullable', 'numeric'],
                'photos' => ['nullable', 'array'],
                'photos.*.image' => ['required_if:photos.*.id,null', 'image'],
                'photos.*.type' => ['required_with:photos', 'string', 'in:inside'],
                'photos.*.id' => ['nullable', 'numeric'],
                'prices' => ['nullable', 'array'],
                'prices.*.configuration' => ['required_with:prices', 'string'],
                'prices.*.area' => ['required_with:prices', 'string'],
                'prices.*.price' => ['required_with:prices', 'string'],
                'prices.*.id' => ['nullable', 'numeric'],
                'plans' => ['nullable', 'array'],
                'plans.*.step' => ['required_with:plans', 'string'],
                'plans.*.name' => ['required_with:plans', 'string'],
                'plans.*.description' => ['required_with:plans', 'string'],
                'plans.*.id' => ['nullable', 'numeric'],
                'project_location_image' => ['nullable', 'image'],
                'gps_location' => ['nullable', 'string'],
                'near_places' => ['nullable', 'array'],
                'near_places.*.place' => ['required_with:near_places', 'string'],
                'near_places.*.distance' => ['nullable', 'string'],
                'near_places.*.time' => ['required_with:near_places', 'string'],
                'near_places.*.id' => ['nullable', 'numeric'],
            ]);

            $project = $this->operationService->Project->update($id, $data);
            return $this->apiResponse($project, 'success', 200);
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
            $this->operationService->Project->delete($id);
            return $this->apiResponse('', 'success', 200);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    function customers($id,Request $request)
    {
        try {
            $project = $this->operationService->Project->customers($id,$request->pagination ?? 10);
            return $this->apiResponse($project, 'success', 200);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }

    }
}
