<?php

namespace App\Controllers\Master\Cs;
use App\Controllers\Master\MasterController;
use App\Libraries\Uploader;

class Inquiry extends MasterController
{
    protected $models = array('InquiryModel');
    protected $viewPath = "cs/inquiry";

    public function index()
    {
        /**
         * 검색 기능 구현 시작
         */
        if($this->sch_obj[1])$this->InquiryModel->like("inq_name",$this->sch_obj[1],'both'); // 이름
        if($this->sch_obj[2])$this->InquiryModel->like("inq_tel",$this->sch_obj[2],'both'); // 연락처
        if($this->sch_obj[3])$this->InquiryModel->where("inq_lang",$this->sch_obj[3]); // 언어
        /* 검색 기능 구현 끝 */

        $data = $this->InquiryModel->getPager();

        $this->setView("list",$data);
        return $this->run();
    }

    public function edit($idx=""){

        $validate = $this->validate([
            'inq_name' => [
                'rules'=>'required',
                'errors'=> ['required'=>'이름을 입력해 주세요.'],
            ],

        ]);

        if(!$validate) {    //-- Form 출력
            // 데이터 불러오기
            if($idx){
                if(!$data = $this->InquiryModel->find($idx))alert("데이터를 찾을 수 없습니다.");
            }
            else foreach($this->InquiryModel->getAllowedFields() as $key=>$f)$data[$f]="";

            $data["idx"] = $idx;

            if($this->method=="post")$data["validate_error_msg"] = $this->makeErrorMessage($this->validator->getErrors());
            else $data["validate_error_msg"] = "";

            $this->setView("edit", $data);
            return $this->run();
        }else if($this->method=="post"){  //-- 저장 처리
            $info = $this->getPost();

            // 데이터 불러오기
            if($info[$this->primaryKey])$rs_info = $this->InquiryModel->find($info[$this->primaryKey]);

            if($this->InquiryModel->edit($info)){
                // 기존 파일 삭제 - 중요 - 반드시 DB저장 후 기존 파일 삭제할 것.
                //$uploader->clear_old_file();

                $this->session->setFlashdata('messageFlag', 'edit');
                return redirect()->to($this->cont_url."?".$_SERVER["QUERY_STRING"]);
            }else{
                alert("오류가 발생하였습니다");
            }
        }
    }
}
