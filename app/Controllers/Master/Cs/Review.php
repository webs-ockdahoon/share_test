<?php

namespace App\Controllers\Master\Cs;
use App\Controllers\Master\MasterController;
use App\Libraries\Uploader;

class Review extends MasterController
{
    protected $models = array('ReviewModel','DepartmentsModel');
    protected $viewPath = "cs/review";

    public function index()
    {
        /**
         * 검색 기능 구현 시작
         */
        if($this->sch_obj[1])$this->ReviewModel->like("rev_name",$this->sch_obj[1],'both'); // 이름
        if($this->sch_obj[2])$this->ReviewModel->like("rev_tel",$this->sch_obj[2],'both'); // 연락처
        if($this->sch_obj[3])$this->ReviewModel->like("dep_title_kor",$this->sch_obj[3],'both'); // 부서명
        if($this->sch_obj[4])$this->ReviewModel->where("rev_lang",$this->sch_obj[4]); // 언어
        if($this->sch_obj[5])$this->ReviewModel->where("rev_main_sort>0"); // 언어
        /* 검색 기능 구현 끝 */

        $this->ReviewModel->select("webs_review.*,b.dep_title_kor");
        $this->ReviewModel->join("webs_departments as b","webs_review.rev_dep_idx=b.dep_idx","left");

        $data = $this->ReviewModel->getPager();

        $this->setView("list",$data);
        return $this->run();
    }

    public function edit($idx=""){

        $validate = $this->validate([
            'rev_name' => [
                'rules'=>'required',
                'errors'=> ['required'=>'이름을 입력해 주세요.'],
            ],

        ]);

        if(!$validate) {    //-- Form 출력
            // 데이터 불러오기
            if($idx){
                if(!$data = $this->ReviewModel->find($idx))alert("데이터를 찾을 수 없습니다.");
            }
            else foreach($this->ReviewModel->getAllowedFields() as $key=>$f)$data[$f]="";

            $data["idx"] = $idx;

            // 진료과
            $this->DepartmentsModel->select('dep_idx,dep_title_kor,dep_title_'.$this->lang.' as title');
            $this->DepartmentsModel->where("(dep_deleted_at is null or dep_deleted_at = '')"); // 삭제한 데이터는 제외

            $this->DepartmentsModel->where("dep_display_".$this->lang,"Y"); // 화면 보이기/숨김
            $this->DepartmentsModel->orderBy('dep_title_'.$this->lang,"ASC"); // 과 제목
            $data['dep_list'] = $this->DepartmentsModel->get()->getResultArray();

            if($this->method=="post")$data["validate_error_msg"] = $this->makeErrorMessage($this->validator->getErrors());
            else $data["validate_error_msg"] = "";

            $this->setView("edit", $data);
            return $this->run();
        }else if($this->method=="post"){  //-- 저장 처리
            $info = $this->getPost();

            // 데이터 불러오기
            if($info[$this->primaryKey])$rs_info = $this->ReviewModel->find($info[$this->primaryKey]);

            /**
             * 파일 업로드 처리
             */
            // 기존 업로드 파일 정보 추가
//            $uploaded = array();
//            if(!isset($rs_info["mrr_image"]))$rs_info["mrr_image"]="";
//            $uploaded["mrr_image"] = array(
//                "name"=>"", // 실제파일명
//                "upload"=>$rs_info["mrr_image"] // 업로드된 파일명
//            );
//
//            $up_max_width = 102;
//            $up_option = array("path"=>"medial_departments","uploaded"=>$uploaded,"image_max_width"=>$up_max_width);
//            $uploader = new Uploader("mrr_image",$up_option);
//            $fup = $uploader->upload();
//
//            foreach($fup as $key=>$f){
//                $info[$key] = $f["upload"];
//            }
            // 파일 업로드 처리 끝

            if($info['rev_medical_type']) {
                $temp = explode("::", $info['rev_medical_type']);    // 부서번호/명칭 분리하기. - 사실 명칭은 크게 필요없을듯하나. 백업용도도로 일단 저장
                $info['rev_dep_idx'] = $temp[0];
                $info['rev_dep_title'] = $temp[1];
            }else{
                $info['rev_dep_idx'] = "";
                $info['rev_dep_title'] = "";
            }

            if($this->ReviewModel->edit($info)){
                // 기존 파일 삭제 - 중요 - 반드시 DB저장 후 기존 파일 삭제할 것.
                //$uploader->clear_old_file();

                $this->session->setFlashdata('messageFlag', 'edit');
                return redirect()->to($this->cont_url."?".$_SERVER["QUERY_STRING"]);
            }else{
                alert("오류가 발생하였습니다");
            }
        }
    }
}
