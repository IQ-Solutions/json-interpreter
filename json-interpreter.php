<?php

ini_set('display_errors', 'On');

/**
 * Created by PhpStorm.
 * User: msnyder
 * Date: 6/30/2016
 * Time: 4:48 PM
 */

$json = file_get_contents('app-content.json');

// -------- remove the utf-8 BOM and &quot----
// source: http://stackoverflow.com/questions/10290849/how-to-remove-multiple-utf-8-bom-sequences-before-doctype/15423899#15423899
$json = str_replace("\xEF\xBB\xBF",'',$json);

$json = json_decode($json, true);

echo json_last_error();

$count = count($json['resource']['categories']);

foreach ($json['resource']['categories'] as $key=>$var){

    $id = 'TR-A000'.$key;

    //only using the key
    $json['resource']['categories'][$key]['metadata']['-id'] = $id;

}

echo json_encode($json);

//"-id": "TR-A0006",

?>