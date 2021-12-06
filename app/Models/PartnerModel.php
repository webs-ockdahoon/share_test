<?php
namespace App\Models;

class PartnerModel extends BaseModel
{
    protected $table      = 'partner';
    protected $prefix     = 'par';
    protected $allowedFields = ['par_image','par_title','par_content','par_display_kor','par_display_rus', 'par_link','par_sort','par_created_ip','par_created_at','par_updated_at','par_deleted_at',];

}



