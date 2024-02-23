<?php

namespace App\Http\Controllers\Dashboard\Api\Settings;

use App\Http\Controllers\Controller;
use App\Services\OperationsService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class SettingsController extends Controller
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
            $services = $this->operationService->Setting->index();
            return $this->apiResponse($services, 'success', 200);
        } catch (\Exception $exception) {
            return $this->apiResponse(null, $exception->getMessage(), 500);
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
                'website_logo' => ['nullable','image','mimes:png,ico,svg'],
                'website_logo_dark' => ['nullable','image','mimes:png,ico,svg'],
                'website_name' => ['nullable','string','max:100'],
                'website_description' => ['nullable','string'],
                'email' => ['nullable','email'],
                'phone' => ['nullable','string','max:20'],
                'about_us' => ['nullable','string'],
                'address' => ['nullable','string','max:255'],
                'facebook' => ['nullable','string','max:255','url'],
                'twitter' => ['nullable','string','max:255','url'],
                'instagram' => ['nullable','string','max:255','url'],
                'youtube' => ['nullable','string','max:255','url'],
                'tiktok' => ['nullable','string','max:255','url'],
                'threads' => ['nullable','string','max:255','url'],
                'business_hours' => ['nullable','string','max:255'],
            ]);
            $service = $this->operationService->Setting->store($data);
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
