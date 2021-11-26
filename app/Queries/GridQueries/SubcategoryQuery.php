<?php

namespace App\Queries\GridQueries;
use DB;
use App\Queries\GridQueries\Contracts\DataQuery;

class SubcategoryQuery implements DataQuery
{

    public function data($column, $direction)
    {

        $rows = DB::table('subcategories')
                ->select('subcategories.id as Id',
                         'subcategories.name as Name',
                         'categories.name as Category',
                         'categories.id as CategoryId',
                         DB::raw('DATE_FORMAT(subcategories.created_at,
                                 "%m-%d-%Y") as Created'))
                ->leftJoin('categories', 'category_id', '=', 'categories.id')
                ->orderBy($column, $direction)
                ->paginate(10);

            return $rows;

    }

    public function filteredData($column, $direction, $keyword)
    {

        $rows = DB::table('subcategories')
                ->select('subcategories.id as Id',
                         'subcategories.name as Name',
                         'categories.name as Category',
                         'categories.id as CategoryId',
                         DB::raw('DATE_FORMAT(subcategories.created_at,
                                 "%m-%d-%Y") as Created'))
                ->leftJoin('categories', 'category_id', '=', 'categories.id')
                ->where('subcategories.name', 'like', '%' . $keyword . '%')
                ->orWhere('categories.name', 'like', '%' . $keyword . '%')
                ->orderBy($column, $direction)
                ->paginate(10);

            return $rows;

    }

}