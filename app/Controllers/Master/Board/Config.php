<?php

namespace App\Controllers\Master\Board;
use App\Controllers\Master\MasterController;

class Config extends MasterController
{
    protected $models = array('BoardConfModel');
    protected $viewPath = "board/config";

    public function index()
    {
        /**
         * 검색 기능 구현 시작
         */
        if($this->sch_obj[1])$this->model->like("boc_title",$this->sch_obj[1],'both');
        if($this->sch_obj[2])$this->model->like("boc_code",$this->sch_obj[1],'both');
        /* 검색 기능 구현 끝 */

        $data = $this->model->getPager();
        $data["authConf"] = $this->model->getAuthConf();

        $this->setView("list",$data);
        return $this->run();
    }

    public function edit($idx=""){

        $validate = $this->validate([
            'boc_code' => [
                'rules'=>'required|min_length[3]',
                'errors'=> ['required'=>'게시판코드를 입력해 주세요.','min_length'=>'제목을 3자이상 입력해 주세요.'],
            ],
            'boc_title' => [
                'rules'=>'required|min_length[3]',
                'errors'=> ['required'=>'게시판명을 입력해 주세요.','min_length'=>'게시판명을 3자이상 입력해 주세요.'],
            ],
        ]);

        if(!$validate) {    //-- Form 출력
            // 데이터 불러오기
            if($idx){
                if(!$data = $this->model->find($idx))alert("데이터를 찾을 수 없습니다.");
            }
            else foreach($this->model->getAllowedFields() as $key=>$f)$data[$f]="";

            $data["idx"] = $idx;

            $data["authConf"] = $this->model->getAuthConf();

            //-- 스킨 폴더 읽어들이기
            $data["board_skin"] = array();
            helper('filesystem');
            $files = get_dir_file_info(APPPATH . "Views/board/");
            foreach($files as $folder_name => $f){
                if(is_dir($f["relative_path"].$folder_name))$data["board_skin"][] = $folder_name;
            }

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
}
