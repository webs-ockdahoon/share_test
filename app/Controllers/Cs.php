<?php

namespace App\Controllers;

class Cs extends BaseController
{
    protected $models = array('InquiryModel','ReviewModel','DepartmentsModel');
    protected $viewPath = "cs";

    public function inquiry()
    {

        if($this->isAjax && $this->method=="post") {    //-- Form 출력

            $info = $this->getPost();

            if ($info["inq_name"]) {
                $info['inq_lang'] = $this->lang;
                if ($this->InquiryModel->edit($info)) {
                    $json["result"] = "OK";
                } else {
                    $json["result"] = "ERROR";
                }
            }
        }else{
            $this->setUseLayout(false); // 레이아웃은 view 에서 선택하기 위해 해당 기능 해제
            $this->setView("inquiry");
            return $this->run();
        }
        die(json_encode($json));
    }


    public function review()
    {
        if($this->isAjax && $this->method=="post") {    //-- Form 출력
            $info = $this->getPost();
            if($info["rev_name"]) {

                $info['rev_lang'] = $this->lang;

                if($info['rev_medical_type']) {
                    $temp = explode("::", $info['rev_medical_type']);    // 부서번호/명칭 분리하기. - 사실 명칭은 크게 필요없을듯하나. 백업용도도로 일단 저장
                    $info['rev_dep_idx'] = $temp[0];
                    $info['rev_dep_title'] = $temp[1];
                }else {
                    $info['rev_dep_idx'] = "";
                    $info['rev_dep_title'] = "";
                }

                if ($this->ReviewModel->edit($info)) {
                    $json["result"] = "OK";
                } else {
                    $json["result"] = "ERROR";
                }
            }else{
                $json["result"] = "ERROR";
            }
            die(json_encode($json));
        }
        else{

            // 진료과
            $this->DepartmentsModel->select('dep_idx,dep_title_kor,dep_title_'.$this->lang . " as dep_title");
            $this->DepartmentsModel->where("(dep_deleted_at is null or dep_deleted_at = '')"); // 삭제한 데이터는 제외

            $this->DepartmentsModel->where("dep_display_".$this->lang,"Y"); // 화면 보이기/숨김
            $this->DepartmentsModel->orderBy('dep_title_'.$this->lang,"ASC"); // 과 제목
            $data['dep_list'] = $this->DepartmentsModel->get()->getResultArray();

            $this->setUseLayout(false); // 레이아웃은 view 에서 선택하기 위해 해당 기능 해제
            $this->setView("review",$data);
            return $this->run();
            //return view('welcome_message');

        }
    }
}
