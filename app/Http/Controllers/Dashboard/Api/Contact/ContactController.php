<?php

namespace App\Http\Controllers\Dashboard\Api\Contact;

use App\Http\Controllers\Controller;
use App\Services\OperationsService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class ContactController extends Controller
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

    function index(Request $request)
    {
        try {
            $contacts = $this->operationService->Contact->index($request->pagination ?? 10, $request->wehre ?? []);
            return $this->apiResponse($contacts, 'success', 200);
        } catch (\Exception $exception) {
            return $this->apiResponse(null, $exception->getMessage(), 500);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    function destroy($id)
    {
        try {
            $contact = $this->operationService->Contact->delete($id);
            return $this->apiResponse($contact, 'success', 200);
        } catch (\Exception $exception) {
            return $this->apiResponse(null, $exception->getMessage(), 500);
        }
    }
}
