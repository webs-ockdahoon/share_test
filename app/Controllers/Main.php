<?php

namespace App\Controllers;

class Main extends BaseController
{
    protected $models = array('CodeDepartmentsModel');
    protected $viewPath = "main";

    public function index()
    {
        // 병원 진료과목
        $this->CodeDepartmentsModel->where("(cde_deleted_at = null or cde_deleted_at = '')"); // 삭제한 데이터는 제외
        $this->CodeDepartmentsModel->where("cde_state","Y"); // 화면 보이기/숨김
        $this->CodeDepartmentsModel->where("cde_sort!=0"); // 화면 보이기/숨김
        $this->CodeDepartmentsModel->orderBy("cde_sort","ASC"); // 과 제목
        $data['code_list'] = $this->CodeDepartmentsModel->get()->getResultArray();


        // 병원 의료진 소개
        $this->CodeDepartmentsModel->where("(cde_deleted_at = null or cde_deleted_at = '')"); // 삭제한 데이터는 제외
        $this->CodeDepartmentsModel->where("cde_state","Y"); // 화면 보이기/숨김
        $this->CodeDepartmentsModel->where("cde_sort!=0"); // 화면 보이기/숨김
        $this->CodeDepartmentsModel->orderBy("cde_sort","ASC"); // 과 제목
        $data['doctor_list'] = $this->CodeDepartmentsModel->get()->getResultArray();

        $this->setUseLayout(false); // 레이아웃은 view 에서 선택하기 위해 해당 기능 해제
        $this->setView("main" , $data);
        return $this->run();
        //return view('welcome_message');
    }

}