<?php

namespace App\Http\Controllers\ClientSide;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return view('clientSide.home');
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    function exclusiveProperties()
    {
        try {
            return view('clientSide.exclusiveProperties.index');
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }


    function projectsItem($id)
    {
        try {



            $project = Project::query()->with([
                'outSideImages'
                , 'inSideImages'
                , 'features'
                , 'prices'
                , 'paymentPlans'
                , 'nearPlaces'
            ])->findOrFail($id);


            return view('clientSide.project.show', compact('project'));
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public
    function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public
    function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public
    function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public
    function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public
    function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public
    function destroy(string $id)
    {
        //
    }
}
