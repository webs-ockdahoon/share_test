<?php

namespace App\Controllers;

class Medical extends BaseController
{
    protected $models = array('DepartmentsModel');
    protected $viewPath = "medical";

    public function departments()
    {
        $data = array();
        $this->DepartmentsModel->where("dep_group='treatment'");
        $this->DepartmentsModel->where("(dep_deleted_at is null or dep_deleted_at = '')"); // 삭제한 데이터는 제외
        $this->DepartmentsModel->where("dep_display_kor","Y"); // 화면 보이기/숨김
        $this->DepartmentsModel->orderBy("dep_title_kor","ASC"); // 화면 보이기/숨김
        $data['department_list'] = $this->DepartmentsModel->get()->getResultArray();

        $this->setUseLayout(false); // 레이아웃은 view 에서 선택하기 위해 해당 기능 해제
        $this->setView("departments", $data);
        return $this->run();
        //return view('welcome_message');
    }

    public function departmentInfo()
    {
        $data = array();
        if(!empty($_GET['title']))
        {
            $this->CodeDepartmentsModel->where("cde_title",$_GET['title']);
            $this->CodeDepartmentsModel->where("(cde_deleted_at = null or cde_deleted_at = '')"); // 삭제한 데이터는 제외
            $this->CodeDepartmentsModel->where("cde_state","Y"); // 화면 보이기/숨김
            $data['code_list'] = $this->CodeDepartmentsModel->get()->getRowArray();

            $this->MedicalDepartmentsModel->where("med_medical_type",$_GET['title']);
            $this->MedicalDepartmentsModel->where("(med_deleted_at = null or med_deleted_at = '')"); // 삭제한 데이터는 제외
            $this->MedicalDepartmentsModel->where("med_state","Y"); // 화면 보이기/숨김
            $data['people_list'] = $this->MedicalDepartmentsModel->get()->getResultArray();
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
        $this->setView("departmentInfo",$data);
        return $this->run();
        //return view('welcome_message');
    }

    public function departmentDoctors()
    {
        $data = array();
        $this->MedicalDepartmentsModel->where("med_medical_type",$_GET['title']);
        $this->MedicalDepartmentsModel->where("(med_deleted_at = null or med_deleted_at = '')"); // 삭제한 데이터는 제외
        $this->MedicalDepartmentsModel->where("med_state","Y"); // 화면 보이기/숨김
        $data['people_list'] = $this->MedicalDepartmentsModel->get()->getResultArray();

        if(empty($data['people_list']))
        {
            echo "<script>alert('잘못된 접근 방식입니다.'); 
                location.href='/kor';</script>";
        }

        $this->setUseLayout(false); // 레이아웃은 view 에서 선택하기 위해 해당 기능 해제
        $this->setView("departmentDoctors", $data);
        return $this->run();
        //return view('welcome_message');
    }

    public function doctor()
    {

        $data = array();
        if(!empty($_GET['doctors'])) {
            $this->MedicalDepartmentsModel->where("med_idx", $_GET['doctors']);
            $this->MedicalDepartmentsModel->where("(med_deleted_at = null or med_deleted_at = '')"); // 삭제한 데이터는 제외
            $this->MedicalDepartmentsModel->where("med_state", "Y"); // 화면 보이기/숨김
            $data['people_list'] = $this->MedicalDepartmentsModel->get()->getRowArray();
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
        $this->setView("doctor", $data);
        return $this->run();
        //return view('welcome_message');
    }
}