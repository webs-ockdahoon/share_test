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
        $this->HospitalHistoryModel->where("(hoh_deleted_at = null or hoh_deleted_at = '')"); // 삭제한 데이터는 제외
        $this->HospitalHistoryModel->where("hoh_state", "Y"); // 화면 보이기/숨김
        $this->HospitalHistoryModel->orderBy("hoh_year", "desc"); // 정렬순서
        $data['history_list'] = $this->HospitalHistoryModel->get()->getResultArray();

        $this->HospitalHistoryModel->where("(hoh_deleted_at = null or hoh_deleted_at = '')"); // 삭제한 데이터는 제외
        $this->HospitalHistoryModel->where("hoh_state", "Y"); // 화면 보이기/숨김
        $this->HospitalHistoryModel->groupBy("hoh_position"); // 정렬순서
        $this->HospitalHistoryModel->orderBy("hoh_position", "desc"); // 정렬순서
        $data['code_list'] = $this->HospitalHistoryModel->get()->getResultArray();

//        $i = 0;
//        $txt = "";
//        foreach($data['history_list'] as $key => $val){
//            foreach($val as $vkey => $vval) {
//                if ($vkey['hoh_position'] != $txt) {
//                    $data['title'] = $vkey['hoh_position'];
//                    $txt = $vkey['hoh_position'];
//                    $data['title'][$i] = $val;
//                } else {
//                    $data['title'][$i] = $val;
//                }
//                $i = $i + 1;
//            }
//        }

        //print_r($data['title']);
//        exit;


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