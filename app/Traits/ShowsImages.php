<?php

namespace App\Traits;

trait ShowsImages
{
    public function noCache()
    {

        return '?'. 'time='. time();

    }

    public function showImage($imageModel, $path)
    {

        return $path . $imageModel->image_name
        . '.'
        . $imageModel->image_extension
        . $this->noCache();

    }

    /**
    * @param $featuredImage
    * @param $activeImages
    * @return bool
    */

    private function notEnoughSliderImages($featuredImage, $activeImages)
    {
        return (!count($featuredImage) || !count($activeImages) >= 1) ?
            true : false;
    }

}