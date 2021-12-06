<?php

namespace App\Controllers;

class Main extends BaseController
{
    protected $models = array('ReviewModel','BoardConfModel','BoardDataModel','PartnerModel');
    protected $viewPath = "main";

    public function index()
    {
        $config = config(App::class);
        // 노출 게시판
        $bod_list = array('news');
        foreach($bod_list as $boc_code){
            if($config->defaultLocale!=$this->lang) {
                $boc_code = $boc_code.$this->lang;
            }
            $bd_info =  $this->BoardConfModel->getInfo($boc_code);
            $bd_info['article'] = $this->BoardDataModel->newArticle($boc_code,3);
            $data["bod_list"][$boc_code] = $bd_info;
        }

        // 협력업체 가져오기
        $this->PartnerModel->where("par_display_".$this->lang,'Y');
        $this->PartnerModel->orderBy("par_sort");
        $data['par_list'] = $this->PartnerModel->get()->getResultArray();


        // 후기 내용
        $this->ReviewModel->where("(rev_deleted_at = null or rev_deleted_at = '')"); // 삭제한 데이터는 제외
        $this->ReviewModel->where("rev_lang",$this->lang); // 사이트값 확인
        $this->ReviewModel->where("rev_main_sort>0"); // 미노출값 확인
        $this->ReviewModel->orderBy("rev_main_sort","ASC"); // 정렬
        $this->ReviewModel->select("webs_review.*,b.dep_title_".$this->lang . " as dep_title");
        $this->ReviewModel->join("webs_departments as b","webs_review.rev_dep_idx=b.dep_idx","left");
        $data['rev_list'] = $this->ReviewModel->get()->getResultArray();

        $this->setUseLayout(false); // 레이아웃은 view 에서 선택하기 위해 해당 기능 해제
        $this->setView("main" , $data);
        return $this->run();
        //return view('welcome_message');
    }

}