<?php

namespace App\Controllers\Master\Hospital;
use App\Controllers\Master\MasterController;
use App\Libraries\Uploader;

class History extends MasterController
{
    protected $models = array('HospitalHistoryModel');
    protected $viewPath = "hospital/history";

    public function index()
    {
        /**
         * 검색 기능 구현 시작
         */
        if($this->sch_obj[1])$this->HospitalHistoryModel->like("hoh_year",$this->sch_obj[1],'both');
        /* 검색 기능 구현 끝 */

        $this->HospitalHistoryModel->orderBy("hoh_year desc");
        $data = $this->HospitalHistoryModel->getPager();

        $this->setView("list",$data);
        return $this->run();
    }

    public function edit($idx=""){

        $validate = $this->validate([

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

            if(isset($data['hoh_history']) && $data['hoh_history']){
                $data['hoh_history'] = json_decode($data['hoh_history'],true);
            }
            if(!is_array($data['hoh_history'])) {
                $data['hoh_history'] = array();
            }


            $data["idx"] = $idx;

            if($this->method=="post")$data["validate_error_msg"] = $this->makeErrorMessage($this->validator->getErrors());
            else $data["validate_error_msg"] = "";



            $this->setView("edit", $data);
            return $this->run();
        }else if($this->method=="post"){  //-- 저장 처리
            $info = $this->getPost();

            $history = array();
            foreach($info['hoh_date_start'] as $key=>$start){
                if(!$start)continue;
                $end = $info['hoh_date_end'][$key];
                $cont_kor = $info['hoh_content_kor'][$key];
                $cont_rus = $info['hoh_content_rus'][$key];
                $history[] = array(
                    'start'=>$start,
                    'end'=>$end,
                    'content_kor'=>$cont_kor,
                    'content_rus'=>$cont_rus,

                );
            }

            $info['hoh_history'] = json_encode($history,JSON_UNESCAPED_UNICODE);

            if($this->HospitalHistoryModel->edit($info)){
                $this->session->setFlashdata('messageFlag', 'edit');
                return redirect()->to($this->cont_url."?".$_SERVER["QUERY_STRING"]);
            }else{
                alert("오류가 발생하였습니다");
            }
        }
    }
}
