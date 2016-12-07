<?php
/**
 * Created by PhpStorm.
 * User: omitobisam
 * Date: 7.12.16
 * Time: 10:52
 */

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
    public function convert($toLower = true){
        $call = $this->call;
        if($toLower){
            return strtolower($call['w']);
        } else{
            return strtoupper($call['w']);
        }
    }
}