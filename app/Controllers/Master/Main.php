<?php

namespace App\Controllers\Master;

class Main extends MasterController
{
    protected $viewPath = "main";
    protected $models = array("LogAccessModel","InquiryModel","ReviewModel");

	public function index()
	{
	    $this->InquiryModel->where("inq_deleted_at is null");
	    $this->InquiryModel->where("inq_state",1);
	    $this->InquiryModel->select("count(inq_idx) as cnt");
	    $cnt = $this->InquiryModel->get()->getRowArray();
        $data['inq_count_1'] = $cnt['cnt'];

        $this->InquiryModel->where("inq_deleted_at is null");
        $this->InquiryModel->where("inq_state",10);
        $this->InquiryModel->select("count(inq_idx) as cnt");
        $cnt = $this->InquiryModel->get()->getRowArray();
        $data['inq_count_10'] = $cnt['cnt'];

        // 이번주 시작 일요일 날짜 구하기
        $week_first = date("Y-m-d",strtotime("-".date("w")."days"));

        $this->ReviewModel->where("rev_deleted_at is null");
        $this->ReviewModel->where("rev_created_at>=",$week_first);
        $this->ReviewModel->select("count(rev_idx) as cnt");
        $cnt = $this->ReviewModel->get()->getRowArray();
        $data['week_rev_count'] = $cnt['cnt'];

        $this->LogAccessModel->where("log_datetime>=",$week_first);
        $this->LogAccessModel->select("count(log_idx) as cnt");
        $cnt = $this->LogAccessModel->get()->getRowArray();
        $data['week_log_count'] = $cnt['cnt'];


        //----------------------------------------------------------------------------

        //-- 일주일 날자값 구하기
        $dateList = array();
        for($k=6;$k>=0;$k--){
            $dateList[] = strtotime("-".$k." days");
        }
        $data["dateList"] = $dateList;

        //-- 일주일간 접속자 수 구하기
        $this->LogAccessModel->where(" log_datetime >='" . date("Y-m-d",$dateList[0]) . " 00:00:00' and log_datetime<='" . date("Y-m-d",$dateList[6]). " 23:59:59' ");
        //$this->db->where("LOGisMobile",1);
        $this->LogAccessModel->groupBy("substring(log_datetime,1,10)");
        $this->LogAccessModel->groupBy("log_is_mobile");
        $this->LogAccessModel->select("substring(log_datetime,1,10) as LOGdate,count(log_idx) as LOGcount,log_is_mobile");
        $result = $this->LogAccessModel->get()->getResultArray();
        $log = array();
        $logData = array();
        foreach($result as $rs){
            $log[$rs["LOGdate"]][$rs["log_is_mobile"]] = $rs["LOGcount"];
        }

        //-- 배열 재정리
        foreach($dateList as $key=>$dt){
            if(!isset($log[date("Y-m-d", $dt)][0]))$log[date("Y-m-d", $dt)][0]=0;
            if(!isset($log[date("Y-m-d", $dt)][1]))$log[date("Y-m-d", $dt)][1]=0;
            $logData[$key] = $log[date("Y-m-d", $dt)];
        }

        $data["logData"] = $logData;


        //-- 일주일간 문의 수 구하기
        $this->InquiryModel->where(" inq_deleted_at is null ");
        $this->InquiryModel->where(" inq_created_at >='" . date("Y-m-d",$dateList[0]) . " 00:00:00' and inq_created_at<='" . date("Y-m-d",$dateList[6]). " 23:59:59' ");
        $this->InquiryModel->groupBy("substring(inq_created_at,1,10)");
        $this->InquiryModel->select("substring(inq_created_at,1,10) as inq_date,count(inq_idx) as inq_count");
        $result = $this->InquiryModel->get()->getResultArray();
        $log = array();
        $logData = array();
        foreach($result as $rs){
            $log[$rs["inq_date"]] = $rs["inq_count"];
        }

        //-- 배열 재정리
        foreach($dateList as $key=>$dt){
            if(!isset($log[date("Y-m-d", $dt)]))$log[date("Y-m-d", $dt)]=0;
            $logData[$key] = $log[date("Y-m-d", $dt)];
        }

        $data["inqData"] = $logData;

	    $this->setView("main",$data);
	    return $this->run();
		//return view('welcome_message');
	}

    /*************************************************************
     * 모든 테이블, 필드 character set 형식 통일시키기
     *************************************************************/
	public function set_table_type(){
	    if(!isDev())exit();
        $db = db_connect();
	    $sql = "show tables";
	    $result = $db->query($sql)->getResultArray();
	    foreach($result as $rs){
	        $key = array_keys($rs);
	        $tbl = $rs[$key[0]];

            $sql = "alter table " . $tbl . " convert to character set utf8mb4 COLLATE  utf8mb4_unicode_ci;";
            $db->query($sql);
            $sql = "alter table " . $tbl . " character set = 'utf8mb4' collate = 'utf8mb4_unicode_ci';";
            $db->query($sql);
        }
	    
	    echo "OK";
    }
}
