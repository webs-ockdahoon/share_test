<?php

namespace App\Controllers\Master\log;
use App\Controllers\Master\MasterController;

class Manager extends MasterController
{
    protected $models = array('LogManagerModel');
    protected $viewPath = "log/manager";

    public function index()
    {
        /**
         * 검색 기능 구현 시작
         */
        if($this->sch_obj[1])$this->model->where("( lom_mem_id like '%".$this->sch_obj[1]."%' or mem_name like '%".$this->sch_obj[1]."%' )");
        if($this->sch_obj[2])$this->model->like("lom_created_ip",$this->sch_obj[2],'both');
        if($this->sch_obj[3])$this->model->where("lom_created_at>=",$this->sch_obj[3] . " 00:00:00");
        if($this->sch_obj[4])$this->model->where("lom_created_at<=",$this->sch_obj[4] . " 23:59:59");
        /* 검색 기능 구현 끝 */

        $this->model->join("webs_member as b", "lom_mem_id=mem_id", "left");

        // 엑셀 다운로드 메소드 호출
        if($this->isExcelDown){
            $this->excelExport();
        }

        $data = $this->model->getPager();
        $this->setView("list", $data);
        return $this->run();
    }

    private function excelExport(){

        alert("준비중입니다.");

        $result = $this->model->get()->getResultarray();
        $fileName = "관리자모드_이용로그";

        //-- 타이틀 생성
        $title = array(
            "사용자명",
            "사용자ID",
            "일시",
            "IP",
            "페이지 URL",
            "페이지 명",
            "유형",
            "Data",
        );

        if(!sizeof($result))alert("출력할 내용이 없습니다.");

        $data = array();
        foreach($result as $row){
            if($row["loa_method"]=="post")$row["loa_method"] = "저장";
            else if($row["loa_method"]=="get")$row["loa_method"] = "조회";

            $data[] = array(
                $row["mem_name"],
                $row["loa_created_id"],
                $row["loa_created_at"],
                $row["loa_created_ip"],
                $row["loa_url"],
                $row["loa_menu_name"],
                $row["loa_method"],
                $row["loa_data"],

            );
        }

        $width = array(
            "A"=>20,
            "B"=>20,
            "C"=>20,
            "D"=>20,
            "E"=>20,
            "F"=>20,
            "G"=>20,
            "H"=>20,
        );
        $option = array(
            "fileName"=>$fileName."_",
            "title"=>$title,
            "data"=>$data,
            "width"=>$width,
        );

        fnExcelDown($option); //-- common_helper
    }

}
