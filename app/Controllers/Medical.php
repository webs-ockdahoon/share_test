<?php

namespace App\Controllers;

class Medical extends BaseController
{
    protected $models = array('DepartmentsModel','DepartmentsDoctorModel');
    protected $viewPath = "medical";
    protected $dep_group = 'treatment';

    public function __construct(){
        parent::__construct();

    }

    private function get_department(){
        $this->DepartmentsModel->where("dep_group",$this->dep_group);
        $this->DepartmentsModel->where("(dep_deleted_at is null or dep_deleted_at = '')"); // 삭제한 데이터는 제외
        $this->DepartmentsModel->where("dep_display_kor","Y"); // 화면 보이기/숨김
        $this->DepartmentsModel->orderBy("dep_title_kor","ASC"); // 화면 보이기/숨김
        return $this->DepartmentsModel->get()->getResultArray();
    }

    private function add_department_menu($dep_idx=""){

        // 현재 메뉴위치 강제 셋팅하기 ※ 어쩌다보니 viewPath 를 구분 코드로 사용
        $this->activeMenuUrl = '/' . $this->viewPath . '/departmentInfo/'.$dep_idx;
        $config = config(App::class);
        if($config->defaultLocale!=$this->lang) {
            $this->activeMenuUrl = '/' . $this->lang . $this->activeMenuUrl;
        }

        // 3차 메뉴 셋팅하기
        $department_list = $this->get_department();
        foreach($department_list as $key=>$dep){
            $key_num = str_pad($key+1,2,"0",STR_PAD_LEFT);
            $url = '/'.$this->viewPath.'/departmentInfo/' . $dep['dep_idx'];    // 언어에 따른 URL 추가 변환 처리
            if($config->defaultLocale!=$this->lang)$url = '/' . $this->lang . $url;
            $this->extend_menu['02']['sub']['01']['sub'][$key_num] = array(
                'mnu_code' => '0201' . $key_num . '0000',
                'mnu_title' => $dep['dep_title_' . $this->lang],
                'mnu_sub_title' => '',
                'mnu_url_type' => 'direct',
                'mnu_url' => $url,
            );
        }
        //print_r($this->extend_menu);
        //echo "Set Extend Menu";
    }


    public function department()
    {
        $data = array();
        $data['department_list'] = $this->get_department();

        $this->setUseLayout(false); // 레이아웃은 view 에서 선택하기 위해 해당 기능 해제
        $this->setView("department_list", $data);
        return $this->run();
        //return view('welcome_message');
    }

    public function departmentInfo($dep_idx)
    {
        $this->add_department_menu($dep_idx);
        $this->DepartmentsModel->where("dep_group",$this->dep_group);
        $this->DepartmentsModel->where("dep_idx",$dep_idx);
        $this->DepartmentsModel->where("(dep_deleted_at is null or dep_deleted_at = '')"); // 삭제한 데이터는 제외
        $this->DepartmentsModel->where("dep_display_".$this->lang,"Y"); // 화면 보이기/숨김
        if(!$data = $this->DepartmentsModel->get()->getRowArray()){
            alert("잘못된 접근입니다.");
        }


        $this->setUseLayout(false); // 레이아웃은 view 에서 선택하기 위해 해당 기능 해제
        $this->setView("department_info",$data);
        return $this->run();
        //return view('welcome_message');
    }

    public function doctor($dep_idx)
    {
        $this->add_department_menu($dep_idx);
        $data = array();
        // 부서 정보 확인
        $this->DepartmentsModel->where("dep_group",$this->dep_group);
        $this->DepartmentsModel->where("dep_idx",$dep_idx);
        $this->DepartmentsModel->where("(dep_deleted_at is null or dep_deleted_at = '')"); // 삭제한 데이터는 제외
        $this->DepartmentsModel->where("dep_display_".$this->lang,"Y"); // 화면 보이기/숨김
        if(!$data['department_info'] = $this->DepartmentsModel->get()->getRowArray()){
            alert("잘못된 접근입니다.");
        }

        $data['dep_idx'] = $dep_idx;

        // 의료진 리스트 가져오기
        $this->DepartmentsDoctorModel->where("doc_dep_group",$this->dep_group);
        $this->DepartmentsDoctorModel->where("doc_dep_idx",$dep_idx);
        $this->DepartmentsDoctorModel->where("(doc_deleted_at is null or doc_deleted_at = '')"); // 삭제한 데이터는 제외
        $this->DepartmentsDoctorModel->where("doc_display_".$this->lang,"Y"); // 화면 보이기/숨김
        $data['doctor_list'] = $this->DepartmentsDoctorModel->get()->getResultArray();


        $this->setUseLayout(false); // 레이아웃은 view 에서 선택하기 위해 해당 기능 해제
        $this->setView("doctor_list", $data);
        return $this->run();
        //return view('welcome_message');
    }

    public function doctorInfo($doc_idx)
    {

        $data = array();
        $this->DepartmentsDoctorModel->where("doc_idx", $doc_idx);
        $this->DepartmentsDoctorModel->where("(doc_deleted_at is null or doc_deleted_at = '')"); // 삭제한 데이터는 제외
        $this->DepartmentsDoctorModel->where("doc_display_".$this->lang, "Y"); // 화면 보이기/숨김
        if(!$data = $this->DepartmentsDoctorModel->get()->getRowArray()){
            alert("잘못된 접근입니다.");
        }

        $this->add_department_menu($data['doc_dep_idx']);

        // 부서 정보 확인
        $this->DepartmentsModel->where("dep_group",$this->dep_group);
        $this->DepartmentsModel->where("dep_idx",$data['doc_dep_idx']);
        $this->DepartmentsModel->where("(dep_deleted_at is null or dep_deleted_at = '')"); // 삭제한 데이터는 제외
        $this->DepartmentsModel->where("dep_display_".$this->lang,"Y"); // 화면 보이기/숨김
        if(!$data['department_info'] = $this->DepartmentsModel->get()->getRowArray()){
            alert("잘못된 접근입니다.");
        }

        // 상세정보 json_decode
        if($data['doc_info_kor']){
            $data['doc_info_kor'] = json_decode($data['doc_info_kor'],true);
        }
        if($data['doc_info_rus']){
            $data['doc_info_rus'] = json_decode($data['doc_info_rus'],true);
        }

        // 값이 없거나 json_decode 실패시 강제로 빈값 처리
        if(!$data['doc_info_kor'])$data['doc_info_kor'] = '';
        if(!$data['doc_info_rus'])$data['doc_info_rus'] = '';



        $this->setUseLayout(false); // 레이아웃은 view 에서 선택하기 위해 해당 기능 해제
        $this->setView("doctor_info", $data);
        return $this->run();
        //return view('welcome_message');
    }
}