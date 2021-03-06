<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class Custom_route extends Controller
{
    protected $helpers = ['common','alert'];

    public function index($class="",$method="",$args="")
    {
        /*****************************************************
         * URL을 언어지정 구조로 접속시 선처리 컨트롤러
         *****************************************************
        */
        if(!$class)$class = "Main";
        if(!$method)$method = "index";
        if(is_numeric($method)){
            $args = $method;
            $method = "index";
        }

        $cname = "App\\Controllers\\".ucfirst($class);
        $class_obj = new $cname;

        if($method){
            if(method_exists($class_obj,$method)){
                $lang = service('request')->getLocale();
                // View 로 내려주는 컨트롤러 url 강제 변형처리
                $cont_url = "/". $lang . "/" . $class;
                $class_obj->setContUrl($cont_url);

                if($lang == "kor"){
                    $class_obj->THEME_URL = $class_obj->THEME_ROOT = "/theme/webs03_kor";
                }

                /**
                 * 다운로드형 처리
                 * 다운로드 처리할 파일경로, 파일명만 받아서 다운로드 처리
                 * call_usr_func 함수로 호출한 클래스에서는 response->download 가 동작하지 않는다.
                 */
                if($method=="download") {
                    $f_info = call_user_func(array($class_obj, $method), $args);
                    return $this->response->download($f_info["file_path"], null)->setFileName($f_info["file_name"]);
                }else{
                    return call_user_func(array($class_obj, $method), $args);
                }
            }else{
                die("Undefined Function");
                return false;
            }
        }
    }


}

