<?php
/**
 * Created by PhpStorm.
 * User: omitobisam
 * Date: 27.12.16
 * Time: 15:06
 */
require_once 'tiny.php';
$get = $_GET;

$page = new Tiny($get);
$result = $page->loadPage();
echo $result;
exit;