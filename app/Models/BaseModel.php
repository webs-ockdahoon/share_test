<?php
namespace App\Models;
use CodeIgniter\Model;

class BaseModel extends Model
{

    protected $table      = '';
    protected $prefix     = '';
    protected $allowedFields = '';

    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;

    protected $SS_MID;   //-- 세션변수

    // default setting
    public function __construct(){
        $this->primaryKey = $this->prefix . '_idx';
        $this->createdField = $this->prefix . '_created_at';
        $this->updatedField = $this->prefix . '_updated_at';
        $this->deletedField = $this->prefix . '_deleted_at';
        $this->tempReturnType = $this->returnType;

        // 세션 변수화
        $this->session = \Config\Services::session();
        $this->SS_MID = $this->session->get("MID");
    }

    public function edit($info){
        //-- 업데이트할 필드 정리
        $data = array();
        foreach($this->allowedFields as $fields){
            if(isset($info[$fields]))$data[$fields] = $info[$fields];
        }

        // 데이터 입력/수정 모두 updated 날짜 기록
        if(array_search($this->prefix."_updated_id",$this->allowedFields)!==false && !isset($data[$this->prefix."_updated_id"]))$data[$this->prefix."_updated_id"] = $this->SS_MID;
        if(array_search($this->prefix."_updated_ip",$this->allowedFields)!==false && !isset($data[$this->prefix."_updated_ip"]))$data[$this->prefix."_updated_ip"] = $_SERVER["REMOTE_ADDR"];

        if(isset($info[$this->primaryKey]) && $info[$this->primaryKey]!=""){
            $this->update($info[$this->primaryKey],$data);
        }else{
            if(array_search($this->prefix."_created_id",$this->allowedFields)!==false && !isset($data[$this->prefix."_created_id"]))$data[$this->prefix."_created_id"] = $this->SS_MID;
            if(array_search($this->prefix."_created_ip",$this->allowedFields)!==false && !isset($data[$this->prefix."_created_ip"]))$data[$this->prefix."_created_ip"] = $_SERVER["REMOTE_ADDR"];

            try{
                $this->insert($data);
                $info[$this->primaryKey] = $this->insertID();
            }catch (\Exception $e){
                //die($e->getMessage());
                return null;
            }
        }

        //-- 후처리 메소드 추가
        if (method_exists($this, "editAfter"))$this->editAfter($info);

        return $info[$this->primaryKey];
    }

    public function getPrimaryKey(){
        return $this->primaryKey;
    }

    public function getAllowedFields(){
        return $this->allowedFields;
    }

    /**
     * 공통으로 사용하는 페이징 처리
     * @param $model
     */
    public function getPager($option=array()){
        if(isset($option["where"])) {
            foreach ($option["where"] as $wh) {
                $this->like($wh[0], $wh[1], 'both');
            }
        }

        if(isset($option["select"])){
            $this->select($option["select"]);
        }

        if(isset($option["join"])){
            foreach($option["join"] as $join){
                if(!isset($join["type"]))$join["type"] = "left";
                if(!$join["type"])$join["type"] = "left";
                $this->join($join["table"],$join["on"],$join["type"]);
            }
        }

        // 정렬처리
        if(isset($option["orderBy"]))$this->orderBy($option["orderBy"]);
        else $this->orderBy($this->primaryKey . " desc");

        if($this->deletedField)$this->where('('.$this->deletedField . " is null or " . $this->deletedField . " = ''" .')');

        $perPage = 10;
        if(isset($option["perPage"]))$perPage = $option["perPage"];
        $pager = [
            'list' => $this->paginate($perPage),
            'info' => '총 ' . number_format($this->pager->gettotal()) . ' 개 데이터 / 총 ' . $this->pager->getpageCount() . ' page 중 현재 '.$this->pager->getcurrentPage().' page',
            'links' => $this->pager->links(),
            'total_count'=>number_format($this->pager->gettotal()),
        ];

        //echo $this->getLastQuery();
        //print_array($this->pager);

        return $pager;
    }

    /**
     * 암호화된 패스워드 문자열 만들기
     */
    public function makePassword($str){
        if(!$str)$str = fnMakeRandCode("code",20);
        $sql = "select sha2('" . $str . "',256) as pwd";
        $db = db_connect();
        $rs = $db->query($sql)->getRowArray();
        return $rs["pwd"];
    }

    /**
     * 주키를 기준으로 정렬해서 전체 리스트 리천하기 // 단, 삭제레코드 제외
     * + 옵션 추가 + prkey 값이 true 시 배열의 key 값을 PrimaryKey 값으로 변환처리
     */
    public function getList($orderBy="",$prkey = false){

        // 살제 필드 검사 후 제외 시키기
        $db = db_connect();
        if($db->fieldExists($this->prefix . "_deleted_at",$this->table)){
            $this->where($this->prefix . "_deleted_at is null");
        }

        if(!$orderBy)$orderBy = $this->primaryKey;
        $this->orderBy($orderBy);
        $result = $this->get();

        if($prkey){
            $list = array();
            foreach($result->getResultArray() as $rs){
                $list[$rs[$this->primaryKey]] = $rs;
            }
            return $list;

        }else {
            return $result->getResultArray();
        }
    }


    /**
     * 삭제 로직 수정
     * softdelete 일때는 삭제일시와 함께 삭제 IP, 삭제 ID 기록
     */
    public function row_delete($key){
        if($this->useSoftDeletes){
            if(
                array_search($this->prefix."_deleted_id",$this->allowedFields)!==false && !isset($data[$this->prefix."_deleted_id"])
                &&
                array_search($this->prefix."_deleted_ip",$this->allowedFields)!==false && !isset($data[$this->prefix."_deleted_ip"])
            ){
                $data[$this->prefix."_deleted_id"] = $this->SS_MID;
                $data[$this->prefix."_deleted_ip"] = $_SERVER["REMOTE_ADDR"];
                $this->update($key,$data);
            }
        }
        $this->delete($key);
    }

    /**
     * 사용여부 셋팅하기 ( Display Flag )
     * @param $idx
     * @param $display
     */
    public function set_display($idx,$display){
        $data[$this->prefix."_display"] = $display;
        $this->update($idx,$data);
    }

}