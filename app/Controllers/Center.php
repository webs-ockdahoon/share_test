<?php

namespace App\Controllers;

class Center extends BaseController
{
    protected $models = array('DepartmentsModel');
    protected $viewPath = "center";

    public function specializedCenter()
    {
        $data = array();
        $this->DepartmentsModel->where("dep_group='specializedcenter'");
        $this->DepartmentsModel->where("(dep_deleted_at is null or dep_deleted_at = '')"); // 삭제한 데이터는 제외
        $this->DepartmentsModel->where("dep_display_kor","Y"); // 화면 보이기/숨김
        $this->DepartmentsModel->orderBy("dep_title_kor","ASC"); // 화면 보이기/숨김
        $data['department_list'] = $this->DepartmentsModel->get()->getResultArray();

        $this->setUseLayout(false); // 레이아웃은 view 에서 선택하기 위해 해당 기능 해제
        $this->setView("departments", $data);
        return $this->run();
        //return view('welcome_message');
    }

    public function specializedInfo()
    {

        $data = array();
        if(!empty($_GET['title']))
        {
            $this->CodeSpecializedModel->where("csp_title",$_GET['title']);
            $this->CodeSpecializedModel->where("(csp_deleted_at = null or csp_deleted_at = '')"); // 삭제한 데이터는 제외
            $this->CodeSpecializedModel->where("csp_state","Y"); // 화면 보이기/숨김
            $data['code_list'] = $this->CodeSpecializedModel->get()->getRowArray();

            $this->MedicalSpecializedModel->where("mes_medical_type",$_GET['title']);
            $this->MedicalSpecializedModel->where("(mes_deleted_at = null or mes_deleted_at = '')"); // 삭제한 데이터는 제외
            $this->MedicalSpecializedModel->where("mes_state","Y"); // 화면 보이기/숨김
            $data['people_list'] = $this->MedicalSpecializedModel->get()->getResultArray();
        }
        else
        {
            echo "<script>alert('잘못된 접근 방식입니다.'); 
                location.href='/kor';</script>";
        }

        if(empty($data['code_list']))
        {
            echo "<script>alert('잘못된 접근 방식입니다.'); 
                location.href='/kor';</script>";
        }

        $this->setUseLayout(false); // 레이아웃은 view 에서 선택하기 위해 해당 기능 해제
        $this->setView("specializedInfo", $data);
        return $this->run();
        //return view('welcome_message');
    }

    public function specializedDoctors()
    {
        $data = array();
        $this->MedicalSpecializedModel->where("mes_medical_type",$_GET['title']);
        $this->MedicalSpecializedModel->where("(mes_deleted_at = null or mes_deleted_at = '')"); // 삭제한 데이터는 제외
        $this->MedicalSpecializedModel->where("mes_state","Y"); // 화면 보이기/숨김
        $data['people_list'] = $this->MedicalSpecializedModel->get()->getResultArray();

        if(empty($data['people_list']))
        {
            echo "<script>alert('잘못된 접근 방식입니다.'); 
                location.href='/kor';</script>";
        }

        $this->setUseLayout(false); // 레이아웃은 view 에서 선택하기 위해 해당 기능 해제
        $this->setView("specializedDoctors",$data);
        return $this->run();
        //return view('welcome_message');
    }

    public function centerDoctor()
    {

        $data = array();
        if(!empty($_GET['doctors'])) {
            $this->MedicalSpecializedModel->where("mes_idx", $_GET['doctors']);
            $this->MedicalSpecializedModel->where("(mes_deleted_at = null or mes_deleted_at = '')"); // 삭제한 데이터는 제외
            $this->MedicalSpecializedModel->where("mes_state", "Y"); // 화면 보이기/숨김
            $data['people_list'] = $this->MedicalSpecializedModel->get()->getRowArray();
        }
        else
        {
            echo "<script>alert('잘못된 접근 방식입니다.'); 
                location.href='/kor';</script>";
        }

        if(empty($data['people_list']))
        {
            echo "<script>alert('잘못된 접근 방식입니다.'); 
                location.href='/kor';</script>";
        }

        $this->setUseLayout(false); // 레이아웃은 view 에서 선택하기 위해 해당 기능 해제
        $this->setView("centerDoctor",$data);
        return $this->run();
        //return view('welcome_message');
    }
}