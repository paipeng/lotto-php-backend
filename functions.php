<?php
/**
 * Created by PhpStorm.
 * User: paipeng
 * Date: 12/06/15
 * Time: 00:32
 */
function initApi($api) {
    $api->get('/getParams.json', 'apiGetParams', EpiApi::external);
    $api->get('/postParams.json', 'apiPostParams', EpiApi::external);
    $api->get('/httpBody.json', 'apiHttpBody', EpiApi::external);
}
function apiGetParams()
{
    return $_GET;
}
function apiPostParams()
{
    return $_POST;
}
function apiHttpBody()
{
    $entityBody = file_get_contents('php://input');
    //var_dump($entityBody);
    return (array)json_decode($entityBody);
}

function setTimezone()
{
    //$systemTimeZone = system('date +%Z');
    date_default_timezone_set('UTC');
}
?>
