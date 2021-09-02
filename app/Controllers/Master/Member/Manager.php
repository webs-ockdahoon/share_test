<?php

namespace App\Controllers\Master\Member;
use App\Controllers\Master\MasterController;

class Manager extends MasterController
{
    protected $models = array('MemberModel','AuthMenuModel','LogManagerModel');
    protected $viewPath = "member/manager";

    public function index()
    {
        /**
         * 검색 기능 구현 시작
         */
        if($this->sch_obj[1])$this->model->like("mem_name",$this->sch_obj[1],'both');
        if($this->sch_obj[2])$this->model->like("mem_id",$this->sch_obj[2],'both');
        if($this->sch_obj[3])$this->model->like("mem_tel",$this->sch_obj[3],'both');
        /* 검색 기능 구현 끝 */

        // 관리자 등급만 등록 가능
        $this->model->where("mem_level","80");

        $data = $this->model->getPager();

        $this->setView("list",$data);
        return $this->run();
    }

    public function edit($idx=""){

        $validate = $this->validate([
            'mem_name' => [
                'rules'=>'required',
                'errors'=> ['required'=>'이름을 입력해 주세요.'],
            ],
        ]);

        if(!$validate) {    //-- Form 출력

            // 데이터 불러오기
            $auth_menu_list = array();
            if($idx){
                if(!$data = $this->model->find($idx))alert("데이터를 찾을 수 없습니다.");
                $auth_menu_list = $this->AuthMenuModel->getAuth($data["mem_id"]);
            }
            else foreach($this->model->getAllowedFields() as $key=>$f)$data[$f]="";

            $data["auth_menu_list"] = $auth_menu_list;

            $data["idx"] = $idx;

            if($this->method=="post")$data["validate_error_msg"] = $this->makeErrorMessage($this->validator->getErrors());
            else $data["validate_error_msg"] = "";

            $this->setView("edit", $data);
            return $this->run();
        }else if($this->method=="post"){  //-- 저장 처리
            $info = $this->getPost();

            // 비밀번호 미입력시 필드 삭제 & 비밀번호 생성
            if($info["mem_idx"] && !$info["mem_pass"])unset($info["mem_pass"]);
            else if(isset($info["mem_pass"]) && $info["mem_pass"])$info["mem_pass"] = $this->model->makePassword($info["mem_pass"]);

            if(!$info["mem_idx"] && !isset($info["mem_level"]))$info["mem_level"]=80;   // 관리자 레벨 주기

            // 로그 기록을 위한 전처리
            $type = "";
            if($info["mem_idx"]){
                $mem_info = $this->model->find($info["mem_idx"]);
                $type = "edit";
            }
            else {
                $mem_info = array();
                $type = "insert";
            }

            if($this->model->edit($info)){

                if(!isset($info["amn_code"]) || !is_array($info["amn_code"]) || !$info["amn_code"])$info["amn_code"]=array();

                $group_code = $this->LogManagerModel->getUniqueCode();

                // 메뉴 권한 정보 추가 (권한 추가/삭제 카운트)
                $auth_count = $this->AuthMenuModel->editAuth($info["mem_id"],$info["amn_code"],$group_code);

                // 정보 수정 내용
                if($type=="edit") {
                    $change_cont = "";
                    if (trim($mem_info["mem_name"]) != trim($info["mem_name"]))$change_cont.= "이름 변경\n";
                    if (isset($info["mem_pass"]) && trim($info["mem_pass"]))$change_cont.= "비밀번호 변경\n";
                    if (trim($mem_info["mem_tel"]) != trim($info["mem_tel"]))$change_cont.= "전화번호 변경\n";
                    if (trim($mem_info["mem_email"]) != trim($info["mem_email"]))$change_cont.= "이메일 변경\n";

                    if($change_cont)$change_cont = "기본정보 수정 내역\n" . $change_cont;
                    else $change_cont = "기본정보 수정된 내역 없음.";

                }else{
                    $change_cont = "신규 추가";
                }

                $change_cont.="\n권한 수정 내역 : 추가 ".$auth_count["inserted"]."건 / 삭제 ".$auth_count["deleted"]."건";
                $this->write_change_log($group_code,$info["mem_id"],$type,$change_cont);

                $this->session->setFlashdata('messageFlag', 'edit');
                return redirect()->to($this->cont_url."?".$_SERVER["QUERY_STRING"]);
            }else{
                alert("오류가 발생하였습니다");
            }
        }
    }

    // 수정 로그 기록하기
    public function write_change_log($group_code,$mem_id,$type,$cont){
        if(!$type)return;
        $data = array(
            "lom_mem_id"=>$mem_id,
            "lom_type"=>$type,
            "lom_content"=>$cont,
            'lom_group_code'=>$group_code,
        );
        $this->LogManagerModel->edit($data);
    }

    public function delAfter($idxs){ // 해제 처리 로그 남기기기
        foreach($idxs as $idx){
            if(!$data = $this->model->find($idx))alert("데이터를 찾을 수 없습니다.");

        }
    }

}
