<?php

namespace App\Controllers\Master\Analytics;
use App\Controllers\Master\MasterController;

class VisitorList extends MasterController
{
    protected $models = array('LogAccessModel');
    protected $viewPath = "analytics/visitor";

    public function index()
    {
        /*
		 * 기본 날짜 구하기
		 */

        $itemMax = 15;//-- 최대 항목 수(이상은 '기타'로 처리 / 날짜별 통계 제외)

        //-- 이번주 구하기
        $date11 = date("Y-m-d",strtotime("-" . date("w") . " days"));
        $date12 = date("Y-m-d",strtotime("+6 days",strtotime($date11)));

        //-- 지난주 구하기
        $date21 = date("Y-m-d",strtotime("-" . (date("w")+7) . " days"));
        $date22 = date("Y-m-d",strtotime("+6 days",strtotime($date21)));

        // 이번달 1일
        $date31 = date("Y-m-d", strtotime(date("Y-m-01")));
        //-- 이번달 마지막일
        $date32 = date("Y-m-d", strtotime("+1 month",strtotime(date("Y-m-01")))-1);

        // 지난달 마지막일
        $date42 = date("Y-m-d", strtotime(date("Y-m-01"))-1);
        // 지난달 1일
        $date41 = date("Y-m-d", strtotime(date("Y-m-01",strtotime($date42))));

        //-- 올해
        $date51 = date("Y-01-01");
        $date52 = date("Y-12-31");

        $date = array(
            "date11"=>$date11,
            "date12"=>$date12,
            "date21"=>$date21,
            "date22"=>$date22,
            "date31"=>$date31,
            "date32"=>$date32,
            "date41"=>$date41,
            "date42"=>$date42,
            "date51"=>$date51,
            "date52"=>$date52,
        );

        $s1 = $this->getGet("s1");
        $s2 = $this->getGet("s2");
        if(!$s1 || !$s2){
            $s1 = $date11;
            $s2 = $date12;
        }

        /**
         * 검색 기능 구현 시작
         */
        if($this->sch_obj[1])$this->model->where("log_datetime>",$this->sch_obj[1]);
        if($this->sch_obj[2])$this->model->where("log_datetime<=",$this->sch_obj[2]);
        /* 검색 기능 구현 끝 */

        $data = $this->model->getPager();

        $data = array_merge($data,$date);

        $data["s1"] = $s1;
        $data["s2"] = $s2;

        foreach($data["list"] as $key=>$row){
            $env = "PC";
            if($row["log_is_mobile"])$env = "Mobile";
            else if($row["log_is_robot"])$env = "Robot";
            $data["list"][$key]["log_env"] = $env;
        }


        $this->setView("visitorList",$data);
        return $this->run();
    }


}
