<?php
namespace App\Models;

class PopupModel extends BaseModel
{
    protected $table      = 'popup';
    protected $prefix     = 'pop';
    protected $allowedFields = ['pop_title','pop_image','pop_link','pop_link_target','pop_pos_x','pop_pos_y','pop_date_start','pop_date_end','pop_state','pop_created_ip','pop_created_at','pop_updated_at','pop_deleted_at',];

}



