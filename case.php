<?php
/**
 * Created by PhpStorm.
 * User: omitobisam
 * Date: 7.12.16
 * Time: 10:51
 */
header('Content-type: application/json');
require_once 'tiny.php';
$get = $_GET;

$thecase = new Tiny($get);
if(!$thecase->caseCheck()){
    echo json_encode('some parameters are wrong');
    exit;
}
echo json_encode(
    array(
        "in" => $get['w'],
        "out" => $thecase->convert()
    )
);
exit;