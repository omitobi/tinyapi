<?php
/**
 * Created by PhpStorm.
 * User: omitobisam
 * Date: 7.12.16
 * Time: 10:52
 */
header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');
class Tiny{
    private $call;
    public function __construct($call)
    {
        $this->call = $call;
    }

    public function caseCheck(){
        $callKeys = array_keys($this->call);
        if(!in_array('case', $callKeys) || !in_array('w', $callKeys)){
            return false;
        }
        return true;
    }
    public function convert(){
        $call = $this->call;
        $case = $call['case'];
        if($case === 'u'){
            return mb_strtoupper($call['w'],'UTF-8');
        }else if($case === 'm'){
            return ucwords($call['w']);
        }
        return  mb_strtolower($call['w'],'UTF-8');
    }

//    public function encode($string, $code = 'utf-8'){
//        if($code === 'utf-8'){
//            mb_strtolower($string,'UTF-8');
////            return utf8_encode($string);
//        }
//        return utf8_encode($string);
//    }
}