<?php

namespace App\Http\Controllers\ClientSide\Api\CoverImage;

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

    public function index(Request $request)
    {
        try {
            $coverImages = $this->operationService->CoverImage->index($request->pagination??10,'active');
            return $this->apiResponse($coverImages,'success', 200);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }

    }
}
