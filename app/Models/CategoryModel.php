<?php
namespace App\Models;

class CategoryModel extends BaseModel
{
    protected $table      = 'category';
    protected $prefix     = 'cat';
    protected $allowedFields = ['cat_title','cat_code','cat_state','cat_created_ip'];
    protected $useSoftDeletes = false;  //-- 카테고리는 바로삭제

    public function getCategory(){
        $this->orderBy("cat_code");
        $result = $this->get();

        foreach($result->getResultArray() as $rs){
            $cat_level = $this->getLevel($rs["cat_code"]);
            $code = str_split($rs["cat_code"],2);
            $obj = &$list;
            foreach($code as $key=>$cd){
                if($cd=="00")break;
                if($key==0)$obj = &$obj[$cd];
                else $obj = &$obj["sub"][$cd];
            }

            $obj = array(
                "cat_idx"=>$rs["cat_idx"],
                "cat_title"=>$rs["cat_title"],
                "cat_code"=>$rs["cat_code"],
                "cat_level"=>$cat_level,
                "cat_state"=>$rs["cat_state"],
                "Pcount"=>0,
            );
        }

        return $list;

    }

    //-- 분류 코드로 레벨 구하기
    public function getLevel($cat_code){
        $code = str_split($cat_code,2);
        $level = 0;
        foreach($code as $cd){
            if($cd=="00")return $level;
            else $level++;
        }
        return $level;
    }

    //-- 분류 코드의 앞부분 구하기
    function getHead($CTcode){
        $code = str_split($CTcode,2);
        $CThead = "";
        foreach($code as $cd){
            if($cd=="00")return $CThead;
            else $CThead.=$cd;
        }
        return $CThead;
    }

    //-- 카테고리 리스트 불러오기
    function getList($cat_idx=""){
        if($cat_idx)$this->where("cat_idx",$cat_idx);
        $this->orderBy("cat_code","asc");

        if($cat_idx){
            return $this->get()->getRowArray();
        }else{
            return $this->get();
        }
    }

    //-- 특정 카테고리 하위 가져오기
    function getSubList($CThead="",$using=""){
        if($CThead){
            $this->like("cat_code",$CThead,"after");
            $this->notLike("cat_code",$CThead."00","after");
        }
        if($using)$this->where("cat_state","1");
        $this->orderBy("cat_code","asc");
        return $this->get($this->TBL)->getResultArray();
    }
}