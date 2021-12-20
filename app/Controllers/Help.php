<?php

namespace App\Controllers;

class Help extends BaseController
{
    protected $viewPath = "help";
    protected $models = array('TermsModel');

    public function privacy()
    {
        $data = $this->getTerms("personal_policy");

        $this->setUseLayout(false); // 레이아웃은 view 에서 선택하기 위해 해당 기능 해제
        $this->setView("privacy",$data);
        return $this->run();
    }


    private function getTerms($group){

        $terms_idx = $this->getGet('terms');

        $data = array();
        $this->TermsModel->where("terms_group",$group);
        $this->TermsModel->orderBy("terms_start_date","desc");
        $result = $this->TermsModel->get()->getResultArray();

        $terms_list = array();
        $terms_first = 0;
        foreach($result as $rs) {
            $terms_list[$rs["terms_idx"]] = $rs;
            if(!$terms_first)$terms_first=$rs["terms_idx"];
        }
        $data["terms_list"] = $terms_list;
        if(!isset($data["terms_list"][$terms_idx]))$terms_idx = $terms_first;

        $data["terms_content"] = $data["terms_list"][$terms_idx]["terms_content_".$this->lang];

        $data["terms_idx"] = $terms_idx;

        return $data;
    }

}