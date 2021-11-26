<?php

namespace App\Controllers\Master\Code;
use App\Controllers\Master\MasterController;
use App\Libraries\Uploader;

class IntroHistory extends MasterController
{
    protected $models = array('CodeIntroHistoryModel');
    protected $viewPath = "code/history";

    public function index()
    {
        /**
         * 검색 기능 구현 시작
         */
        if($this->sch_obj[1])$this->model->like("cih_date_start",$this->sch_obj[1],'both');
        /* 검색 기능 구현 끝 */

        $data = $this->model->getPager();

        $this->setView("list",$data);
        return $this->run();
    }

    public function edit($idx=""){

        $validate = $this->validate([
            'cih_date_start' => [
                'rules'=>'required',
                'errors'=> ['required'=>'시작년도를 입력해 주세요.'],
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

            // 데이터 불러오기
            if($info[$this->primaryKey])$rs_info = $this->model->find($info[$this->primaryKey]);

            if(empty($info['cih_date_end']))
            {
                $info['cih_date_end'] = "현재";
            }

            if($this->model->edit($info)){
                
                $this->session->setFlashdata('messageFlag', 'edit');
                return redirect()->to($this->cont_url."?".$_SERVER["QUERY_STRING"]);
            }else{
                alert("오류가 발생하였습니다");
            }
        }
    }
}
