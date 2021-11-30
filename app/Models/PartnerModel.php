<?php
namespace App\Models;

class PartnerModel extends BaseModel
{
    protected $table      = 'partner';
    protected $prefix     = 'par';
    protected $allowedFields = ['par_image','par_file_name','par_title','par_content','par_state','par_created_ip','par_created_at','par_updated_at','par_deleted_at',];

}



