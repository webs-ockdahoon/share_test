<?php

namespace App\Controllers\Master\Member;
use App\Controllers\Master\MasterController;

class Member extends MasterController
{
    protected $models = array('MemberModel');
    protected $viewPath = "member/member";

    public function index()
    {
        /**
         * 검색 기능 구현 시작
         */
        if($this->sch_obj[1])$this->model->like("mem_name",$this->sch_obj[1],'both');
        if($this->sch_obj[2])$this->model->like("mem_id",$this->sch_obj[2],'both');
        if($this->sch_obj[3])$this->model->like("mem_tel",$this->sch_obj[3],'both');
        /* 검색 기능 구현 끝 */

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
            if($idx){
                if(!$data = $this->model->find($idx))alert("데이터를 찾을 수 없습니다.");
            }
            else foreach($this->model->getAllowedFields() as $key=>$f)$data[$f]="";

            $data["idx"] = $idx;

            if($this->method=="post")$data["validate_error_msg"] = $this->makeErrorMessage($this->validator->getErrors());
            else $data["validate_error_msg"] = "";

            $this->setView("edit", $data);
            return $this->run();
        }else if($this->method=="post"){  //-- 저장 처리
            $info = $this->getPost();

            // 비밀번호 미입력시 필드 삭제
            if($info["mem_idx"] && !$info["mem_pass"])unset($info["mem_pass"]);

            if($this->model->edit($info)){
                $this->session->setFlashdata('messageFlag', 'edit');
                return redirect()->to($this->cont_url."?".$_SERVER["QUERY_STRING"]);
            }else{
                alert("오류가 발생하였습니다");
            }
        }
    }
}
