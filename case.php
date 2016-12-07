<?php
/**
 * Created by PhpStorm.
 * User: omitobisam
 * Date: 7.12.16
 * Time: 10:51
 */
require_once 'tiny.php';
$get = $_GET;

$thecase = new Tiny($get);
if(!$thecase->caseCheck()){
    echo json_encode('some parameters are wrong');
    exit;
}
$case_u = true;
if($get['case'] === 'u'){
    $case_u = true;
} else if($get['case'] === 'l'){
    $case_u = false;
}
echo json_encode(
    array(
        $get['w'] => $thecase->convert(
            $case_u
        )
    )
);
exit;