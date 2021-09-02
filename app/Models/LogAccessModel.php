<?php
namespace App\Models;

class LogAccessModel extends BaseModel
{
    protected $table      = 'log_access';
    protected $prefix     = 'log';
    protected $allowedFields = ['log_datetime','log_is_robot','log_is_mobile','log_browser','log_browser_ver','log_platform','log_screenW','log_screenH','log_ip','log_refer','log_keyword'];
    protected $useSoftDeletes = false;  //-- 바로삭제

    // 공통 필드 사용안함
    public function __construct(){
        $this->primaryKey = $this->prefix . '_idx';
        $this->createdField = '';
        $this->updatedField = '';
        $this->deletedField = '';
        $this->tempReturnType = $this->returnType;
    }

    public function updateScreenSize($info){
        if(!$info["log_idx"])return false;

        $data = array(
          "log_screenW"=>$info["sw"],
          "log_screenH"=>$info["sh"],
        );
        print_array($data);

        $this->update($info["log_idx"],$data);

    }

}



