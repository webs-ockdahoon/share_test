<?php

namespace App\Controllers\Master;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class MasterController extends BaseController
{
    protected $isMasterMode = true; // 게시판모드 플래그 활성화
    protected $isExcelDown = false; // 엑셀 다운로드 모드 플래그

    /**
     * Constructor.
     *
     * @param RequestInterface $request
     * @param ResponseInterface $response
     * @param LoggerInterface $logger
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // 로그인 여부 체크 후 로그인 페이지로 보내기
        //if(!$this->isMaster){
        if(!$this->isLogin && $this->SS_Mlevel<80){    // level값 80이상 로그인 가능하도록 수정
            if($this->cont_url!="/master/login/main") {
                alert("","/master/login?logout=1&redirect=1");
                exit();
            }
        }

        // 기본 경로 URL 지정
        $this->THEME_URL = "/master";

        // 기본 테마 경로 지정
        $this->THEME_ROOT = substr($this->THEME_URL,1);


        $this->write_log();
    }

    public function write_log(){

        if($this->isAjax)return;   // 일단 ajax 조회건은 로그기록하지 않음.
        if($this->cont_url=="/master/log/admin")return;

        $uri = service('uri')->getPath();
        $log_model = model('App\Models\LogAdminModel');

        // 메뉴 잡아내기
        $menu_info = $this->getMasterMenu();
        $menu_name = "";
        foreach($menu_info as $mn1){
            if(isset($mn1["sub"]) && sizeof($mn1["sub"])){
                foreach($mn1["sub"] as $mn2){
                    if($mn2["link"]==$this->cont_url){
                        $menu_name = $mn2["name"];
                        break;
                    }
                }
            }else{
                if($mn1["link"]==$this->cont_url) {
                    $menu_name = $mn1["name"];
                    break;
                }
            }

            if($menu_name)break;
        }

        // 로그 기록하지않는 페이지 기록
        $nolog_page = array(
            "/index.php/master/log/admin",
        );

        if(array_search($_SERVER["PHP_SELF"],$nolog_page)!==false){
            return;
        }


        if($this->method=="post"){
            $data = $this->getPost();
        }else{
            $data = $this->getGet();
        }

        $data_str = "";
        foreach($data as $key=>$val){

            if(is_array($val)){
                foreach($val as $key2=>$v){
                    if(is_array($v)){   // 이 이상 배열은 로그 기록시 json 으로 바꿔버리자
                        $v = json_encode($v,JSON_UNESCAPED_UNICODE);
                    }

                    if ($data_str) $data_str .= "&";
                    $data_str .= $key . "[" . $key2 . "]=" . $v;

                }
            }else{
                // 로그인/회원비밀번호 설정시 비밀번호 값 암호화
                if($key=="mem_pass")$val = $log_model->makePassword($val);
                if($data_str)$data_str.="&";
                $data_str.=$key."=".$val;
            }
        }

        $info = array(
            "loa_url"=>"/".$uri,
            "loa_method"=>$this->method,
            "loa_data"=>$data_str,
            "loa_menu_name"=>$menu_name,

            "loa_created_id"=>$this->SS_MID,
            "loa_created_ip"=>$this->get_client_ip(),
        );


        $log_model->insert($info);
    }

    /**
     * 관리자모드 메뉴 처리
     */
    public function getMasterMenu(){

        $menu = array();

        $menu["hospital"] = array(
            "name"=>"병원소개관리",
            "icon"=>"fa-users",
            "link"=>"",
            "sub"=>array(
                "history"=>array("name"=>"회사연혁관리","link"=>"/master/hospital/history",),
            ),
        );

        $menu["medical"] = array(
            "name"=>"진료과/전문센터",
            "icon"=>"fa-users",
            "link"=>"",
            "sub"=>array(
                "departments"=>array("name"=>"진료과 관리","link"=>"/master/medical/treatment",),
                "departmentsDoctor"=>array("name"=>"진료과 의료진 관리","link"=>"/master/medical/treatmentDoctor",),
                "specialized"=>array("name"=>"전문센터 관리","link"=>"/master/medical/specializedcenter",),
                "specializedDoctor"=>array("name"=>"전문센터 의료진 관리","link"=>"/master/medical/specializedcenterDoctor",),
            ),
        );

        $menu["mrequest"] = array(
            "name"=>"문의 및 후기 관리",
            "icon"=>"fa-users",
            "link"=>"",
            "sub"=>array(
                "inquiry"=>array("name"=>"진료 문의 관리","link"=>"/master/mrequest/inquiry",),
                "reviewinquiry"=>array("name"=>"진료 후기 관리","link"=>"/master/mrequest/reviewinquiry",),
            ),
        );

        $menu["hospital"] = array(
            "name"=>"진료안내",
            "icon"=>"fa-users",
            "link"=>"",
            "sub"=>array(
                "history"=>array("name"=>"회사연혁관리","link"=>"/master/hospital/history",),
            ),
        );

        $menu["partner"] = array(
            "name"=>"파트너사관리",
            "icon"=>"fa-users",
            "link"=>"",
            "sub"=>array(
                "partner"=>array("name"=>"파트너사관리","link"=>"/master/partner/partner",),
            ),
        );

        /*
        $menu["member"] = array(
            "name"=>"회원관리",
            "icon"=>"fa-users",
            "link"=>"",
            "sub"=>array(
                "member"=>array("name"=>"회원관리","link"=>"/master/member/member",),
                "manager"=>array("name"=>"관리자 설정","link"=>"/master/member/manager",),
            ),
        );
        */

        $menu["banner"] = array(
            "name"=>"배너관리",
            "icon"=>"fa-images",
            "link"=>"/master/banner/banner",
            "sub"=>array(
            ),
        );

        $menu["popup"] = array(
            "name"=>"팝업관리",
            "icon"=>"fa-window-restore",
            "link"=>"/master/popup/popup",
            "sub"=>array(
            ),
        );

        $menu["board"] = array(
            "name"=>"게시판 관리",
            "icon"=>"fa-edit",
            "link"=>"",
            "sub"=>array(
                "config"=>array("name"=>"게시판관리","link"=>"/master/board/config",),

            ),
        );

        $menu["config"] = array(
            "name"=>"사이트 설정",
            "icon"=>"fa-cogs",
            "link"=>"",
            "sub"=>array(
                "company"=>array("name"=>"업체정보 설정","link"=>"/master/config/config/company",),
                "site"=>array("name"=>"사이트 설정","link"=>"/master/config/config/site",),
                "menu"=>array("name"=>"메뉴 관리","link"=>"/master/config/menu",),
                "policy"=>array("name"=>"개인정보 취급방침","link"=>"/master/config/terms?s1=personal_policy",),
                "terms"=>array("name"=>"사이트 이용약관","link"=>"/master/config/terms?s1=terms",),
            ),
        );

        $menu["analytics"] = array(
            "name"=>"방문자 통계",
            "icon"=>"fa-chart-line",
            "link"=>"",
            "sub"=>array(
                "visitor"=>array("name"=>"방문자 통계","link"=>"/master/analytics/visitor",),
                "visitorList"=>array("name"=>"방문자 목록","link"=>"/master/analytics/visitorList",),
            ),
        );

        $menu["log"] = array(
            "name"=>"로그관리",
            "icon"=>"fa-chart-line",
            "link"=>"",
            "sub"=>array(
                "login"=>array("name"=>"로그인 로그","link"=>"/master/log/login",),
                "admin"=>array("name"=>"관리자모드 이용 로그","link"=>"/master/log/admin",),
                "manager"=>array("name"=>"관리자 설정 로그","link"=>"/master/log/manager",),
            ),
        );

        // 메뉴 권한 제어
        if($this->SS_Mlevel<90){
            $AuthMenuModel = model('App\Models\AuthMenuModel');
            $AuthMenu = $AuthMenuModel->getAuth($this->SS_MID);
            $menu_new = array();
            foreach($AuthMenu as $menu1_code=>$menu1){
                $mn = "";
                if(isset($menu[$menu1_code])){
                    $mn = $menu[$menu1_code];
                    if(isset($mn["sub"]) && sizeof($mn["sub"])>0){
                        unset($mn["sub"]);  // 서브는 다시 검사
                        foreach($menu1 as $menu2_code=>$auth_idx){
                            if($menu[$menu1_code]["sub"][$menu2_code]){
                                $mn["sub"][$menu2_code] = $menu[$menu1_code]["sub"][$menu2_code];
                            }
                        }
                    }
                }
                $menu_new[$menu1_code] = $mn;
            }
            $menu = $menu_new;
        }
        return $menu;
    }

    /**
     * 엑셀 다운로드 메소드 호출하기
     * @return mixed
     */
    public function excel(){
        $this->isExcelDown = true;
        return $this->index();
        exit();
    }

    /**
     * 리스트 공통 ajax로 Display 필드 업데이트 처리
     */
    public function set_display(){
        $info = $this->getPost();
        $this->model->set_display($info["idx"],$info["field"],$info["flag"]);
        $json["result"] = "OK";
        die(json_encode($json));
    }


}
