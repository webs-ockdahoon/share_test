<?php
namespace App\Models;

class CodeIntroHistoryModel extends BaseModel
{
    protected $table      = 'code_intro_history';
    protected $prefix     = 'cih';
    protected $allowedFields = ['cih_date_start','cih_date_end','cih_state','cih_created_ip','cih_created_at','cih_updated_at','cih_deleted_at'];

}



