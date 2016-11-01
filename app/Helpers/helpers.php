<?php
/**
 * Created by PhpStorm.
 * User: chqss
 * Date: 2016/9/15
 * Time: 20:10
 */
/**
 * 判断是否为多维数组
 */
if (!function_exists('isDoubleArray')) {
    function isDoubleArray($array)
    {
        if (is_array($array)) {
            foreach ($array as $v) {
                if (is_array($v)) {
                    return true;
                    break;
                }
            }
            return false;
        }
        return false;
    }
}
if (!function_exists('endSegments')) {
    function endSegments($position_from_end = 1)
    {
        $segments = request()->segments();
        return $segments[sizeof($segments) - $position_from_end];
    }
}