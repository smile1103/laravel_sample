<?php

namespace App\Queries\GridQueries;

use DB;

use App\Queries\GridQueries\Contracts\DataQuery;

class MarketingImageQuery implements DataQuery
{

    public function data($column, $direction)
    {

        $rows = DB::table('marketing_images')
              ->select('id as Id',
                       'image_name as Name',
                       'image_extension as Ext',
                       'image_weight as Weight',
                       'is_featured as Featured',
                       'is_active as Active',
                       DB::raw('DATE_FORMAT(created_at, 
                               "%m-%d-%Y") as Created'))
              ->orderBy($column, $direction)
              ->paginate(10);

        return $rows;

    }

    public function filteredData($column, $direction, $keyword)
    {
        $rows = DB::table('marketing_images')
                ->select('id as Id',
                         'image_name as Name',
                         'image_extension as Ext',
                         'image_weight as Weight',
                         'is_featured as Featured',
                         'is_active as Active',
                         DB::raw('DATE_FORMAT(created_at, 
                                 "%m-%d-%Y") as Created'))
                ->where('image_name', 'like', '%' . $keyword . '%')
                ->orderBy($column, $direction)
                ->paginate(10);

        return $rows;

    }
}