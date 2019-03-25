<?php
/**
 * Created by PhpStorm.
 * User: andreicotaga
 * Date: 2019-03-18
 * Time: 12:09
 */

namespace Retargeting\Helpers;

final class CategoryHelper extends AbstractHelper implements Helper
{
    /**
     * Format product category
     * @param mixed $categoryData
     * @return array|\stdClass
     */
    public static function validate($categoryData)
    {
        $categoryArr = [];

        if(!empty($categoryData))
        {
            //Check if there are duplicated parent categories
            $categoryData = self::filterArrayByKey($categoryData, 'parent');

            //Get the first category if there is only one
            if(count($categoryData) < 2)
            {
                $categoryArr['id']          = $categoryData[0]['id'];
                $categoryArr['name']        = self::formatString($categoryData[0]['name']);
                $categoryArr['parent']      = false;
                $categoryArr['breadcrumb']  = [];
            }
            //Check if there are nested categories
            else if (count($categoryData) >= 2)
            {
                foreach($categoryData as $category)
                {
                    $category['name'] = self::formatString($category['name']);
                    $category['breadcrumb'] = is_array($category['breadcrumb']) ? $category['breadcrumb'] : (array)$category['breadcrumb'];

                    $categoryArr[]        = $category;
                }
            }
        }

        return $categoryArr;
    }
}