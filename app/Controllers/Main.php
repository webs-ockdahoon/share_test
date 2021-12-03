<?php

namespace App\Controllers;

class Main extends BaseController
{
    protected $models = array('MrequestReviewinquiryModel');
    protected $viewPath = "main";

    public function index()
    {



        // 후기 내용
        $this->MrequestReviewinquiryModel->where("(mrr_deleted_at = null or mrr_deleted_at = '')"); // 삭제한 데이터는 제외
        $this->MrequestReviewinquiryModel->where("mrr_main_sort!=0"); // 미노출값 확인
        $this->MrequestReviewinquiryModel->where("mrr_main_sort!=''"); // 미노출값 확인
        $this->MrequestReviewinquiryModel->orderBy("mrr_main_sort","ASC"); // 정렬
        $data['mrr_list'] = $this->MrequestReviewinquiryModel->get()->getResultArray();

        $this->setUseLayout(false); // 레이아웃은 view 에서 선택하기 위해 해당 기능 해제
        $this->setView("main" , $data);
        return $this->run();
        //return view('welcome_message');
    }

}