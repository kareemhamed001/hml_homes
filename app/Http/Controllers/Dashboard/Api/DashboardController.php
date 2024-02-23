<?php

namespace App\Http\Controllers\Dashboard\Api;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    use ApiResponse;

    function overview()
    {
        try {


            return $this->apiResponse([
                    'services' => \App\Models\Service::count(),
                    'feedbacks' => \App\Models\Feedback::count(),
                    'offPlanProject' => \App\Models\Project::query()->where('type', 'compound')->count(),
                    'exclusiveProperties' => \App\Models\Project::query()->where('type', 'apartment')->count(),
                    'partners' => \App\Models\Partner::count(),
                    'coverImages' => \App\Models\CoverImage::query()->count(),
                ]
                , 'success'
                , 200);
        } catch (\Exception $exception) {
            return $this->apiResponse(null, $exception->getMessage(), 500);
        }

    }
}
