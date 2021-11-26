<?php

namespace App\Queries\GridQueries;

use DB;
use App\Queries\GridQueries\Contracts\DataQuery;

class LessonQuery implements DataQuery
{
    public function data($column, $direction)
    {
        $rows = DB::table('lessons')
              ->select('lessons.id as Id',
                       'lessons.name as Name',
                       'categories.name as Category',
                       'subcategories.name as Subcategory',
                       'lessons.slug as Slug',
                       DB::raw('DATE_FORMAT(lessons.created_at,"%m-%d-%Y") as Created'))
              ->leftJoin('categories', 'category_id', '=', 'categories.id')
              ->leftJoin('subcategories', 'subcategory_id', '=', 'subcategories.id')
              ->orderBy($column, $direction)
              ->paginate(10);

        return $rows;

    }

    public function filteredData($column, $direction, $keyword)
    {
        $rows = DB::table('lessons')
              ->select('lessons.id as Id',
                       'lessons.name as Name',
                       'categories.name as Category',
                       'subcategories.name as Subcategory',
                       'lessons.slug as Slug',
                       DB::raw('DATE_FORMAT(lessons.created_at,"%m-%d-%Y") as Created'))
              ->leftJoin('categories', 'category_id', '=', 'categories.id')
              ->leftJoin('subcategories', 'subcategory_id', '=', 'subcategories.id')
              ->where('name', 'like', '%' . $keyword . '%')
              ->orderBy($column, $direction)
              ->paginate(10);

        return $rows;

    }
}