<?php
/**
 * Created by PhpStorm.
 * User: andreicotaga
 * Date: 2019-03-18
 * Time: 12:09
 */

namespace Retargeting\Validators\Product;

use Retargeting\Validators\AbstractValidator;
use Retargeting\Validators\Validator;

class CategoryValidator extends AbstractValidator implements Validator
{

    /**
     * Format product category
     * @param mixed $categoryData
     * @return array|\stdClass
     */
    public static function validate($categoryData)
    {
        $categoryArr = [];
        $breadCrumbArr = [];

        $categoryArr['id'] = '';
        $categoryArr['name'] = '';
        $categoryArr['parent'] = false;
        $categoryArr['breadcrumb'] = [];

        if(!empty($categoryData) && count($categoryData) < 2)
        {
            $categoryArr['id']          = $categoryData['id'];
            $categoryArr['name']        = self::sanitize($categoryData['name'], 'string');
            $categoryArr['parent']      = false;
            $categoryArr['breadcrumb']  = [];
        }
        else
        {
            if(!empty($categoryData))
            {
                foreach($categoryData as $category)
                {
                    if(isset($category['breadcrumb']['id']))
                    {
                        $breadCrumbArr['id'] = $category['breadcrumb']['id'];
                        $breadCrumbArr['name'] = self::sanitize($category['breadcrumb']['name'], 'string');
                        $breadCrumbArr['parent'] = $category['breadcrumb']['parent'];
                    }

                    $categoryArr['id']        = $category->id;
                    $categoryArr['name']      = self::sanitize($categoryData->name, 'string');
                    $categoryArr['parent']    = $category->parent;
                    $categoryArr['breadcrumb'] = isset($category['breadcrumb']['id']) ? $breadCrumbArr : [];
                }
            }
        }

        return json_encode($categoryArr, JSON_PRETTY_PRINT);
    }
}