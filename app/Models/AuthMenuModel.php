<?php
namespace App\Models;

class AuthMenuModel extends BaseModel
{
    protected $table      = 'auth_menu';
    protected $prefix     = 'amn';
    protected $allowedFields = ['amn_mem_id','amn_code1','amn_code2','amn_lom_group_code',
                                'amn_created_id','amn_created_ip','amn_created_at',
                                'amn_updated_id','amn_updated_ip','amn_updated_at',
                                'amn_deleted_id','amn_deleted_ip','amn_deleted_at',
                ];

    function editAuth($mem_id = "",$mn_code_list = array(),$group_code=""){

        if(!$mem_id || !is_array($mn_code_list)){
            return;
        }

        $auth_count = array(
          "inserted"=>0,
          "deleted"=>0,
        );

        $auth_idx = array();
        foreach($mn_code_list as $mn_code){

            $code = explode("::",$mn_code);
            $this->where("amn_mem_id",$mem_id);
            $this->where("amn_code1",$code[0]);
            $this->where("amn_code2",$code[1]);
            $this->where("amn_deleted_at is null");
            if(!$rs = $this->get()->getRowArray()){  // 없을때만 추가
                $data = array(
                    "amn_mem_id"=>$mem_id,
                    "amn_code1"=>$code[0],
                    "amn_code2"=>$code[1],
                    "amn_lom_group_code"=>$group_code,
                );
                $this->edit($data);
                $auth_idx[] = $this->getInsertID();
                $auth_count["inserted"]++;
            }else{
                $auth_idx[] = $rs["amn_idx"];
            }
        }

        // 기타 불필요한 데이터 삭제 (삭제 전 삭제될 카운트 수 세기)
        $this->where("amn_mem_id",$mem_id);
        $this->where("amn_deleted_at is null");
        if(sizeof($auth_idx)>0)$this->where("amn_idx not in (" .  implode(",",$auth_idx) . ")");
        $del_result = $this->get()->getResultArray();


        $auth_count["deleted"] = sizeof($del_result);
        if(!$auth_count["deleted"])$auth_count["deleted"]=0;
        foreach($del_result as $del_row){
            $this->row_delete($del_row["amn_idx"]);
        }

        /*
        $this->where("amn_mem_id",$mem_id);
        if(sizeof($auth_idx)>0)$this->where("amn_idx not in (" .  implode(",",$auth_idx) . ")");
        $this->delete();
        */

        return $auth_count;
    }

    public function getAuth($mem_id){
        $list = array();
        $this->where("amn_mem_id",$mem_id);
        $this->where("amn_deleted_at is null");
        if($result = $this->get()->getResultArray()){
            foreach($result as $rs){
                $list[$rs["amn_code1"]][$rs["amn_code2"]] = $rs["amn_idx"];
            }
        }

        return $list;
    }


}