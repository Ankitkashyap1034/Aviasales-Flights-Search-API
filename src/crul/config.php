<?php

$flight_search_api_step_one = 'http://api.travelpayouts.com/v1/flight_search';
$flight_search_api_step_two = 'http://api.travelpayouts.com/v1/flight_search_results';

$partnerId = '558305';
$apiToekn = '4660a93d4860614d6f4eae4af7a8f0fa';
$host = 'onelinktravel.com';
// define('__MARKER__', env('PARTNER_ID'));    // MARKER IDF
// define('__API_TOEKN__', env('API_TOKEN'));  // API TOEKN
// define('__HOST__', env('HOST'));  // HOST

define('__MARKER__', $partnerId);    // MARKER IDF
define('__API_TOEKN__', $apiToekn);  // API TOEKN
define('__HOST__', $host);  // HOST


define('__FLIGHT_API_STEP_ONE__', $flight_search_api_step_one);  
define('__FLIGHT_API_STEP_TWO__', $flight_search_api_step_two);  




function md5_genrate($plain_text)
{
    return md5($plain_text);
}