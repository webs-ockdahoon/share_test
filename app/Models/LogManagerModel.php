<?php
namespace App\Models;

class LogManagerModel extends BaseModel
{
    protected $table      = 'log_manager';
    protected $prefix     = 'lom';
    protected $allowedFields = [
                                'lom_idx','lom_mem_id','lom_type','lom_content','lom_group_code',
                                'lom_created_id','lom_created_ip','lom_created_at',
                                'lom_updated_id','lom_updated_ip','lom_updated_at',
    ];

    public function getUniqueCode(){

        $group_code = fnMakeRandCode("code",20);

        $loop = 100;
        while($loop--) {    // 무한루프 방지
            $this->where("lom_group_code",$group_code);
            if(!$this->get()->getRowArray()){
                return $group_code;
            }
        }

        return "";
    }



}



