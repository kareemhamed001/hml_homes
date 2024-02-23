<?php

namespace App\Http\Controllers\Dashboard\Api\Partner;

use App\Http\Controllers\Controller;
use App\Services\OperationsService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class PartnerController extends Controller
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
            $services = $this->operationService->Partner->index($request->pagination??10);
            return $this->apiResponse($services,'success', 200);
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
                'name' =>[ 'required','string','max:100'],
                'description' => ['nullable','string','max:255'],
                'cover_image' => ['required','image','mimes:png,svg,ico'],
                'link' => ['nullable','url'],
                'status' => ['required', 'in:active,inactive']
            ]);
            $partner = $this->operationService->Partner->store($data);
            return $this->apiResponse($partner,'success', 200);
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
            $partner = $this->operationService->Partner->show($id);
            return $this->apiResponse($partner,'success', 200);
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
                'name' =>[ 'nullable','string','max:100'],
                'description' => ['nullable','string','max:255'],
                'cover_image' => ['nullable','image','mimes:png,svg,ico'],
                'link' => ['nullable','url'],
                'status' => ['nullable', 'in:active,inactive']
            ]);
            $partner = $this->operationService->Partner->update($id, $data);
            return $this->apiResponse($partner,'success', 200);
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
            $partner = \App\Models\Partner::query()->find($id);
            if (!$partner) {
                throw new \Exception('Partner not found');
            }
            $partner->delete();
            return $partner;
        } catch (\Exception $exception) {
            throw $exception;
        }
    }
}
