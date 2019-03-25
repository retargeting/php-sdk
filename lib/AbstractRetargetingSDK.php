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
    public function toJSON(array $data)
    {
        return json_encode($data, JSON_PRETTY_PRINT);
    }

    /**
     * Get proper formatted string
     * @param $text
     * @return string
     */
    public function getProperFormattedString($text)
    {
        if ((bool)$text) {
            return trim(strip_tags(html_entity_decode(
                html_entity_decode($text),
                ENT_QUOTES | ENT_COMPAT,
                'UTF-8')));
        } else {
            return '';
        }
    }

    /**
     * Parse correct format of given data
     * @param $value
     * @return float|int|string
     */
    public function formatIntFloatString($value)
    {
        $value = strip_tags(trim($value));

        if(is_numeric($value) && !is_float($value))
        {
            return (int)$value;
        }
        else if(is_numeric($value) && is_float($value))
        {
            return (float)$value;
        }
        else
        {
            return $this->getProperFormattedString($value);
        }
    }

    /**
     * Format url from an array
     * @param $array
     * @return array
     */
    public function validateArrayData($array)
    {
        $mappedArray = array_map(function($item){
            return $this->getProperFormattedString($item);
        }, $array);

        return $mappedArray;
    }
}