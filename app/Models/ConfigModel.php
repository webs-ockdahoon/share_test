<?php
namespace App\Models;

class ConfigModel extends BaseModel
{
    protected $table      = 'config';
    protected $prefix     = 'con';
    protected $allowedFields = ['con_value'];
    protected $useSoftDeletes = false;  //-- 바로삭제

    // 데이터 추가 지원하지 않도록 처리
    public function insert($data = NULL, bool $returnID = true){}

    // 데이터 삭제 지원하지 않도록 처리
    public function delete($data = NULL, bool $returnID = true){}

    public function getConfig($group){
        $this->where("con_group",$group);
        $conf = array();
        foreach($this->get()->getResultArray() as $rs){
            $conf[$rs["con_title"]] = $rs["con_value"];
        }
        return $conf;
    }

    public function edit($info){

        foreach($info["info"] as $key=>$val){
            $this->where("con_group",$info["group"]);
            $this->where("con_title",$key);
            $this->set("con_value",$val);
            $this->update();
        }


    }


}