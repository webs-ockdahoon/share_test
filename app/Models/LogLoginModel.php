<?php
namespace App\Models;

class LogLoginModel extends BaseModel
{
    protected $table      = 'log_login';
    protected $prefix     = 'lol';
    protected $allowedFields = ['lol_idx','lol_mem_id','lol_login_result','lol_created_ip','lol_created_at',];

    // 공통 필드 사용안함
    public function __construct(){

        parent::__construct();

        $this->primaryKey = $this->prefix . '_idx';
        //$this->createdField = '';
        $this->updatedField = '';
        $this->deletedField = '';
        $this->tempReturnType = $this->returnType;
    }

    // 로그인 연속 실패 횟수 가져오기
    public function getFailCount(){
        $this->where($this->prefix."_created_ip",$_SERVER["REMOTE_ADDR"]);
        $this->orderBy($this->primaryKey,"desc");
        $this->limit(10);   // 10 개만 가져오면 충분할 듯
        $result = $this->get()->getResultArray();

        $fail_count = 0;
        $last_at = "";
        foreach($result as $rs){
            if($rs[$this->prefix."_login_result"]>=0)break;    // 0 : 시간 초과 리셋 / 1 : 성공

            $fail_count++;
            if(!$last_at)$last_at = $rs[$this->createdField];
        }

        $result = array(
          "count"=>$fail_count,
          "last_at"=>$last_at,
        );

        return $result;
    }

    public function resetFail(){

        $this->where($this->prefix."_created_ip",$_SERVER["REMOTE_ADDR"]);
        $this->limit(1);
        $this->orderBy($this->primaryKey,"desc");
        if($rs = $this->get()->getRowArray()){
            $this->set($this->prefix."_login_result",0);
            $this->update($rs[$this->primaryKey]);
        }

    }

}



