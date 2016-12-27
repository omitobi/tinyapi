<?php
/**
 * Created by PhpStorm.
 * User: omitobisam
 * Date: 7.12.16
 * Time: 10:52
 */

header('Access-Control-Allow-Origin: *');
class Tiny{
    private $call;
    public function __construct($call)
    {
        $this->call = $call;
    }

    public function caseCheck(){
        $callKeys = array_keys($this->call);
        if(!in_array('w', $callKeys)){
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
            return mb_convert_case($call['w'], MB_CASE_TITLE, "UTF-8");
//            return ucwords($call['w'],'UTF-8');
        }
        return  mb_strtolower($call['w'],'UTF-8');
    }

    public function loadPage(){
        $url = $this->call['url'];
        $url_element = "<button class='btn btn-primary' id='_base_tp_src' value='".$url."'> Load All</button> \n";

        // Ref: http://codular.com/curl-with-php
        // Get cURL resource
        $curl = curl_init();
        // Set some options - we are passing in a useragent too here
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $url,
            CURLOPT_USERAGENT => 'Codular Sample cURL Request'
        ));
        // Send the request & save response to $resp
        $resp = curl_exec($curl);
        // Close request to clear up some resources
        curl_close($curl);
        $bodybegin = "<body>";
        $bodyend = "</body></html>";

        $bpos = strpos($resp, $bodybegin); //beginning position
        $epos = strrpos($resp, $bodyend); //end position

        $str = substr($resp,$bpos+6);
        $str = str_replace($bodyend, "", $str);
        //$fullstr = substr($str, 0, $epos) . $url_element . substr($str, $epos);
        $str .= $url_element;
        $result = print_r($str, true);
        return $result;
    }
//    public function encode($string, $code = 'utf-8'){
//        if($code === 'utf-8'){
//            mb_strtolower($string,'UTF-8');
////            return utf8_encode($string);
//        }
//        return utf8_encode($string);
//    }
}