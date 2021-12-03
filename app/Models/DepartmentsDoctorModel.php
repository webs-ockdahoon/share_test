<?php


namespace App\Models;


class DepartmentsDoctorModel extends BaseModel
{
    protected $table      = 'medical_departments';
    protected $prefix     = 'med';
    protected $allowedFields = [
        'med_idx','med_name','med_medical_type','med_content','med_image','med_file_name','med_state',
        'med_subject_1','med_subject_type_1_1','med_subject_content_1_1','med_subject_type_1_2','med_subject_content_1_2',
        'med_subject_2','med_subject_type_2_1','med_subject_content_2_1','med_subject_type_2_2','med_subject_content_2_2',
        'med_subject_3','med_subject_type_3_1','med_subject_content_3_1','med_subject_type_3_2','med_subject_content_3_2',
        'med_subject_4','med_subject_type_4_1','med_subject_content_4_1','med_subject_type_4_2','med_subject_content_4_2',
        'med_subject_5','med_subject_type_5_1','med_subject_content_5_1','med_subject_type_5_2','med_subject_content_5_2',
        'med_created_id','med_created_ip','med_created_at','med_updated_id',
        'med_updated_ip','med_updated_at','med_deleted_id','med_deleted_ip','med_deleted_at'
    ];
}