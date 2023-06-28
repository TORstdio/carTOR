<?php

namespace App\Http\Filters\user;

use Spatie\QueryBuilder\QueryBuilder;
use App\Models\User;
use App\Http\Resources\user\UserResource;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\AllowedSort;
use Spatie\QueryBuilder\Filters\Filter;

class UserFilter
{
    public static function excecute($request)    {

        $users = QueryBuilder::for(User::class)
        ->allowedFilters([
            AllowedFilter::exact('id'),
            'name',
            'email'
        ])
        ->allowedSorts(
            AllowedSort::field('name'),
            AllowedSort::field('email'),
            AllowedSort::field('created_at'),
            AllowedSort::field('updated_at')
        )
        ->defaultSort('name')
        ->distinct()
        ->paginate($request->itemsPerPage)
        ->appends(request()->query());
        
        return UserResource::collection($users);
    }
}