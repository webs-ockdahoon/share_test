<?php

namespace App\Controllers\Master\Config;
use App\Controllers\Master\MasterController;


class Menu extends MasterController
{
    protected $models = array('MenuModel'/*,'PageModel'*/);
    protected $viewPath = "config/menu";

    public function index()
    {
        $data["menu_list"] = $this->model->getMenu();
        //print_array($data["menu_list"]);
        $this->setView("list",$data);
        return $this->run();
    }

    public function edit($idx=""){

        $validate = $this->validate([
            'mnu_title_kor' => [
                'rules'=>'required',
                'errors'=> ['required'=>'메뉴명(국문)을 입력해 주세요.'],
            ],
            'mnu_title_rus' => [
                'rules'=>'required',
                'errors'=> ['required'=>'메뉴명(러시아)을 입력해 주세요.'],
            ],

        ]);

        if(!$validate) {    //-- Form 출력
            // 데이터 불러오기
            if($idx){
                $data["add_child"] = $this->getGet("add_child");
                if(!$data["add_child"]) {
                    if (!$data = $this->model->find($idx)) alert("데이터를 찾을 수 없습니다.");
                }else{
                    if (!$data["parent_info"] = $this->model->find($idx)) alert("데이터를 찾을 수 없습니다.");
                    foreach($this->model->getAllowedFields() as $key=>$f)$data[$f]="";
                }
            }
            else {
                foreach($this->model->getAllowedFields() as $key=>$f)$data[$f]="";
            }

            if(!isset($data["add_child"]))$data["add_child"] = "";

            $data["idx"] = $idx;


            /*
            $page_list = $this->PageModel->getList('page_title',true,$this->site_code);
            $data["page_list"] = $page_list;
            */

            if($this->method=="post")$data["validate_error_msg"] = $this->makeErrorMessage($this->validator->getErrors());
            else $data["validate_error_msg"] = "";

            $this->setView("edit", $data);
            return $this->run();
        }else if($this->method=="post"){  //-- 저장 처리
            $info = $this->getPost();

            if($idx && $info["add_child"]){
                $info["mnu_idx"] = "";
                if (!$parent_info = $this->model->find($idx)) alert("데이터를 찾을 수 없습니다.");
                $info["mnu_code"] = $this->model->makeCode($parent_info["mnu_code"]);
            }else if(!$idx){
                $info["mnu_idx"] = "";
                $info["mnu_code"] = $this->model->makeCode();
            }

            // 지접지정시 페이지 번호 초기화
            if($info["mnu_url_type"]=="direct"){
                $info["mnu_page_idx"] = 0;
            }

            if($this->model->edit($info)){
                $this->session->setFlashdata('messageFlag', 'edit');
                //return redirect()->to($this->cont_url."?".$_SERVER["QUERY_STRING"]);
                return redirect()->to($this->cont_url);
            }else{
                alert("오류가 발생하였습니다");
            }
        }
    }

    public function sortsave(){
        $mnu_info = $this->getPost("mnu_info");

        $code[1] = 0;
        $code[2] = 0;
        foreach($mnu_info as $mnu){
            $code[$mnu[1]]++;
            if($mnu[1]==1)$code[2]=0;

            $new_code = str_pad($code[1],2,"0",STR_PAD_LEFT).str_pad($code[2],2,"0",STR_PAD_LEFT);
            $new_code = str_pad($new_code,10,"0",STR_PAD_RIGHT);

            // 메뉴 업데이트
            $this->model->set("mnu_code",$new_code);
            $this->model->update($mnu[0]);
        }

        $json["result"] = "OK";
        die(json_encode($json));
    }


}
