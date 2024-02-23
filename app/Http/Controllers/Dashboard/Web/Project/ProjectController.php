<?php

namespace App\Http\Controllers\Dashboard\Web\Project;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function create()
    {
        return view('dashboard.project.create');
    }

    function edit($id)
    {
        $project = Project::find($id);
        if (!$project) {
            return redirect()->back()->with('error', 'Project not found');
        }
        return view('dashboard.web.project.edit', compact('project'));
    }

    function customers($id)
    {
        try {
            $project = Project::find($id);

            if (!$project) {
                return redirect()->back()->with('error', 'Project not found');
            }
            return view('dashboard.project.customers', compact('project'));
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }

    }
}
