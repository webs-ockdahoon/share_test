<?php

namespace App\Controllers\Master\Product;
use App\Controllers\Master\MasterController;
use App\Libraries\Uploader;

class Product extends MasterController
{
    protected $models = array('ProductModel');
    protected $viewPath = "product/product";

    public function index()
    {
        /**
         * 검색 기능 구현 시작
         */
        if($this->sch_obj[1])$this->model->like("prd_title",$this->sch_obj[1],'both');
        if($this->sch_obj[2])$this->model->like("prd_code",$this->sch_obj[2],'both');
        /* 검색 기능 구현 끝 */

        $data = $this->model->getPager();

        // 썸네일 체크
        $image_arr = array("jpg","jpeg","png","gif","bmp");
        foreach($data["list"] as $key=>$list){
            $data["list"][$key]["prd_thumb"] = "noimage.jpg";
            for($k=1;$k<=6;$k++){
                if(!$list["prd_thumb".$k])continue;
                $ext = fnGetExt($list["prd_thumb1"]);
                if(array_search($ext,$image_arr)!==false){
                    $data["list"][$key]["prd_thumb"] = $list["prd_thumb1"];
                    break;
                }
            }
        }

        $this->setView("list",$data);
        return $this->run();
    }

    public function edit($idx=""){

        $validate = $this->validate([
            'prd_title' => [
                'rules'=>'required',
                'errors'=> ['required'=>'상품명을 입력해 주세요.'],
            ],
            'prd_price' => [
                'rules'=>'required|decimal',
                'errors'=> ['required'=>'가격을 입력해 주세요.','decimal'=>'가격은 숫자로 입력해 주세요.'],
            ],
        ]);

        if(!$validate) {    //-- Form 출력
            // 데이터 불러오기
            if($idx){
                if(!$data = $this->model->find($idx))alert("데이터를 찾을 수 없습니다.");
            }
            else foreach($this->model->getAllowedFields() as $key=>$f)$data[$f]="";

            $data["idx"] = $idx;

            if($this->method=="post")$data["validate_error_msg"] = $this->makeErrorMessage($this->validator->getErrors());
            else $data["validate_error_msg"] = "";

            // 썸네일 반복 배열 객체 만들기
            foreach($data as $key=>$val){
                if(substr($key,0,9)=="prd_thumb"){
                    $key = str_replace("prd_thumb","",$key);
                    $data["prd_thumb"][$key]["thumb"] = $val;
                }
            }

            if($data["prd_additional"])$data["prd_additional"] = json_decode($data["prd_additional"],true);
            else {
                $data["prd_additional"] = array();
                for ($k = 0; $k < 9; $k++) {
                    $data["prd_additional"][$k] = array("key"=>$k,"title"=>"","value"=>"");
                }
            }

            $data["prd_content_editor"] = fnPrintEditor("prd_content",$data["prd_content"],500,'product');

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
            for($k=1;$k<=6;$k++){
                if(!isset($rs_info["prd_thumb".$k]))$rs_info["prd_thumb".$k]="";
                $uploaded["prd_thumb".$k] = array(
                    "name"=>"", // 실제파일명
                    "upload"=>$rs_info["prd_thumb".$k] // 업로드된 파일명
                );
            }
            $up_option = array("path"=>"product/thumb","uploaded"=>$uploaded);
            $uploader = new Uploader("prd_thumb",$up_option);
            $fup = $uploader->upload();

            foreach($fup as $key=>$f){
                $info[$key] = $f["upload"];
            }                                   
            // 파일 업로드 처리 끝

            // 추가정보 json 처리
            $additional_arr=array();
            for($k=0;$k<10;$k++){
                $additional_arr[] = array("key"=>$k,"title"=>$info["prd_additionalTtl".$k],"value"=>$info["prd_additionalVal".$k]);
            }
            $info["prd_additional"] = json_encode($additional_arr,JSON_UNESCAPED_UNICODE);

            // 카테고리 선택값 정리
            if($info["prd_cat_idx1_3"])$info["prd_cat_idx1"]=$info["prd_cat_idx1_3"];
            else if($info["prd_cat_idx1_2"])$info["prd_cat_idx1"]=$info["prd_cat_idx1_2"];
            else if($info["prd_cat_idx1_1"])$info["prd_cat_idx1"]=$info["prd_cat_idx1_1"];

            if($info["prd_cat_idx2_3"])$info["prd_cat_idx2"]=$info["prd_cat_idx2_3"];
            else if($info["prd_cat_idx2_2"])$info["prd_cat_idx2"]=$info["prd_cat_idx2_2"];
            else if($info["prd_cat_idx2_1"])$info["prd_cat_idx2"]=$info["prd_cat_idx2_1"];

            if(!isset($info["prd_price_type"]))$info["prd_price_type"]="sell";

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
