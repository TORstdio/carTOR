<?php

namespace App\Http\Filters\vehicle;

use Spatie\QueryBuilder\QueryBuilder;
use App\Models\Vehicle;
use App\Http\Resources\vehicle\VehicleResource;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\AllowedSort;
use Spatie\QueryBuilder\Filters\Filter;

class VehicleFilter
{
    public static function excecute($request)    {

        $vehicles = QueryBuilder::for(Vehicle::class)
        ->allowedFilters([
            AllowedFilter::exact('id'),
            'model',
        ])
        ->allowedSorts(
            AllowedSort::field('created_at'),
        )
        ->defaultSort('created_at')
        ->distinct()
        ->paginate($request->itemsPerPage)
        ->appends(request()->query());
        
        return VehicleResource::collection($vehicles);
    }
}