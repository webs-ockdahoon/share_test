<?php


namespace App\Models;


class DepartmentsDoctorModel extends BaseModel
{
    protected $table      = 'webs_departments_doctor';
    protected $prefix     = 'doc';
    protected $allowedFields = ['doc_dep_group','doc_name_kor','doc_name_rus','doc_dep_idx','doc_content_kor','doc_content_rus','doc_image','doc_display_kor','doc_display_rus',

                                'doc_info_kor','doc_info_rus',

                                'doc_created_id','doc_created_ip','doc_created_at',
                                'doc_updated_id','doc_updated_ip','doc_updated_at',
                                'doc_deleted_id','doc_deleted_ip','doc_deleted_at',
    ];





}