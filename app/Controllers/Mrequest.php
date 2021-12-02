<?php

namespace App\Controllers;

class Mrequest extends BaseController
{
    protected $models = array('MrequestInquiryModel','MrequestReviewinquiryModel','CodeDepartmentsModel','CodeSpecializedModel');
    protected $viewPath = "mrequest";

    public function inquiry()
    {

        if($this->method=="post"){  //-- 저장 처리
            $info = $this->getPost();

            if($this->MrequestInquiryModel->edit($info))
            {
                $this->session->setFlashdata('messageFlag', 'edit');
                return redirect()->to($this->cont_url."/inquiry"."?".$_SERVER["QUERY_STRING"]);
            }
            else
            {
                //echo $this->model->getLastQuery();
                alert("진료 문의를 다시 남겨주세요.");
                return redirect()->to($this->cont_url."/inquiry"."?".$_SERVER["QUERY_STRING"]);
            }
        }

        $this->setUseLayout(false); // 레이아웃은 view 에서 선택하기 위해 해당 기능 해제
        $this->setView("inquiry");
        return $this->run();
        //return view('welcome_message');
    }


    public function reviewinquiry()
    {
        if($this->method=="post"){  //-- 저장 처리
            $info = $this->getPost();

            if($this->MrequestReviewinquiryModel->edit($info))
            {
                $this->session->setFlashdata('messageFlag', 'edit');
                return redirect()->to($this->cont_url."/reviewinquiry"."?".$_SERVER["QUERY_STRING"]);
            }
            else
            {
                //echo $this->model->getLastQuery();
                alert("진료 후기를 다시 남겨주세요.");
                return redirect()->to($this->cont_url."/reviewinquiry"."?".$_SERVER["QUERY_STRING"]);
            }
        }
        else{
            // 진료과
            $this->CodeDepartmentsModel->select('cde_title as title');
            $this->CodeDepartmentsModel->where("(cde_deleted_at = null or cde_deleted_at = '')"); // 삭제한 데이터는 제외
            $this->CodeDepartmentsModel->where("cde_state","Y"); // 화면 보이기/숨김
            $this->CodeDepartmentsModel->orderBy("cde_title","ASC"); // 과 제목
            $m['code_list1'] = $this->CodeDepartmentsModel->get()->getResultArray();

            //전문센터
            $this->CodeSpecializedModel->select('csp_title as title');
            $this->CodeSpecializedModel->where("(csp_deleted_at = null or csp_deleted_at = '')"); // 삭제한 데이터는 제외
            $this->CodeSpecializedModel->where("csp_state","Y"); // 화면 보이기/숨김
            $this->CodeSpecializedModel->orderBy("csp_title","ASC"); // 과 제목
            $m['code_list2'] = $this->CodeSpecializedModel->get()->getResultArray();
            
            //배열 합치기
            $data['code_list'] = array_merge($m['code_list1'],$m['code_list2']);

            $this->setUseLayout(false); // 레이아웃은 view 에서 선택하기 위해 해당 기능 해제
            $this->setView("reviewInquiry",$data);
            return $this->run();
            //return view('welcome_message');
        }
    }
}
