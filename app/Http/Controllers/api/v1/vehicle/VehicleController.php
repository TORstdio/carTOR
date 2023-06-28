<?php

namespace App\Http\Controllers\api\v1\vehicle;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\vehicle\StoreVehicleRequest;
use App\Http\Requests\vehicle\UpdateVehicleRequest;
use App\Http\Resources\vehicle\VehicleResource;
use App\Http\Filters\vehicle\VehicleFilter;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return VehicleFilter::excecute($request);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVehicleRequest $request)
    {
        $validated = $request->validated();
        $vechile = Vehicle::create(
            $validated
        );
        return response(['message' => 'Vehicle created'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return new VehicleResource($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVehicleRequest $request, Vehicle $vehicle)
    {
        $validated = $request->validated();
        $vehicle->update($validated);
        return response(['message' => 'Vehicle modified'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $vehicle)
    {
        $vehicle->delete();
        return response(['message' => 'Vehicle deleted'], 204);
    }
    
}
