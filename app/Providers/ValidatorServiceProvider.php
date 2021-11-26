<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Subcategory;
use App\Category;


class ValidatorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

        $this->app['validator']->extend('isValidCategory', function ($attribute, $value, $parameters)
        {

            $max = Category::count();

            $verified = (1 <= $value) && ($value <= $max) ? true : false;

            return 'isValidCategory' == $verified;
        },
            'Sorry, category is blank or is not a valid category!');


        $this->app['validator']->extend('belongsToCategory', function ($attribute, $value, $parameters)
        {
            $category_id = request()->input('category_id');
            $verified = Subcategory::where('id', $value)
                ->where('category_id', $category_id)
                ->exists();

            return 'belongsToCategory' == $verified;
        },
            'Sorry, subcategory is blank or does not belong to category!');


    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
