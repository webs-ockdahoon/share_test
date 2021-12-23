<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */

class BaseController extends Controller
{
    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = ['common','alert'];
    protected $models = array();

    // 첫번째 모델용 공통 변수
    protected $model;

    // 첫번째 모델의 주키 공통 변수
    protected $primaryKey = "";

    protected $viewPath = "";
    protected $SS_MIDX,$SS_MID,$SS_Mname,$SS_Mlevel;   //-- 세션변수

    public $THEME_ROOT,$THEME;   //-- 기본 경로
    public $DATA_URL,$SITE_URL,$THEME_URL; //-- URL 관련 값

    protected $isMasterMode = false, $isMaster = false, $isLogin=false;    //-- 로그인 여부/관리자모드 여부 체크 플래그

    // 기타 라이브러리 객체
    protected $session; //-- 세션 객체

    // View 파일 배열
    private $views = array();

    // 데이터 전송 형식 구분
    protected $method;

    // 현재 컨트롤러 URL
    protected $cont_url;

    // 검색에 사용되는 인자값 저장 배열 s1~s10
    protected $sch_obj,$sch_max=10;

    // 게시판 모드인지 체크
    protected $isBoardMode = false;

    // 레이아웃 사용여부 체크 - 미사용시 header 와 view 페이지를 배열로 리턴함
    protected $useLayout = true;

    // 레코드 삭제시 삭제할 파일 임시 저장 배열
    protected $del_file_list = array();

    // Header 추가 타이틀
    protected $header_title = "";
    protected $header_title_ext = "";   // 기본 타이틀 외 추가 타이틀 - 주로 게시판에 사용

    // ajax 여부 체크 플래그
    protected $isAjax = false;

    // 모바일 여부 플래그
    protected $isMobile = 0;

    // 강제 활성 메뉴 주소. 주로 리스트 페이지 이후 상세페이지에 사용. 해당 값 지정시 현재 메뉴 검사를 해당 url 값으로 체크한다.
    protected $activeMenuUrl = "";

    // 현재 이용중인 언어 저장 변수
    protected $lang="";

    /**
     * Constructor.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param LoggerInterface   $logger
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);
    }

    public function __construct(){

        //--------------------------------------------------------------------
        // Preload any models, libraries, etc, here.
        //--------------------------------------------------------------------
        // E.g.: $this->session = \Config\Services::session();

        // Load Model
        foreach($this->models as $key=>$model){
            $this->$model = model('App\Models\\'.$model);
            if($key==0){
                $this->model=$this->$model;  //-- 0 번째 지정 모듈을 기본 모듈로 지정
                $this->primaryKey = $this->model->getPrimaryKey();
            }
        }

        // 공통 사용 라이브러리 생성
        $this->parser = \Config\Services::parser();
        $this->session = \Config\Services::session();

        $uri = service('uri');

        // 세션 변수화
        $this->SS_MIDX = $this->session->get("MIDX");
        $this->SS_MID = $this->session->get("MID");
        $this->SS_Mname = $this->session->get("Mname");
        $this->SS_Mlevel = $this->session->get("Mlevel");
        $this->SS_Mpass = $this->session->get("Mpass");

        $segments = $uri->getSegments();
        if(sizeof($segments)<1)$segments[0] = "";
        if(sizeof($segments)<2)$segments[1] = "";
        if(sizeof($segments)<3)$segments[2] = "";

        $this->THEME = "webs03_rus"; //-- 스킨 강제 지정

        // 관리자 로그인여부 체크 (사용자 페이지에 별도 출력/처리를 위함)
        if($this->SS_Mlevel>=90)$this->isMaster = true;
        if($this->SS_Mlevel)$this->isLogin = true;

        // 기본 경로 URL 지정
        $this->THEME_URL = "/theme/".$this->THEME;

        // 기본 테마 경로 지정
        $this->THEME_ROOT = substr($this->THEME_URL,1);

        // 기본 사이트 URL 지정 - /app/Config/Constants 참고.
        // BASE_URL 을 사용하던 SITE_URL 을 사용하든 편할대로 사용
        $this->SITE_URL = BASE_URL;

        // 기본 데이터 폴더
        $this->DATA_URL = "/data";

        // 전송방식 체크
        $request = \Config\Services::request();
        $this->method = $request->getMethod();

        $this->cont_url = $this->getControllerUrl();

        for($k=1;$k<=$this->sch_max;$k++){
            if(isset($_GET["s".$k]))$this->sch_obj[$k] = $_GET["s".$k];
            else $this->sch_obj[$k] = "";
        }

        $this->lang = service('request')->getLocale();

        $this->isAjax = $request->isAJAX();
    }


    /**
     * 출력할 파일 배열에 설정하기
     * @param $viewFile View 파일명
     * @param string $data View 파일에 전달할 데이터 변수들
     * @param string $viewPath View 파일 경로(별도 지정이 필요할때에만 사용)
     */
    protected function setView($viewFile,$data=array(),$viewPath=""){
        $this->views[] = array(
            "path"=>$viewPath,
            "view"=>$viewFile,
            "data"=>$data,
        );
    }

    /**
     * 설정된 View 파일을 읽어서 Layout 을 씌워서 리턴하기
     */
    public function run($data=array()){

        $lang = $this->lang;

        // header 파일 읽어들이기
        $header_file = $this->THEME_ROOT."/layout/header.php";

        $config_info = model('App\Models\ConfigModel');
        $config_company = $config_info->getConfig($lang, "company");
        $data["config_site"] = $config_info->getConfig($lang,"site");
        $data["config_company"] = $config_company;
        $data["header"] = $this->loadView($header_file, $data);

        // view 파일 읽어들이기
        $views = array();

        // 게시판모드일 경우 테마의 게시판 공통 상단 파일 불러오기
        if($this->isBoardMode){
            $viewPage = $this->THEME_ROOT . "/board/top.php";
            if(file_exists(APPPATH . "Views/".$viewPage)){
                $views[] = $this->loadView($viewPage, $this->views[0]["data"]);
            }
        }

        foreach($this->views as $view){
            if(!$view["path"])$view["path"] = $this->viewPath;

            if($this->isBoardMode) {
                $view["data"]["BOARD_SKIN_URL"] = "/board/".$view["path"];
                $viewPage = "board/" . $view["path"]."/".$view["view"];
            }else{
                $viewPage = $this->THEME_ROOT."/".$view["path"]."/".$view["view"];
            }

            if(!$this->useLayout){  //-- 레이아웃 미사용시 header 정보 전달해주기
                $view["data"]["header"] = $data["header"];
            }

            $this->addCommonData($view["data"]);
            if(!$this->useLayout) {
                $view["data"]["config_company"] = $config_company;
            }

            $views[] = view($viewPage, $view["data"]);
        }

        // 게시판모드일 경우 테마의 게시판 공통 하단 파일 불러오기
        if($this->isBoardMode){
            $viewPage = $this->THEME_ROOT . "/board/bottom.php";
            if(file_exists(APPPATH . "Views/".$viewPage)){
                $this->addCommonData($this->views[0]["data"]);
                $views[] = view($viewPage, $this->views[0]["data"]);
            }
        }

        $data["views"] = $views;

        // 접속 로그 처리 - 스크립트 리턴
        $data["views"][] = $this->accessLog();

        // 저장처리 세션 처리
        $data["messageFlag"] = $this->session->getFlashdata('messageFlag');

        if($this->useLayout) {
            $data["config_company"] = $config_company;
            $layout = view($this->THEME_ROOT . "/layout/layout", $data);
            return $layout;
        }else{
            $str = "";
            foreach($views as $v){
                $str.=$v;
            }
            return $str;
        }
    }


    /**
     * 관리자모드 / 게시판 현재 작동중인 컨트롤러 주소 구하기 ( View 에서 URL 이동을 위함 )
     * @return string
     */
    private function getControllerUrl(){
        $router = service('router');
        $MODE_URL = str_replace("\App\Controllers","",$router->controllerName());
        $MODE_URL = str_replace("\\","/",$MODE_URL);
        //$MODE_URL = strtolower($MODE_URL);
        return $MODE_URL;
    }

    /**
     * View 페이지로 공통으로 전달할 데이터
     */
    private function addCommonData(&$data){
        
        // 실제 사용 IP 할당하기
        $_SERVER["REMOTE_ADDR"] = $this->get_client_ip();
        
        $uri = service('uri');
        $data["cont_url"] = $this->cont_url;
        //$data["edit_url"] = $this->cont_url."/edit?".$_SERVER["QUERY_STRING"];

        $data["primaryKey"] = $this->primaryKey;
        $data["DATA_URL"] = $this->DATA_URL;
        $data["isMaster"] = $this->isMaster;
        $data["isMasterMode"] = $this->isMasterMode;
        $data["isLogin"] = $this->isLogin;

        // 언어값 View 에 전달하기 (각종 링크에 사용)
        $data["lang"] = $this->lang;

        //-- 검색 요소 인자값 추가
        for($k=1;$k<=$this->sch_max;$k++){
            if(isset($_GET["s".$k]))$data["s".$k] = $_GET["s".$k];
            else if(!isset($data["s".$k]))$data["s".$k] = "";
        }

        if($_SERVER["QUERY_STRING"]) {
            $data["qstr"] = "?".$_SERVER["QUERY_STRING"];
        }else{
            $data["qstr"] = "";
        }

        // 메뉴 포커싱을 위한 Url Segment 전달
        $data["uri_segment_1"] = $data["uri_segment_2"] = $data["uri_segment_3"] = $data["uri_segment_4"] = $data["uri_segment_5"] = "";
        $segments = $uri->getSegments();
        foreach($segments as $key =>$seg){
            $data["uri_segment_".($key+1)] = $seg;
        }

        $data["THEME_URL"] = $this->THEME_URL;

        // 세션 정보 추가
        $data["SS_Mname"] = $this->SS_Mname;

        // 메뉴 처리
        if($this->isMasterMode){    // 관리자일 경우
            //$data["auth_menu_open"] = $this->auth_menu_open;
            //$data["auth_menu"] = $this->auth_menu;

            $data["master_menu"] = $this->getMasterMenu();

        }else {  // 사용자일 경우
            $MenuModel = model('App\Models\MenuModel');
            $menu_info = $MenuModel->getUsingMenu();

            // 강제 3차 메뉴 추가 처리
            if(isset($this->extend_menu)){
                foreach($this->extend_menu as $key1=>$ex_mn1){
                    if(isset($ex_mn1['sub'])) {
                        foreach ($ex_mn1['sub'] as $key2 => $ex_mn2) {
                            $menu_info[$key1]["sub"][$key2]["sub"] = $ex_mn2['sub'];
                        }
                    }
                }
            }

            $data["menu_info"] = $menu_info;

            $menu_active = array("","","");
            if($menu_info) {
                $segments = $uri->getSegments();
                $nurl = "/" . implode("/", $segments);
                if($this->activeMenuUrl)$nurl = $this->activeMenuUrl;

                // 게시판 URL 별도 설정
                if(sizeof($segments)>1 && $segments[0]=="board")$nurl = "/" . $segments[0]."/".$segments[1];

                // 현재 메뉴 포커스 잡기 + 헤더 타이틀 잡기
                $header_title = "";
                foreach ($menu_info as $key1=>$mn1) {
                    if (isset($mn1["sub"])) {

                        foreach ($mn1["sub"] as $key2=>$mn2) {

                            // 강제 3차 메뉴 추가 처리
                            if(isset($this->extend_menu) && isset($this->extend_menu[$key1][$key2]['sub'])){
                                $mn2["sub"] = $this->extend_menu[$key1][$key2]['sub'];
                            }

                            if (isset($mn2["sub"])) {
                                foreach ($mn2["sub"] as $key3=>$mn3) {
                                    if(substr($mn3["mnu_url"],strlen($mn3["mnu_url"])-1)=="/")$mn3["mnu_url"]=substr($mn3["mnu_url"],0,strlen($mn3["mnu_url"])-1);
                                    if($mn3["mnu_url"] == $nurl) {  // 현재 URL = 3차 메뉴 URL 일 경우
                                        if (!$this->header_title && !$header_title)$header_title = $mn3["mnu_title"];
                                        $menu_active[0] = $key1;
                                        $menu_active[1] = $key2;
                                        $menu_active[2] = $key3;
                                    }
                                }
                            }

                            if(substr($mn2["mnu_url"],strlen($mn2["mnu_url"])-1)=="/")$mn2["mnu_url"]=substr($mn2["mnu_url"],0,strlen($mn2["mnu_url"])-1);
                            if($mn2["mnu_url"] == $nurl) {  // 현재 URL = 2차 메뉴 URL 일 경우
                                if (!$this->header_title && !$header_title)$header_title = $mn2["mnu_title"];
                                if($menu_active[1]=="") {   // 하위메뉴 결과를 덮어쓰지 않도록 처리
                                    $menu_active[0] = $key1;
                                    $menu_active[1] = $key2;
                                    $menu_active[2] = "";
                                }
                            }

                        }
                    }

                    if(substr($mn1["mnu_url"],strlen($mn1["mnu_url"])-1)=="/")$mn1["mnu_url"]=substr($mn1["mnu_url"],0,strlen($mn1["mnu_url"])-1);
                    if($mn1["mnu_url"] == $nurl) {  // 현재 URL = 1차 메뉴 URL 일 경우
                        if (!$this->header_title && !$header_title)$header_title = $mn1["mnu_title"];
                        if($menu_active[0]=="") {   // 하위메뉴 결과를 덮어쓰지 않도록 처리
                            $menu_active[0] = $key1;
                            $menu_active[1] = "";
                            $menu_active[2] = "";
                        }
                    }
                }

                if($header_title)$this->header_title = $header_title;

                $data["header_title"] = $this->header_title;
                $data["header_title_ext"] = $this->header_title_ext;
                $data["menu_active"] = $menu_active;
            }
            //echo "Set Menu";
            //print_array($menu_active);
            //print_array($menu_info);
        }

    }

    /**
     * Post 로 넘어온 데이터 모두 받기
     */
    protected function getPost($key=null){
        $info = \Config\Services::request()->getPost($key);
        return $info;
    }

    /**
     * Get 으로 넘어온 데이터 모두 받기
     */
    protected function getGet($key=null){
        $info = \Config\Services::request()->getGet($key);
        return $info;
    }

    /**
     * Form Submit 했을때 Validate Error 발생시 에러 메세지 만들기
     * @param $validate_error
     * @return string
     */
    protected function makeErrorMessage($validate_error){
        $template = "<div class='alert alert-danger'>{msg}</div>";
        $msg = "";
        foreach($validate_error as $err){
            $data["msg"] = $err;
            $msg.= $this->parser->setData($data)->renderString($template);
        }
        return $msg;
    }

    /**
     * 공통 삭제 모듈.
     * 삭제시 별도 추가 로직이 필요할시 해당 클래스에서 재정의해서 사용
     * 예) 첨부 파일삭제, 관련 테이블 삭제
     * 삭제할 데이터의 키값은 배열형식으로 전달
     */
    public function del(){
        $idx = $this->getPost("idx");

        //-- 선처리 메소드 체크 및 실행
        if (method_exists($this, "delBefore"))$this->delBefore($idx);

        if(is_array($idx)){
            foreach($idx as $i){
                if(!$i)return;
                $this->model->delete($i);
            }
            $this->session->setFlashdata('messageFlag', 'delete');
            $json["result"] = "OK";

            //-- 후처리 메소드  체크 및 실행
            if (method_exists($this, "delAfter"))$this->delAfter($idx);

        }else {
            $json["result"] = "ERROR";
        }
        die(json_encode($json));
    }

    /**
     * 레이아웃 없이 내용만 불러올때 설정
     */
    public function setUseLayout($op){
        $this->useLayout = $op;
    }

    /**
     * 접속 로그 처리
     */
    private function accessLog(){

        // 중복 기록 방지
        if($this->session->get("log_idx"))return "";

        $access_model = model('App\Models\LogAccessModel');
        $agent = \Config\Services::request()->getUserAgent();

        /*====================================================
	     * 접속 로그 기록 시작
	     ====================================================*/
        $refer = $agent->getReferrer();
        $browser = $agent->getBrowser();
        $version = $agent->getVersion();
        $isRobot = $isMobile = 0;

        //-- 검색 키워드 추출
        $keyword = "";
        if(strpos($refer,"?q="))$keyword = "?q=";
        else if(strpos($refer,"&q="))$keyword = "&q=";
        else if(strpos($refer,"?query="))$keyword = "?query=";
        else if(strpos($refer,"&query="))$keyword = "&query=";
        if($keyword){
            $str = substr($refer,strpos($refer,$keyword));
            $str = str_replace($keyword,"",$str);
            if(strpos($str,"&"))$str = substr($str,0,strpos($str,"&"));
            $keyword = str_replace("+"," ",$str);
        }

        $logWrite = true;
        if(strpos($refer,"http://".$_SERVER["HTTP_HOST"])===0 || strpos($refer,"https://".$_SERVER["HTTP_HOST"])===0){ //-- 기타 로그 기록하지 않는 경우
            $logWrite = false;
        }

        if ($agent->isRobot()){
            $isRobot = 1;
            $browser = $agent->getRobot();
        }
        elseif ($agent->isMobile())$isMobile = 1;

        $platform = $agent->getPlatform();
        $log_idx = 0;
        if($logWrite){
            $data = array(
                'log_datetime'=>date("Y-m-d H:i:s"),
                'log_is_robot'=>$isRobot,
                'log_is_mobile'=>$isMobile,
                'log_browser'=>$browser,
                'log_browser_ver'=>$version,
                'log_platform'=>$platform,
                'log_screenW'=>'0',
                'log_screenH'=>'0',
                'log_ip'=>$_SERVER["REMOTE_ADDR"],
                'log_refer'=>$refer,
                'log_keyword'=>$keyword,
            );
            $access_model->insert($data);

            $log_idx = $access_model->getInsertID();
            $this->session->set('log_idx', $log_idx);
        }

        /*========= 접속 로그 끝 ===========================================*/
        if($log_idx){ //-- 브라우져 해상도 업데이트 기능 호출 //-- 에러나도...크게 상관은 없음..
            return "<script>sw = screen.width;sh = screen.height;$.ajax({'url':'/main/accessLogUpdate','method':'POST','data':{'sw':sw,'sh':sh,'log_idx':".$log_idx."}});</script>";
        }else{
            return "";
        }
    }

    public function accessLogUpdate(){
        $access_model = model('App\Models\LogAccessModel');
        $info = $this->getPost();
        $access_model->updateScreenSize($info);
    }

    // 단순 뷰파일 로드 처리
    protected function loadView($page,$data){
        $this->addCommonData($data);
        $view = view($page, $data);
        return $view;
    }

    /**
     * 사용자 실제 아이피 구하기
     * @return array|false|string
     */
    function get_client_ip() {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else if($_SERVER["REMOTE_ADDR"]=="::1"){
            $ipaddress = '127.0.0.1';
        }
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }

    /**
     * 공통 메일 발송 처리 함수
     * @param $options
     *
     * 보내는사람 이메일 주소 from 은 메일발송 보안에 따라 실제 운영중인 도메인을 입력하도록 하자.
     * 또한 DNS에도 SPF 설정이 필요할 수도 있다.
     * 전혀 관계없는 메일 발송시 sendmail 발송 단계에서 이미 차단되어 발송 자체가 안될 수도 있다.
     *
     */
    function send_mail($options){
        // 기본값 설정
        if(!isset($options["from"]) || !$options["from"])$options["from"] = "no-reply@bluecomet.kr";
        if(!isset($options["from_name"]) || !$options["from_name"])$options["from_name"] = "동아대학교국제진료센터";
        if(!isset($options["form_content"]) || !$options["form_content"])$options["form_content"] = "";
        if(!isset($options["to"]) || !$options["to"])return;
        if(!isset($options["form_site_url"]) || $options["form_site_url"])$options["form_site_url"]=BASE_URL;

        // 수신자 주소 쉼표를 구분으로 배열처리
        if(!is_array($options["to"])){
            $options["to"] = explode(",",$options["to"]);
        }
        if(!sizeof($options["to"]))return;

        // form 불러오기
        if(file_exists(APPPATH."Views/mail/".$options["form_file"].".php")) {
            $options["form_content"] = $this->loadView("mail/" . $options["form_file"], $options);
        }
        if(!$options["form_content"])return;

        $config['mailType'] = 'html';

        $email = \Config\Services::email($config);
        foreach($options["to"] as $to) {
            $email->clear();
            $email->setFrom($options["from"], $options["from_name"]);
            $email->setTo($to);
            $email->setSubject($options["mail_title"]);
            $email->setMessage($options["form_content"]);
            $email->send();
        }

    }

    public function setContUrl($cont_url){
        $this->cont_url = $cont_url;
    }



}
