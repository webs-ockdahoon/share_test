<?php
namespace App\Models;

class CodeSpecializedModel extends BaseModel
{
    protected $table      = 'code_specialized';
    protected $prefix     = 'csp';
    protected $allowedFields = ['csp_image','csp_file_name','csp_title','csp_content','csp_state','csp_created_ip','csp_created_at','csp_updated_at','csp_deleted_at'];

}



