<?php

namespace App\Controllers;

class Main extends BaseController
{
    protected $models = array('ReviewModel','BoardConfModel','BoardDataModel','PartnerModel','DepartmentsModel','BannerModel','PopupModel');
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

        // 진료부서 메인 노출 항목 가져오기
        $this->DepartmentsModel->select("dep_idx,dep_group,dep_title_" . $this->lang . " as dep_title,dep_image");
        $this->DepartmentsModel->orderBy("dep_main_display_".$this->lang);
        $this->DepartmentsModel->where("dep_main_display_".$this->lang.">0");
        $data['main_dep_list'] = $this->DepartmentsModel->get()->getResultArray();

        // 배너 가저오기
        $this->BannerModel->where("ban_lang in ('all','".$this->lang."')");
        $this->BannerModel->orderBy("ban_sort");
        $data['slider_list'] = $this->BannerModel->get()->getResultArray();

        // 팝업
        $this->PopupModel->where("pop_date_start <= ",date('Y-m-d H:i', time()));
        $this->PopupModel->where("pop_date_end >= ",date('Y-m-d H:i', time()));
        $this->PopupModel->where("(pop_deleted_at is null or pop_deleted_at = '')"); // 삭제한 데이터는 제외
        $this->PopupModel->where("pop_display in ('all','".$this->lang."')"); // 화면 보이기/숨김
        $data['pop_list'] = $this->PopupModel->get()->getResultArray(); // 모든 데이터 추출

        $this->setUseLayout(false); // 레이아웃은 view 에서 선택하기 위해 해당 기능 해제
        $this->setView("main" , $data);
        return $this->run();
        //return view('welcome_message');
    }

}