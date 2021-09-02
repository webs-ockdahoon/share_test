<?php

namespace App\Controllers\Master\Config;
use App\Controllers\Master\MasterController;

class Terms extends MasterController
{
    protected $models = array('TermsModel');
    protected $viewPath = "config/terms";

    public function index()
    {

        if(!$this->sch_obj[1]){
            return redirect()->to("?s1=personal_policy");
            //$this->sch_obj[1]="private";
        }

        /**
         * 검색 기능 구현 시작
         */
        if($this->sch_obj[1])$this->model->where("terms_group",$this->sch_obj[1]);
        if($this->sch_obj[2])$this->model->like("terms_content",$this->sch_obj[2],'both');
        /* 검색 기능 구현 끝 */

        $data = $this->model->getPager();

        $data["group_title"] = $this->getGroupTitle($this->sch_obj[1]);
        if(!$data["group_title"]){
            alert("잘못된 접근입니다.");
        }

        $this->setView("list",$data);
        return $this->run();
    }

    public function edit($idx=""){



        $validate = $this->validate([
            'terms_group' => [
                'rules'=>'required',
                'errors'=> ['required'=>'그룹을 입력해 주세요.'],
            ],
        ]);

        if(!$validate) {    //-- Form 출력
            // 데이터 불러오기
            if($idx){
                if(!$data = $this->model->find($idx))alert("데이터를 찾을 수 없습니다.");
            }
            else foreach($this->model->getAllowedFields() as $key=>$f)$data[$f]="";

            $data["group_title"] = $this->getGroupTitle($this->sch_obj[1]);
            if(!$data["group_title"]){
                alert("잘못된 접근입니다.");
            }

            $data["idx"] = $idx;

            if($this->method=="post")$data["validate_error_msg"] = $this->makeErrorMessage($this->validator->getErrors());
            else $data["validate_error_msg"] = "";

            $this->setView("edit", $data);
            return $this->run();
        }else if($this->method=="post"){  //-- 저장 처리
            $info = $this->getPost();

            if($this->model->edit($info)){
                $this->session->setFlashdata('messageFlag', 'edit');
                return redirect()->to($this->cont_url."?".$_SERVER["QUERY_STRING"]);
            }else{
                alert("오류가 발생하였습니다");
            }
        }
    }

    private function getGroupTitle($v){
        switch($v){
            case "personal_policy":return "개인정보처리방침";
            case "terms":return "사이트 이용약관";
        }
    }
}
