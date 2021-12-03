<?php

namespace App\Controllers\Master\Medical;
use App\Controllers\Master\MasterController;
use App\Libraries\Uploader;

class TreatmentDoctor extends MasterController
{
    protected $models = array('DepartmentsDoctorModel','DepartmentsModel',);
    protected $viewPath = "medical/doctor";
    protected $doc_dep_group = "treatment";
    protected $doc_dep_group_title = "진료과";

    public function index()
    {
        /**
         * 검색 기능 구현 시작
         */
        $this->model->where("doc_dep_group",$this->doc_dep_group);
        if($this->sch_obj[1])$this->model->like("doc_name_kor",$this->sch_obj[1],'both'); // 이름
        if($this->sch_obj[2])$this->model->where("doc_dep_idx",$this->sch_obj[2]); // 과
        /* 검색 기능 구현 끝 */

        $this->model->join("webs_departments as b","webs_departments_doctor.doc_dep_idx=b.dep_idx","left");
        $data = $this->model->getPager();

        $this->DepartmentsModel->where("(dep_deleted_at is null or dep_deleted_at = '')"); // 삭제한 데이터는 제외
        $this->DepartmentsModel->where("dep_group",$this->doc_dep_group); // 해당 그룹의 부서만 가져오기
        $this->DepartmentsModel->where(" ( dep_display_kor='Y' or dep_display_rus='Y' )"); // 화면 보이기/숨김
        $this->DepartmentsModel->orderBy("dep_title_kor","ASC"); // 과 제목
        $data['department_list'] = $this->DepartmentsModel->get()->getResultArray();

        $data['group_title'] = $this->doc_dep_group_title;

        $this->setView("list",$data);
        return $this->run();
    }

    public function edit($idx=""){

        $validate = $this->validate([
            'doc_name_kor' => [
                'rules'=>'required',
                'errors'=> ['required'=>'국문이름을 입력해 주세요.'],
            ],

        ]);

        if(!$validate) {    //-- Form 출력
            // 데이터 불러오기
            if($idx){
                $this->model->where("doc_dep_group",$this->doc_dep_group);
                if(!$data = $this->model->find($idx))alert("데이터를 찾을 수 없습니다.");
            }
            else foreach($this->model->getAllowedFields() as $key=>$f)$data[$f]="";

            $data["idx"] = $idx;

            if($this->method=="post")$data["validate_error_msg"] = $this->makeErrorMessage($this->validator->getErrors());
            else $data["validate_error_msg"] = "";

            $this->DepartmentsModel->where("(dep_deleted_at is null or dep_deleted_at = '')"); // 삭제한 데이터는 제외
            $this->DepartmentsModel->where("dep_group",$this->doc_dep_group); // 해당 그룹의 부서만 가져오기
            $this->DepartmentsModel->where(" ( dep_display_kor='Y' or dep_display_rus='Y' )"); // 화면 보이기/숨김
            $this->DepartmentsModel->orderBy("dep_title_kor","ASC"); // 과 제목
            $data['department_list'] = $this->DepartmentsModel->get()->getResultArray();

            $data['group_title'] = $this->doc_dep_group_title;

            $this->setView("edit", $data);
            return $this->run();
        }else if($this->method=="post"){  //-- 저장 처리
            $info = $this->getPost();

            // 데이터 불러오기
            if($info[$this->primaryKey])$rs_info = $this->model->find($info[$this->primaryKey]);

            /**
             * 파일 업로드 처리
             */
            // 기존 업로드 파일 정보 추가
            $uploaded = array();
            if(!isset($rs_info["doc_image"]))$rs_info["doc_image"]="";
            $uploaded["doc_image"] = array(
                "name"=>"", // 실제파일명
                "upload"=>$rs_info["doc_image"] // 업로드된 파일명
            );

            $up_max_width = 102;
            $up_option = array("path"=>"medial_departments","uploaded"=>$uploaded,"image_max_width"=>$up_max_width);
            $uploader = new Uploader("doc_image",$up_option);
            $fup = $uploader->upload();

            foreach($fup as $key=>$f){
                $info[$key] = $f["upload"];
            }
            // 파일 업로드 처리 끝

            // 상세 정보 데이터 변환
            $lang_arr = array("kor","rus"); // 음... 공용으로 처리할껄 그랬나...
            foreach($lang_arr as $lang) {

                if (isset($info['info_'.$lang])) {
                    $info_arr = array();
                    foreach($info['info_'.$lang] as $info1){
                        // 상세 항목 없으면 저장처리 안함
                        if(!sizeof($info1["item"])){
                            continue;
                        }

                        $info1["title"] = strip_tags($info1["title"]);

                        $arr = array(
                            "title"=>$info1["title"],
                            "item"=>array()
                        );
                        foreach($info1["item"] as $item){

                            $item['title'] = strip_tags($item["title"]);
                            $item['content'] = strip_tags($item["content"]);

                            $arr['item'][] = $item;
                        }
                        $info_arr[] = $arr;
                    }

                    $info['doc_info_'.$lang] = json_encode($info_arr,JSON_UNESCAPED_UNICODE);

                }else{
                    $info['doc_info_'.$lang] = '';
                }
            }

            $info['doc_dep_group'] = $this->doc_dep_group;

            if($this->model->edit($info)){
                // 기존 파일 삭제 - 중요 - 반드시 DB저장 후 기존 파일 삭제할 것.
                $uploader->clear_old_file();

                $this->session->setFlashdata('messageFlag', 'edit');
                return redirect()->to($this->cont_url."?".$_SERVER["QUERY_STRING"]);
            }else{
                alert("오류가 발생하였습니다");
            }
        }
    }
}
