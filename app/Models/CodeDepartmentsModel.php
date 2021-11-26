<?php
namespace App\Models;

class CodeDepartmentsModel extends BaseModel
{
    protected $table      = 'code_departments';
    protected $prefix     = 'cde';
    protected $allowedFields = ['cde_image','cde_file_name','cde_sort','cde_title','cde_content','cde_state','cde_created_ip','cde_created_at','cde_updated_at','cde_deleted_at',];

}



