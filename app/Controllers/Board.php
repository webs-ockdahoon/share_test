<?php

namespace App\Controllers;
use App\Libraries\Uploader;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class Board extends BaseController
{
    protected $models = array('BoardDataModel','BoardConfModel','BoardFileModel');
    protected $viewPath = "board";
    protected $boc_code = ""; // 게시판 고유 코드
    protected $conf = ""; // 게시판 설정 정보
    protected $data_idx = ""; // 게시물 고유번호
    protected $isBoardMode = true; // 게시판모드 플래그 활성화


    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {

        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        $uri = service('uri');
        $segments = $uri->getSegments();
        if($segments[0]=="master"){ // 관리자모드일시 셋팅값 재정의
            $this->isMasterMode = true;
            // 기본 경로 URL 지정
            $this->THEME_URL = "/master";

            // 기본 테마 경로 지정
            $this->THEME_ROOT = substr($this->THEME_URL,1);

            // 컨트롤러 url 재정의
            if($this->isMasterMode && $this->isBoardMode)$this->cont_url = "/master/board".$this->cont_url;
        }


    }

    /**
     *
     * Board Route 기능
     * 게시판 사용시 무조건 index 를 한번 거쳐서 실제 메소드를 호출한다.
     *
     * @param $mode
     * @param string $boc_code
     * @param string $data_idx
     */
    public function index($mode,$boc_code="",$data_idx="",$args1="")
    {
        if(!$this->conf = $this->BoardConfModel->getInfo($boc_code))alert("존재하지 않는 게시판입니다.");
        $this->boc_code = $boc_code;
        $this->data_idx = $data_idx;

        // 게시판 테이블 지정
        $this->model->setDataTable($this->boc_code);
        $data = array();
        $this->addData($data);
        $this->setView("top",$data,$this->conf["boc_skin"]);

        if (method_exists($this, $mode))
        {
            return $this->$mode($this->data_idx,$args1);
        }else{
            echo "????";
        }
        exit();
    }

    // 글 리스트
    public function list(){
        $option["perPage"] = 10;

        if($this->sch_obj[1] && $this->sch_obj[2]) {
            $option["where"][] = array($this->sch_obj[1],$this->sch_obj[2]);
        }

        $option["orderBy"]="bod_group desc,bod_sort";
        $option["perPage"] = $this->conf["boc_list_size"];

        $data = $this->model->getPager($option);
        //echo $this->model->getLastQuery();
        $this->addData($data);

        $this->setView("list",$data,$this->conf["boc_skin"]);
        return $this->run();
    }

    // 글 읽기
    public function read($idx){
        $data = $this->model->find($this->data_idx);
        $data["idx"] = $idx;
        $this->addData($data);

        // 비밀글 열람시 비밀번호 검사
        if($data["bod_secret"] && !$this->auth_check($data["bod_mem_id"])){
            $pwd = $this->getPost("bod_password");
            if($pwd) {
                $pwd = $this->model->makePassword($pwd);
                if($pwd != $data["bod_password"]){
                    alert("비밀번호가 일치하지 않습니다.");
                }
            }else {
                $this->setView("password", $data, $this->conf["boc_skin"]);
                return $this->run();
            }
        }

        // 글 열람 카운트 처리하기
        $bod_read = $this->session->get("bod_read");
        if(!is_array($bod_read))$bod_read = array();

        if(array_search($idx,$bod_read)===false){
            $bod_read[] = $idx;
            $this->session->set("bod_read",$bod_read);

            $this->model->readCountUp($idx);
        }

        // 첨부파일 정보 가져오기
        $option = array(
            "bod_code"=>$this->boc_code,
            "bod_idx"=>$idx,
        );
        $data["bof_list"] = $this->BoardFileModel->getFileList($option);

        $this->setView("read",$data,$this->conf["boc_skin"]);
        return $this->run();
    }

    // 글작성
    public function write($idx="",$is_reply=""){

        if($is_reply && !$idx){ // 고유값 없이 답변글 시도시
            alert("잘못된 접근입니다.");
            exit();
        }

        $validate = $this->validate([
            'bod_title' => [
                'rules'=>'required|min_length[3]',
                'errors'=> ['required'=>'제목을 입력해 주세요.','min_length'=>'제목을 3자이상 입력해 주세요.'],
            ],
            'bod_content' => [
                'rules'=>'required',
                'errors'=> ['required'=>'글 내용을 입력해 주세요.'],
            ],
        ]);

        if(!$validate) {    //-- Form 출력

            if($idx && $is_reply){   // 기존 데이터 가져오기

                $origin = $this->model->find($idx);
                $fields = $this->model->getAllowedFields();
                foreach($fields as $f){
                    $data[$f] = "";
                }
                $data["bof_list"] = array();

                // 일부 내용 변경
                $data["bod_title"] = "Re : " . $origin["bod_title"];
                $data["bod_content"] = "----- 원본글 -----------------\n" . $origin["bod_content"];

                // 원본글이 비밀글일 경우 답변글도 비밀글로 처리
                $data["bod_origin_secret"] = false;
                if($origin["bod_secret"]){
                    $data["bod_origin_secret"] = true;
                }

            }else if($idx){  // 수정시
                $data = $this->model->find($idx);
                $data["bod_origin_secret"] = false;
                // 수정시 내글이 아닐경우. 비밀번호 체크
                if(!$this->auth_check($data["bod_mem_id"])){
                    $pwd = $this->getPost("bod_password");
                    if($pwd){
                        $pwd = $this->model->makePassword($pwd);
                        if($pwd != $data["bod_password"]){
                            alert("비밀번호가 일치하지 않습니다.");
                        }
                        // 수정 저장처리시 체크를 위한 세션값 설정
                        $this->session->set("bod_password_pass",time());

                    }else {
                        $data["idx"] = $idx;
                        $this->addData($data);
                        $this->setView("password", $data, $this->conf["boc_skin"]);
                        return $this->run();
                    }
                }
                // 비밀번호 체크 끝

                // 첨부파일 정보 가져오기
                $option = array(
                    "bod_code" => $this->boc_code,
                    "bod_idx" => $idx,
                );
                $data["bof_list"] = $this->BoardFileModel->getFileList($option);

                if($data['bod_level']>1){
                    $origin = $this->model->where('bod_group', $data['bod_group'])->first();
                    // 수정시에도 원본글이 비밀글일 경우 해당 글 비밀글 처리
                    if($origin["bod_secret"]){
                        $data["bod_origin_secret"] = true;
                    }
                }

            }else{  // 새글 작성시
                $data["bod_origin_secret"] = false;
                $fields = $this->model->getAllowedFields();
                foreach($fields as $f){
                    $data[$f] = "";
                }

                // 글 레벨 강제1 주기
                $data["bod_level"] = 1;

                $data["bof_list"] = array();
            }

            $data["idx"] = $idx;
            $this->addData($data);

            // 게시판 설정 가져오기
            $data["conf"] = $this->conf;

            // 카테고리 배열 만들기
            $cate = array();
            if(trim($this->conf["boc_category"])){
                $cate = explode(",",$this->conf["boc_category"]);
            }
            $data["category"] = $cate;

            // 고정형 제목 배열 만들기
            $fixed_title = array();
            if(trim($this->conf["boc_fixed_title"])){
                $fixed_title = explode("\n",$this->conf["boc_fixed_title"]);
            }
            $data["fixed_title"] = $fixed_title;

            // 답변글 작성인지 여부 플래그 가져가기
            $data["is_reply"] = $is_reply;

            $this->setView("write", $data, $this->conf["boc_skin"]);
            return $this->run();
        }else{  // 저장 처리
            $info = $this->getPost();

            // 파일 첨부 처리 - 게시판은 첨부파일을 별도 파일로 처리해서. 추가 커스텀
            $uploaded = array();

            // 첨부파일 정보 가져오기
            $option = array(
                "bod_code"=>$this->boc_code,
                "bod_idx"=>$idx,
            );
            $bof_list = $this->BoardFileModel->getFileList($option);

            for($k=1;$k<=4;$k++){   // 최대 첨부파일 4개까지
                if(!isset($bof_list[$k])){
                    $bof_list[$k]=array(
                        "bof_file_name"=>"",
                        "bof_file_save"=>"",
                        "bof_file_size"=>"",
                    );
                }
                $uploaded["bod_file".$k] = array(
                    "name"=>$bof_list[$k]["bof_file_name"], // 실제파일명
                    "upload"=>$bof_list[$k]["bof_file_save"], // 업로드된 파일명
                    "size"=>$bof_list[$k]["bof_file_size"], // 업로드된 파일 크기
                );
            }

            $up_option = array("path"=>"board/".$this->boc_code,"uploaded"=>$uploaded);
            $uploader = new Uploader("bod_file",$up_option);
            $fup = $uploader->upload();

            // 파일 첨부 처리 끝

            if($is_reply) {  // 답변글일 경우
                $origin = $this->model->find($idx);
                $info["bod_group"] = $origin["bod_group"];
                $info["bod_level"] = $origin["bod_level"] + 1;
                $info["bod_sort"] = $origin["bod_sort"] + 1;
                $info["bod_mem_id"] = $this->SS_MID;
                $info["bod_origin_mem_idx"] = $origin["bod_origin_mem_idx"];
                $info["bod_secret"] = $origin["bod_secret"];    // 원본 글 비밀글 설정 따라가기
                $info["bod_category"] = $origin["bod_category"]; // 원본 글 카테고리 가져가기

                // 자리값 구하기
                $option = array(
                    "bod_group"=>$info["bod_group"],
                    "bod_level"=>$info["bod_level"],
                    "bod_sort"=>$info["bod_sort"],
                );
                $info["bod_sort"] = $this->model->getReplyPosition($option);

                // 고유값 삭제
                $info["bod_idx"] = "";

                // 게시물 순서 밀기
                $this->model->setReplySort($info["bod_group"], $info["bod_sort"]);

            }else if($idx){ // 수정일경우

                $origin = $this->model->find($idx);

                // 수정시 내글이 아닐경우. 비밀번호 체크 세션 검사
                if(
                    !$is_reply && !$this->auth_check($origin["bod_mem_id"])
                ) {
                    // 수정 저장처리시 체크를 위한 세션값 검사
                    if(!$this->session->get("bod_password_pass")){
                        alert("잘못된 접근입니다.","/board/".$this->boc_code."/");
                    }

                    // 세션 삭제
                    $this->session->remove("bod_password_pass");
                }

            }else { // 새글일 경우
                $info["bod_group"] = $this->model->getNextGroupNum();
                $info["bod_level"] = 1;
                $info["bod_sort"] = 1;
                $info["bod_mem_id"] = $this->SS_MID;
                $info["bod_origin_mem_idx"] = $this->SS_MIDX;
            }

            // 비밀번호 암호화
            $info["bod_password"] = $this->model->makePassword($info["bod_password"]);

            // 글 저장
            $bod_idx = $this->model->edit($info);

            // 파일 DB 처리
            $file_info = array(
                "bod_code"=>$this->boc_code,
                "bod_idx"=>$bod_idx,
                "fup"=>$fup,
            );

            $this->BoardFileModel->edit($file_info);

            // 기존 파일 삭제
            $uploader->clear_old_file();

            return redirect()->to($this->cont_url . "/" . $this->boc_code . "?" . $info["qstr"]);
        }

    }

    public function reply($idx){
        return $this->write($idx,1);
    }

    public function delete($idx){
        if(!$origin = $this->model->find($idx)){
            alert("잘못된 접근입니다.");
        }

        $validate = $this->validate([
            $this->model->primaryKey => [
                'rules'=>'required',
                'errors'=> ['required'=>'확인을 선택해 주세요.'],
            ],
        ]);

        $auth_check = false;
        if ($this->auth_check($origin["bod_mem_id"])) {
            $auth_check = true;
        }

        if(!$validate) {    //-- Form 출력

            $data["idx"] = $idx;
            $data["auth_check"] = $auth_check;
            $this->addData($data);
            $this->setView("delete_confirm", $data, $this->conf["boc_skin"]);
            return $this->run();

        }else{
            $info = $this->getPost();

            // 비번 체크
            if(!$auth_check){
                $pwd = $this->getPost("bod_password");
                if($pwd) {
                    $pwd = $this->model->makePassword($pwd);
                    if ($pwd != $origin["bod_password"]) {
                        alert("비밀번호가 일치하지 않습니다.");
                    }
                }else{
                    alert("비밀번호가 일치하지 않습니다.");
                }
            }

            // 자신의 하위 답변글이 있는지 검사
            if($child = $this->model->where("bod_group",$origin["bod_group"])->where("bod_sort>",$origin["bod_sort"])->orderBy("bod_sort")->first()){
                if($child["bod_level"]>$origin["bod_level"]){
                    alert("해당 글의 답변글이 존재합니다.\\n답변글 삭제 후 해당글을 삭제해 주세요.");
                }
            }

            // 첨부파일 삭제
            $option = array(
                "bod_code" => $this->boc_code,
                "bod_idx" => $idx,
            );
            $bof_list = $this->BoardFileModel->getFileList($option);
            foreach($bof_list as $f){
                // db 삭제처리
                if($this->BoardFileModel->delete($f["bof_idx"])){
                    // 파일 삭제처리
                    if(file_exists(WRITEPATH . "uploads/".$f["bof_file_save"])){
                        @unlink(WRITEPATH . "uploads/".$f["bof_file_save"]);
                    }
                }
            }

            // DB에서 글 삭제
            if($this->model->delete($idx)){
                alert("삭제되었습니다.",$this->cont_url . "/" . $this->boc_code . "?" . $info["qstr"]);
            }
        }
    }

    // 글 첨부파일 다운로드
    public function download($bod_idx,$bof_idx){

        // TODO 권한 체크 필요

        if(!$bod_idx || !$bof_idx){
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            exit();
        }

        if($f_info = $this->BoardFileModel->where("bof_bod_idx",$bod_idx)->find($bof_idx)){
            $file_path = WRITEPATH . "uploads/" . $f_info["bof_file_save"];
            if(!file_exists($file_path) || !$file_path){
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
                exit();
            }

            // 다운로드 횟수 카운트
            $option = array(
                "bod_code"=>$this->boc_code,
                "bod_idx"=>$bod_idx,
                "bof_idx"=>$bof_idx,
            );
            $this->BoardFileModel->downloadCount($option);

            return $this->response->download($file_path, null)->setFileName($f_info["bof_file_name"]);;

        }else{
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            exit();
        }
    }

    // 공통 View 전달 값
    private function addData(&$data)
    {
        // 글읽기/글쓰기 페이지 지정
        $data["boc_title"]=$this->conf["boc_title"];
        //$data["primaryKey"]=$this->model->getPrimaryKey();
        $data["boc_code"] = $this->boc_code;
        $data["list_page"] = $this->cont_url . "/" . $this->boc_code;
        $data["read_page"] = $data["list_page"] . "/read";
        $data["write_page"] = $data["list_page"] . "/write";
        $data["reply_page"] = $data["list_page"] . "/reply";
        $data["delete_page"] = $data["list_page"] . "/delete";
        $data["download_page"] = $data["list_page"] . "/download";
    }

    // 게시물 권한 체크하기(수정,삭제,열람시 사용) - 차후 권한 수정이 이루어질 것을 대비해 함수로 분리
    private function auth_check($bod_mem_id){
        if($bod_mem_id == $this->SS_MID && $this->SS_MID){
            return true;
        }else{
            return false;
        }
    }



}
