<?php

if (!function_exists('leap_year')) {
    function leap_year(\DateTime $date)
    {
        $year = $date->format('Y');

        return $year % 4 == 0 ? true : false;
    }
}