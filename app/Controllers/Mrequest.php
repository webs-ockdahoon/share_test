<?php

namespace App\Controllers;

class Mrequest extends BaseController
{
    protected $models = array('MrequestInquiryModel');
    protected $viewPath = "mrequest";

    public function inquiry()
    {

        if($this->method=="post"){  //-- 저장 처리
            $info = $this->getPost();

            if($this->model->edit($info))
            {
                $this->session->setFlashdata('messageFlag', 'edit');
                return redirect()->to($this->cont_url."/inquiry"."?".$_SERVER["QUERY_STRING"]);
            }
            else
            {
                //echo $this->model->getLastQuery();
                alert("오류가 발생하였습니다");
            }
        }

        $this->setUseLayout(false); // 레이아웃은 view 에서 선택하기 위해 해당 기능 해제
        $this->setView("inquiry");
        return $this->run();
        //return view('welcome_message');
    }

}