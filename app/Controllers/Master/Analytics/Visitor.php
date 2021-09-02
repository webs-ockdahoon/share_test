<?php

namespace App\Controllers\Master\Analytics;
use App\Controllers\Master\MasterController;

class Visitor extends MasterController
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

        $data = array(
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

        /*
		 * 검색 처리
		 */
        $s1 = $this->getGet("s1");
        $s2 = $this->getGet("s2");
        $s3 = $this->getGet("s3");

        if(!$s1 || !$s2){
            $s1 = $date11;
            $s2 = $date12;
        }

        if(!$s3)$s3="2";

        $data["s1"] = $s1;
        $data["s2"] = $s2;
        $data["s3"] = $s3;

        if($s3==1)$group = "substring(log_datetime,1,4)";			//-- 년간
        else if($s3==2)$group = "substring(log_datetime,1,7)";	//-- 월간
        else if($s3==3)$group = "DAYOFWEEK(log_datetime)";		//-- 주간
        else if($s3==4)$group = "substring(log_datetime,1,10)";	//-- 일간
        else if($s3==5)$group = "substring(log_datetime,12,2)";	//-- 시간

        /*
         * 모델없이 바로 처리 합니다.
         * */

        /* 방문자 */
        $this->model->select($group . " as logItem,count(log_idx) as logCount");
        $this->model->where("log_datetime>" , $s1 . " 00:00:00");
        $this->model->where("log_datetime<=" , $s2 . " 23:59:59");

        $result = $this->model->groupBy($group)->orderBy($group)->get();
        $log = array();

        foreach($result->getResultArray() as $rs){
            $logItem = $rs["logItem"];
            if($s3==3){
                /*
                switch($logItem){
                    case 1:$logItem="일";break;
                    case 2:$logItem="월";break;
                    case 3:$logItem="화";break;
                    case 4:$logItem="수";break;
                    case 5:$logItem="목";break;
                    case 6:$logItem="금";break;
                    case 7:$logItem="토";break;
                }
                */

                $logItem = convWeek($logItem-1);
            }

            $log[] = array(
                "logItem"=>$logItem,
                "logCount"=>$rs["logCount"],
            );
        }
        $data["logList1"] = $log;

        switch($s3){
            case 1:$dateField = "년도";break;
            case 2:$dateField = "월";break;
            case 3:$dateField = "요일";break;
            case 4:$dateField = "일자";break;
            case 5:$dateField = "시간";break;
        }
        $data["dateField"] = $dateField;

        /* 유입사이트 */
        $group = "SUBSTRING_INDEX(replace(replace(replace(log_refer,'https://',''),'http://',''),'www.',''),'/',1)";
        $this->model->select($group . " as logItem,count(log_idx) as logCount");
        $this->model->where("log_datetime>" , $s1 . " 00:00:00");
        $this->model->where("log_datetime<=" , $s2 . " 23:59:59");

        $result = $this->model->groupBy($group)->orderBy("2 desc")->get();
        $log = array();
        $totCount = 0;
        foreach($result->getResultArray() as $rs)$totCount+=$rs["logCount"];
        foreach($result->getResultArray() as $key => $rs){

            $logItem = $rs["logItem"];
            if(!$logItem)$logItem = "직접 접속";
            if($key>=$itemMax){
                $log[$itemMax] = array(
                    "logItem"=>"기타",
                    "logCount"=>$log[$itemMax]["logCount"]+$rs["logCount"],
                    "LogRatio"=>number_format(($log[$itemMax]["logCount"]+$rs["logCount"])/$totCount*100,1),
                );
            }else{
                $log[] = array(
                    "logItem"=>$logItem,
                    "logCount"=>$rs["logCount"],
                    "LogRatio"=>number_format($rs["logCount"]/$totCount*100,1),
                );
            }
        }
        $data["logList2"] = $log;

        /* 검색어 추출 */
        $group = "log_keyword";
        $this->model->select($group . " as logItem,count(log_idx) as logCount");
        $this->model->where("log_datetime>" , $s1 . " 00:00:00");
        $this->model->where("log_datetime<=" , $s2 . " 23:59:59");
        $this->model->where($group."<>''");
        $this->model->where($group." is not null");

        $result =  $this->model->groupBy($group)->orderBy("2 desc")->get();
        $log = array();
        $totCount = $itemCount = 0;
        foreach($result->getResultArray() as $rs)$totCount+=$rs["logCount"];
        foreach($result->getResultArray() as $key => $rs){
            $logItem = $rs["logItem"];
            if($key>=$itemMax){
                $log[$itemMax] = array(
                    "logItem"=>"기타",
                    "logCount"=>$log[$itemMax]["logCount"]+$rs["logCount"],
                    "LogRatio"=>number_format(($log[$itemMax]["logCount"]+$rs["logCount"])/$totCount*100,1),
                );

            }else{
                $log[] = array(
                    "logItem"=>$logItem,
                    "logCount"=>$rs["logCount"],
                    "LogRatio"=>number_format($rs["logCount"]/$totCount*100,1),
                );
            }
        }
        $data["logList3"] = $log;

        /* 브라우저 환경 */
        $group = "CONCAT(log_browser,' ',SUBSTRING_INDEX(log_browser_ver,'.',2))";
        $this->model->select($group . " as logItem,count(log_idx) as logCount");
        $this->model->where("log_datetime>" , $s1 . " 00:00:00");
        $this->model->where("log_datetime<=" , $s2 . " 23:59:59");

        $result = $this->model->groupBy($group)->orderBy("2 desc")->get();
        $totCount = $itemCount = 0;
        $log = array();
        foreach($result->getResultArray() as $rs)$totCount+=$rs["logCount"];
        foreach($result->getResultArray() as $rs){
            $logItem = $rs["logItem"];
            if(!trim($logItem))$logItem="Unknown";

            if($itemCount<$itemMax){
                $log[] = array(
                    "logItem"=>$logItem,
                    "logCount"=>$rs["logCount"],
                    "LogRatio"=>number_format($rs["logCount"]/$totCount*100,1),
                );
            }else{
                $log[$itemMax] = array(
                    "logItem"=>"기타",
                    "logCount"=>$log[$itemMax]["logCount"]+$rs["logCount"],
                    "LogRatio"=>number_format(($log[$itemMax]["logCount"]+$rs["logCount"])/$totCount*100,1),
                );
            }
            $itemCount++;
        }
        $data["logList4"] = $log;

        /* 운영체제 */
        $group = "log_platform";
        $this->model->select($group . " as logItem,count(log_idx) as logCount");
        $this->model->where("log_datetime>" , $s1 . " 00:00:00");
        $this->model->where("log_datetime<=" , $s2 . " 23:59:59");
        $this->model->where("log_is_robot=0");

        $result = $this->model->groupBy($group)->orderBy("2 desc")->get();
        $log = array();
        $totCount = $itemCount = 0;
        foreach($result->getResultArray() as $rs)$totCount+=$rs["logCount"];
        foreach($result->getResultArray() as $rs){
            $log[] = array(
                "logItem"=>$rs["logItem"],
                "logCount"=>$rs["logCount"],
                "LogRatio"=>number_format($rs["logCount"]/$totCount*100,1),
            );
        }
        $data["logList5"] = $log;

        /* PC/모바일 */
        $group = "log_is_mobile";
        $this->model->select($group . " as logItem,count(log_idx) as logCount");
        $this->model->where("log_datetime>" , $s1 . " 00:00:00");
        $this->model->where("log_datetime<=" , $s2 . " 23:59:59");
        $this->model->where("log_is_robot=0");

        $result = $this->model->groupBy($group)->orderBy("2 desc")->get();
        $log = array();
        $totCount = $itemCount = 0;
        foreach($result->getResultArray() as $rs)$totCount+=$rs["logCount"];
        foreach($result->getResultArray() as $rs){
            if($rs["logItem"])$logItem = "MOBILE";
            else $logItem = "PC";

            $log[] = array(
                "logItem"=>$logItem,
                "logCount"=>$rs["logCount"],
                "LogRatio"=>number_format($rs["logCount"]/$totCount*100,1),
            );
        }
        $data["logList6"] = $log;

        /* 해상도 */
        $group = "CONCAT(log_screenW,'X',log_screenH)";
        $this->model->select($group . " as logItem,count(log_idx) as logCount");
        $this->model->where("log_datetime>" , $s1 . " 00:00:00");
        $this->model->where("log_datetime<=" , $s2 . " 23:59:59");
        $this->model->where("Log_is_robot=0");
        $result = $this->model->groupBy($group)->orderBy("2 desc")->get();
        $log = array();
        $totCount = $itemCount = 0;
        foreach($result->getResultArray() as $rs)$totCount+=$rs["logCount"];
        foreach($result->getResultArray() as $rs){
            $logItem = $rs["logItem"];
            if($logItem=="0X0")$logItem="Unknown";

            if($itemCount<$itemMax){
                $log[] = array(
                    "logItem"=>$logItem,
                    "logCount"=>$rs["logCount"],
                    "LogRatio"=>number_format($rs["logCount"]/$totCount*100,1),
                );
            }else{
                $log[$itemMax] = array(
                    "logItem"=>"기타",
                    "logCount"=>$log[$itemMax]["logCount"]+$rs["logCount"],
                    "LogRatio"=>number_format(($log[$itemMax]["logCount"]+$rs["logCount"])/$totCount*100,1),
                );
            }
            $itemCount++;


        }
        $data["logList7"] = $log;


        $template = "{lopp} '['{logItem}']' , {logCount} {/lopp}";
        // Javascript Data 용 문자열 만들기
        for($k=1;$k<=7;$k++){
            $data["logData".$k] = "[";
            foreach($data["logList".$k] as $log){
                if(!$log["logCount"])$log["logCount"]=0;
                $data["logData".$k].="['" . $log["logItem"] . "'," . $log["logCount"] . "],";
            }
            $data["logData".$k].= "]";

            //$data["logData".$k]= $this->parser->setData()->renderString($template);
        }


        $this->setView("visitor",$data);
        return $this->run();
    }


}
