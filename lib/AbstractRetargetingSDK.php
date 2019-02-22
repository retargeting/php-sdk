<?php
/**
 * Created by PhpStorm.
 * User: bratucornel
 * Date: 2019-02-19
 * Time: 07:48
 */
namespace Retargeting;
/**
 * Class AbstractRetargetingSDK
 */
abstract class AbstractRetargetingSDK
{

    /**
     * @param array $data
     * @return string
     */
    public function toJSON(array $data): string
    {
        return json_encode($data, JSON_PRETTY_PRINT);
    }

    /**
     * @param array $breadCrumb
     * @return array
     */
    public function prepareBreadCrumb(array $breadCrumb): array
    {
        return empty($breadCrumb) ? [] : ['id', 'name','parent'];
    }

}