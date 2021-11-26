<?php
namespace App\Models;

/**
 * Class BoardModel
 * @package App\Models
 *
 * 게시판 데이터 처리 모델.
 *
 */

class BoardDataModel extends BaseModel
{
    protected $table      = 'board';
    protected $prefix     = 'bod';
    protected $allowedFields = ['bod_group','bod_level','bod_sort','bod_mem_id','bod_origin_mem_idx','bod_writer_name','bod_use_editor','bod_movie_url','bod_is_notice',
                                'bod_password','bod_secret','bod_category','bod_title','bod_content','bod_read','bod_created_ip',];

    /** 게시판 코드에 따른 사용 테이블 할당
     * @param $bod_code
     */
    public function setDataTable($bod_code){
        $this->setTable("board_data_".$bod_code);
    }

    /**
     * 다음 그룹번호 구해서 리턴하기
     * @return int|mixed
     */
    public function getNextGroupNum(){
        $this->select("max(bod_group) as bod_group");
        if($row = $this->get()->getRowArray()){
            $BDgroup = $row["bod_group"]+1;
        }else{
            $BDgroup = 1;
        }
        return $BDgroup;
    }

    /**
     * 답변글 작성시 글 순서 뒤로 밀기
     * @param $group
     * @param $sort
     */
    public function setReplySort($group,$sort){
        $this->updatedField = "";   // updated_at 필드 업데이트 방지
        $this->where("bod_group",$group);
        $this->where("bod_sort>=",$sort);
        $this->set("bod_sort","bod_sort+1",false);
        $this->update();
    }

    /**
     * 글 열람 횟수 카운트 올리기
     * @param $idx
     */
    public function readCountUp($idx){
        $this->updatedField = "";   // updated_at 필드 업데이트 방지
        $this->where($this->primaryKey,$idx);
        $this->set("bod_read","bod_read+1",false);
        $this->update();
    }

    /**
     * 답변글 자리 구하기
     * bod_group, bod_sort, bod_level 값을 담아서 던져줄 것
     * @param $option
     */
    public function getReplyPosition($option){
        $this->where("bod_group='" . $option["bod_group"] . "' and bod_sort>='" . $option["bod_sort"] . "'");
        $this->orderBy("bod_sort","asc");
        $REresult = $this->get();
        $bod_sort = 1;
        foreach($REresult->getResultArray() as $RErs){
            if($RErs["bod_level"]>=$option["bod_level"])$bod_sort=$RErs["bod_sort"]+1;
            else break;
        }
        return $bod_sort;
    }

}






