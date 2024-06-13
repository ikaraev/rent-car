<?php

namespace Karaev\Vehicle\Application\Helper;

class VehicleUrlRewriteGenerateHelper
{
    public static function arrayToSlug(array $array)
    {
        $slugArray = [];

        foreach ($array as $item) {
            if (!$item) {
                continue;
            }

            $slugArray[] = is_numeric($item) ? $item : strtolower(str_replace(' ', '-', (string)$item));
        }

        // Join the elements with hyphens to create the final slug
        $slug = implode('-', $slugArray);

        return $slug;
    }
}
