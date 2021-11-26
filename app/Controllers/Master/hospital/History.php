<?php

namespace App\Controllers\Master\Hospital;
use App\Controllers\Master\MasterController;
use App\Libraries\Uploader;

class History extends MasterController
{
    protected $models = array('HospitalHistoryModel','CodeIntroHistoryModel');
    protected $viewPath = "hospital/history";

    public function index()
    {
        /**
         * 검색 기능 구현 시작
         */
        if($this->sch_obj[1])$this->HospitalHistoryModel->like("hoh_year",$this->sch_obj[1],'both');
        /* 검색 기능 구현 끝 */

        $data = $this->HospitalHistoryModel->getPager();

        $this->setView("list",$data);
        return $this->run();
    }

    public function edit($idx=""){

        $validate = $this->validate([
            'hoh_position' => [
                'rules'=>'required',
                'errors'=> ['required'=>'대상년도를 입력해 주세요.'],
            ],
            'hoh_year' => [
                'rules'=>'required',
                'errors'=> ['required'=>'년도를 입력해 주세요.'],
            ],

        ]);

        if(!$validate) {    //-- Form 출력
            // 데이터 불러오기
            if($idx){
                if(!$data = $this->HospitalHistoryModel->find($idx))alert("데이터를 찾을 수 없습니다.");
            }
            else foreach($this->HospitalHistoryModel->getAllowedFields() as $key=>$f)$data[$f]="";

            $data["idx"] = $idx;

            if($this->method=="post")$data["validate_error_msg"] = $this->makeErrorMessage($this->validator->getErrors());
            else $data["validate_error_msg"] = "";

            $this->CodeIntroHistoryModel->where("(cih_deleted_at = null or cih_deleted_at = '')"); // 삭제한 데이터는 제외
            $this->CodeIntroHistoryModel->where("cih_state","Y"); // 화면 보이기/숨김
            $this->CodeIntroHistoryModel->orderBy("cih_date_start","ASC"); // 시작년도가 작은것부터
            $data['year_between'] = $this->CodeIntroHistoryModel->get()->getResultArray();

            $this->setView("edit", $data);
            return $this->run();
        }else if($this->method=="post"){  //-- 저장 처리
            $info = $this->getPost();

            // 데이터 불러오기
            if($info[$this->primaryKey])$rs_info = $this->HospitalHistoryModel->find($info[$this->primaryKey]);

            if(empty($info['hoh_date_end']))
            {
                $info['hoh_date_end'] = "현재";
            }

            if($this->HospitalHistoryModel->edit($info)){
                
                $this->session->setFlashdata('messageFlag', 'edit');
                return redirect()->to($this->cont_url."?".$_SERVER["QUERY_STRING"]);
            }else{
                alert("오류가 발생하였습니다");
            }
        }
    }
}
