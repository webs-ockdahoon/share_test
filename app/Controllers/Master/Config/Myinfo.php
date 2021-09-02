<?php

namespace App\Controllers\Master\Config;
use App\Controllers\Master\MasterController;

class Myinfo extends MasterController
{
    protected $models = array('MemberModel');
    protected $viewPath = "config";

    public function index()
    {
        $validate = $this->validate([
            'mem_name' => [
                'rules'=>'required',
                'errors'=> ['required'=>'이름을 입력해 주세요.'],
            ],
        ]);

        if(!$validate) {    //-- Form 출력

            $idx = $this->SS_MIDX;

            // 데이터 불러오기
            if($idx){
                if(!$data = $this->model->find($idx))alert("데이터를 찾을 수 없습니다.");
            }
            else foreach($this->model->getAllowedFields() as $key=>$f)$data[$f]="";

            $data["idx"] = $idx;

            if($this->method=="post")$data["validate_error_msg"] = $this->makeErrorMessage($this->validator->getErrors());
            else $data["validate_error_msg"] = "";

            $this->setView("myinfo", $data);
            return $this->run();
        }else if($this->method=="post"){  //-- 저장 처리
            $info = $this->getPost();

            // 비밀번호 미입력시 필드 삭제
            if($info["mem_idx"] && !$info["mem_pass"])unset($info["mem_pass"]);
            if(isset($info["mem_pass"]))$info["mem_pass"] = $this->model->makePassword($info["mem_pass"]);


            if($this->model->edit($info)){
                $this->session->setFlashdata('messageFlag', 'edit');
                return redirect()->to($this->cont_url."?".$_SERVER["QUERY_STRING"]);
            }else{
                alert("오류가 발생하였습니다");
            }
        }

    }





}