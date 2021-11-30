<?php

namespace App\Controllers\Master\Partner;
use App\Controllers\Master\MasterController;
use App\Libraries\Uploader;

class Partner extends MasterController
{
    protected $models = array('PartnerModel');
    protected $viewPath = "partner/partner";

    public function index()
    {
        /**
         * 검색 기능 구현 시작
         */
        if($this->sch_obj[1])$this->model->like("par_title",$this->sch_obj[1],'both');
        /* 검색 기능 구현 끝 */

        $data = $this->model->getPager();

        $this->setView("list",$data);
        return $this->run();
    }

    public function edit($idx=""){

        $validate = $this->validate([
            'par_title' => [
                'rules'=>'required',
                'errors'=> ['required'=>'파트너사를 입력해 주세요.'],
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

            /**
             * 파일 업로드 처리
             */
            // 기존 업로드 파일 정보 추가
            $uploaded = array();
            if(!isset($rs_info["par_image"]))$rs_info["par_image"]="";
            $uploaded["par_image"] = array(
                "name"=>"", // 실제파일명
                "upload"=>$rs_info["par_image"] // 업로드된 파일명
            );

            $up_max_width = 190;
            $up_option = array("path"=>"departments","uploaded"=>$uploaded,"image_max_width"=>$up_max_width);
            $uploader = new Uploader("par_image",$up_option);
            $fup = $uploader->upload();

            foreach($fup as $key=>$f){
                $info[$key] = $f["upload"];
            }
            // 파일 업로드 처리 끝

            // 원본 파일명 저장
            if($fup['par_image']['name'])
            {
                $info['par_file_name'] = $fup['par_image']['name'];
            }

            if($this->model->edit($info)){
                // 기존 파일 삭제 - 중요 - 반드시 DB저장 후 기존 파일 삭제할 것.
                $uploader->clear_old_file();
                
                $this->session->setFlashdata('messageFlag', 'edit');
                return redirect()->to($this->cont_url."?".$_SERVER["QUERY_STRING"]);
            }else{
                alert("오류가 발생하였습니다");
            }
        }
    }
}
