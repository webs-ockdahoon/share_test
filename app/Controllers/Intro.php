<?php

namespace App\Controllers;

class Intro extends BaseController
{
    protected $models = array('HospitalHistoryModel');
    protected $viewPath = "intro";

    public function greeting()
    {
        $this->setUseLayout(false); // 레이아웃은 view 에서 선택하기 위해 해당 기능 해제
        $this->setView("greeting");
        return $this->run();
        //return view('welcome_message');
    }

    public function purpose()
    {
        $this->setUseLayout(false); // 레이아웃은 view 에서 선택하기 위해 해당 기능 해제
        $this->setView("purpose");
        return $this->run();
        //return view('welcome_message');
    }

    public function vision()
    {
        $this->setUseLayout(false); // 레이아웃은 view 에서 선택하기 위해 해당 기능 해제
        $this->setView("vision");
        return $this->run();
        //return view('welcome_message');
    }

    public function history()
    {
        $data = array();
        $this->HospitalHistoryModel->where("(hoh_deleted_at is null or hoh_deleted_at = '')"); // 삭제한 데이터는 제외
        $this->HospitalHistoryModel->where("hoh_state", "Y"); // 화면 보이기/숨김
        $this->HospitalHistoryModel->orderBy("hoh_year", "desc"); // 정렬순서
        $history = $this->HospitalHistoryModel->get()->getResultArray();

        // 년도별 그룹처리 ( 시작년도만 표기 )
        $group = array(
            2000,1990,1985
        );

        $history_list = array();
        foreach($history as $his){
            foreach($group as $grp){
                if($grp<=$his['hoh_year']){
                    // 필요한 데이터만 사용
                    $history_list[$grp][] = array(
                        'year'=>$his['hoh_year'],
                        'history'=>json_decode($his['hoh_history'],true),
                    );
                    break;
                }
            }
        }

        $data['group'] = $group;
        $data['history'] = $history_list;


        $this->setUseLayout(false); // 레이아웃은 view 에서 선택하기 위해 해당 기능 해제
        $this->setView("history", $data);
        return $this->run();
        //return view('welcome_message');
    }

    public function imc()
    {
        $this->setUseLayout(false); // 레이아웃은 view 에서 선택하기 위해 해당 기능 해제
        $this->setView("imc");
        return $this->run();
        //return view('welcome_message');
    }

    public function imcGreeting()
    {
        $this->setUseLayout(false); // 레이아웃은 view 에서 선택하기 위해 해당 기능 해제
        $this->setView("imcGreeting");
        return $this->run();
        //return view('welcome_message');
    }

    public function imcOrganization()
    {
        $this->setUseLayout(false); // 레이아웃은 view 에서 선택하기 위해 해당 기능 해제
        $this->setView("imcOrganization");
        return $this->run();
        //return view('welcome_message');
    }

    public function imcProcess()
    {
        $this->setUseLayout(false); // 레이아웃은 view 에서 선택하기 위해 해당 기능 해제
        $this->setView("imcProcess");
        return $this->run();
        //return view('welcome_message');
    }


}