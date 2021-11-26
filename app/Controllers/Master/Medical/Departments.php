<?php

namespace App\Controllers\Master\Medical;
use App\Controllers\Master\MasterController;
use App\Libraries\Uploader;

class Departments extends MasterController
{
    protected $models = array('MedicalDepartmentsModel','CodeDepartmentsModel');
    protected $viewPath = "medical/departments";

    public function index()
    {
        /**
         * 검색 기능 구현 시작
         */
        if($this->sch_obj[1])$this->MedicalDepartmentsModel->like("med_name",$this->sch_obj[1],'both'); // 이름
        if($this->sch_obj[2])$this->MedicalDepartmentsModel->like("med_medical_type",$this->sch_obj[2],'both'); // 과
        /* 검색 기능 구현 끝 */

        $data = $this->MedicalDepartmentsModel->getPager();

        $this->setView("list",$data);
        return $this->run();
    }

    public function edit($idx=""){

        $validate = $this->validate([
            'med_name' => [
                'rules'=>'required',
                'errors'=> ['required'=>'이름을 입력해 주세요.'],
            ],

        ]);

        if(!$validate) {    //-- Form 출력
            // 데이터 불러오기
            if($idx){
                if(!$data = $this->MedicalDepartmentsModel->find($idx))alert("데이터를 찾을 수 없습니다.");
            }
            else foreach($this->MedicalDepartmentsModel->getAllowedFields() as $key=>$f)$data[$f]="";

            $data["idx"] = $idx;

            if($this->method=="post")$data["validate_error_msg"] = $this->makeErrorMessage($this->validator->getErrors());
            else $data["validate_error_msg"] = "";

            $this->CodeDepartmentsModel->where("(cde_deleted_at = null or cde_deleted_at = '')"); // 삭제한 데이터는 제외
            $this->CodeDepartmentsModel->where("cde_state","Y"); // 화면 보이기/숨김
            $this->CodeDepartmentsModel->orderBy("cde_title","ASC"); // 과 제목
            $data['code_list'] = $this->CodeDepartmentsModel->get()->getResultArray();

            $this->setView("edit", $data);
            return $this->run();
        }else if($this->method=="post"){  //-- 저장 처리
            $info = $this->getPost();

            // 데이터 불러오기
            if($info[$this->primaryKey])$rs_info = $this->MedicalDepartmentsModel->find($info[$this->primaryKey]);

            /**
             * 파일 업로드 처리
             */
            // 기존 업로드 파일 정보 추가
            $uploaded = array();
            if(!isset($rs_info["med_image"]))$rs_info["med_image"]="";
            $uploaded["med_image"] = array(
                "name"=>"", // 실제파일명
                "upload"=>$rs_info["med_image"] // 업로드된 파일명
            );

            $up_max_width = 102;
            $up_option = array("path"=>"medial_departments","uploaded"=>$uploaded,"image_max_width"=>$up_max_width);
            $uploader = new Uploader("med_image",$up_option);
            $fup = $uploader->upload();

            foreach($fup as $key=>$f){
                $info[$key] = $f["upload"];
            }
            // 파일 업로드 처리 끝

            if($this->MedicalDepartmentsModel->edit($info)){
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
