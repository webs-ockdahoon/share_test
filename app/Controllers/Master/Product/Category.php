<?php
namespace App\Controllers\Master\Product;
use App\Controllers\Master\MasterController;

class Category extends MasterController
{
    protected $models = array('CategoryModel');
    protected $viewPath = "product/category";

    public function index()
    {
        /**
         * 검색 기능 구현 시작
         */
        /* 검색 기능 구현 끝 */

        // 데이터 가져오기
        $list = $this->model->getCategory();
        $cat_list = "";
        foreach($list as $cat){
            $cat_list.=$this->fnPrintGroupList($cat);
        }

        $data["cat_list"] = $cat_list;

        $this->setView("list",$data);
        return $this->run();
    }

    public function edit($idx=""){

        $validate = $this->validate([
            'cat_title' => [
                'rules'=>'required',
                'errors'=> ['required'=>'분류명을 입력해 주세요.'],
            ],
        ]);

        if(!$validate) {    //-- Form 출력
            // 데이터 불러오기
            if($idx){
                if(!$data = $this->model->find($idx))alert("데이터를 찾을 수 없습니다.");
            }
            else foreach($this->model->getAllowedFields() as $key=>$f)$data[$f]="";

            $data["idx"] = $idx;

            $data["mode"] = $this->getGet('mode');

            if($this->method=="post")$data["validate_error_msg"] = $this->makeErrorMessage($this->validator->getErrors());
            else $data["validate_error_msg"] = "";

            $this->setView("edit", $data);
            return $this->run();
        }else if($this->method=="post"){  //-- 저장 처리
            $info = $this->getPost();

            if($info["cat_idx"] && $info["mode"]!="addChild"){  // 수정

            }else { // 추가

                if ($info["mode"] == "addChild") {  // 하위 카테고리 추가
                    $this->model->where("cat_idx", $info["cat_idx"]);
                    if ($rs = $this->model->find($info["cat_idx"])) {
                        $cat_code = $rs["cat_code"];
                        $cat_level = $this->model->getLevel($cat_code);
                        $cat_head = $this->model->getHead($cat_code);

                        // idx 인자값 삭제
                        $info["cat_idx"]="";

                    } else {
                        return false;
                    }
                } else {    // 최상위 카테고리 추가
                    $cat_level = 0;
                }

                $this->model->select("max(cat_code) as MXcode");
                if ($cat_level > 0) $this->model->where("substr(cat_code,1," . ($cat_level * 2) . ")='" . $cat_head . "'");
                if ($cat_level > 0 && $cat_level < 4) $this->model->where("substr(cat_code," . (($cat_level * 2) + 3) . ",2)='00'");

                if ($rs = $this->model->find()) {
                    $MXcode = $rs[0]["MXcode"];
                    $new_cat_code = substr($MXcode, 0, ($cat_level + 1) * 2) + 1;
                    $new_cat_code = str_pad($new_cat_code, (($cat_level + 1) * 2), "0", STR_PAD_LEFT);
                    $new_cat_code = str_pad($new_cat_code, 10, "0", STR_PAD_RIGHT);
                }
                $info["cat_code"] = $new_cat_code;
            }

            if($this->model->edit($info)){
                $this->session->setFlashdata('messageFlag', 'edit');
                return redirect()->to($this->cont_url."?".$_SERVER["QUERY_STRING"]);
            }else{
                alert("오류가 발생하였습니다");
            }
        }
    }


    /**
     * 카테고리 리스트 생성하기 - 뷰파서에서 처리가 너무 어려움
     * @param $obj
     * @return string
     */
    private function fnPrintGroupList($obj){
        $str = '';
        if($obj["cat_state"]==1)$CTstate = "<span class='label label-success ml10'>사용</span>";
        else $CTstate = "<span class='label label-danger ml10'>숨김</span>";

        $str.= '<li data-id="'.$obj["cat_idx"].'"><i class="fa fa-arrows-alt"></i> ' . $obj["cat_title"] . $CTstate;
        if($obj["Pcount"])echo " <span class='helpText' style='color:#000;'>(<i class='fa fa-cubes'></i> ".$obj["Pcount"] . ")</span>";

            $str.=  "<a class='btn btn-sm btn-success btn-mini ' href='" . $this->cont_url . "/edit/".$obj["cat_idx"] . "'><i class='fa fa-pencil-alt'></i> 수정</a>";
            if($obj["Pcount"])$str.=  "<button class='btn btn-mini btn-danger btn-xs' onclick='fnDataDelFail(" . $obj["Pcount"] . ")'><i class='fa fa-trash'></i> 삭제</button>";
            else $str.=  "<button class='btn btn-sm btn-danger btn-mini ' onclick='fnCategoryDel(" . $obj["cat_idx"] . ")'><i class='fa fa-trash'></i> 삭제</button>";
            if($obj["cat_level"]<2){
                $str.=  "<a class='btn btn-sm btn-primary btn-mini' href='" . $this->cont_url . "/edit/" . $obj["cat_idx"] . "?mode=addChild'><i class='fa fa-plus'></i> 하위추가</a>";
            }

        if(isset($obj["sub"])){
            $str.=  "<ol>";
            foreach($obj["sub"] as $sub){
                $str.=$this->fnPrintGroupList($sub);
            }
            $str.=  "</ol>";
        }else if($obj["cat_level"]<2) $str.=  "<ol></ol>";
        $str.=  '</li>';

        return $str;
    }

    /**
     * 카테고리 정럴 저장하기
     */
    public function sortSave(){
        $info = $this->getPost();
        $sortData = $info["sortData"][0];

        $this->sortList = array();
        $this->sortCategory($sortData);

        foreach($this->sortList as $sort){
            $data["cat_code"] = $sort["cat_code"];
            $this->model->update($sort["cat_idx"],$data);
        }

        $json["result"] = "OK";
        die(json_encode($json));
    }

    /**
     * 카테고리 정렬 저장하기 전 배열 정리하기
     * @param $sortData
     * @param string $PRcode
     */
    private function sortCategory($sortData,$PRcode=""){
        foreach($sortData as $key=>$sortItem){
            if($PRcode)$cat_code=$PRcode.str_pad(($key+1), 2, "0", STR_PAD_LEFT );
            else $cat_code =str_pad(($key+1), 2, "0", STR_PAD_LEFT );

            $this->sortList[] = array(
                "cat_idx"=>$sortItem["id"],
                "cat_code"=>str_pad($cat_code, 10, "0", STR_PAD_RIGHT )
            );

            if(isset($sortItem["children"])){
                $this->sortCategory($sortItem["children"][0],$cat_code);
            }
        }
    }

    /**
     * 카테고리 순차적으로 선택하기 기능
     */
    public function step(){

        $selected = $this->getPost("selected");	//-- 이미 선택된 값
        if($selected){	//-- 기존 선택값을 기준으로 모든 단계 계산
            //-- 최상위 구하기
            $CTnow = $this->model->getList($selected);

            $CTcode[0] = substr($CTnow["cat_code"],0,2);
            $CTcode[1] = substr($CTnow["cat_code"],2,2);
            $CTcode[2] = substr($CTnow["cat_code"],4,2);
            $CTcode[3] = substr($CTnow["cat_code"],6,2);
            $CTcode[4] = substr($CTnow["cat_code"],8,2);

            $parentHead = "";
            $head = "";
            $data = array();
            for($k=0;$k<sizeof($CTcode);$k++){
                $data[$k+1] = array();
                if($CTcode[$k]=="00"){
                    $data[$k+1] = array();
                    continue;
                }
                if($k>0)$parentHead.= $CTcode[$k-1];
                $head.= $CTcode[$k];
                $CTresult = $this->model->getSubList($parentHead);

                foreach($CTresult as $CT){
                    if($this->model->getLevel($CT["cat_code"])!=($k+1))continue;
                    $CThead = $this->model->getHead($CT["cat_code"]);

                    $s = "";
                    if($CThead == $head){
                        $s = "selected";
                    }

                    $data[$k+1][] = array(
                        "cat_idx"=>$CT["cat_idx"],
                        "cat_title"=>$CT["cat_title"],
                        "cat_code"=>$CT["cat_code"],	//-- 쓸일은 없을듯...
                        "selected"=>$s
                    );
                }
            }

            $json["data"] = $data;

        }else{	//-- 일반 순서대로 선택형
            $step = $this->getPost("step");	//-- 현재스탭
            $parent = $this->getPost("parent");	//-- 부모 카테고리 고유번호

            if($parent){
                $CTparent = $this->model->getList($parent);
                $CThead = $this->model->getHead($CTparent["cat_code"]);
                $CTresult = $this->model->getSubList($CThead);
            }else{
                $CTresult = $this->model->getSubList();
            }

            $data = array();
            foreach($CTresult as $CT){
                if($this->model->getLevel($CT["cat_code"])!=$step)continue;

                $data[] = array(
                    "cat_idx"=>$CT["cat_idx"],
                    "cat_title"=>$CT["cat_title"],
                    "cat_code"=>$CT["cat_code"],	//-- 쓸일은 없을듯...
                );
            }
            $json["data"] = $data;
        }


        die(json_encode($json));
    }

}
