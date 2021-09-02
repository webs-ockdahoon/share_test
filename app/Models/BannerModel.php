<?php
namespace App\Models;

class BannerModel extends BaseModel
{
    protected $table      = 'banner';
    protected $prefix     = 'ban';
    protected $allowedFields = ['ban_title','ban_image','ban_link','ban_link_target','ban_position','ban_date_start','ban_date_end','ban_state','ban_created_ip','ban_created_at','ban_updated_at','ban_deleted_at',];

    /**
     * 배너 출력 위치 지정 및 리턴
     */
    public function getPosition(){
        $pos = array(
            "main"=>"메인배너",
            "main_box1"=>"메인박스1",
            "main_box2"=>"메인박스2",
            "main_box3"=>"메인박스3",
            "main_box4"=>"메인박스4",
            "etc1"=>"기타1",
            "etc2"=>"기타2",
            "etc3"=>"기타3",
            "etc4"=>"기타4",
        );
        return $pos;
    }
}



