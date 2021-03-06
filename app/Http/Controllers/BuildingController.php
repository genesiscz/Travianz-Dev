<?php

namespace App\Http\Controllers;

use App\Models\Building;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class BuildingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(): Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request): Response
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param int $location
     * @return View
     */
    public function show(Request $request, int $location): View
    {
        $building = Building::where('village_id', $request->user()->selectedVillage->village->world_id)->where('location', $location)->first();

        if ($building === null) abort('404'); //empty building

        if ($building->location < 1 || $building->location > 40) abort('404');

        $buildingTemplate = 'village.buildings.' . get_name_from_class($building);

        return view('village.buildings.layout.layout', compact(['building', 'buildingTemplate']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Building $building
     * @return Response
     */
    public function edit(Building $building): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Building $building
     * @return Response
     */
    public function update(Request $request, Building $building): Response
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Building $building
     * @return Response
     */
    public function destroy(Building $building): Response
    {
        //
    }
}
