<?php
namespace App\Models;

class DepartmentsModel extends BaseModel
{
    protected $table      = 'departments';
    protected $prefix     = 'dep';
    protected $allowedFields = ['dep_group','dep_title_kor','dep_title_rus','dep_image','dep_sort','dep_content_kor','dep_content_rus','dep_display_kor','dep_display_rus',
                                'dep_created_id','dep_created_ip','dep_created_at',
                                'dep_updated_id','dep_updated_ip','dep_updated_at',
                                'dep_deleted_id','dep_deleted_ip','dep_deleted_at',];
}



