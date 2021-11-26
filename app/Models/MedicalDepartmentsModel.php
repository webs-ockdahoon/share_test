<?php


namespace App\Models;


class MedicalDepartmentsModel extends BaseModel
{
    protected $table      = 'medical_departments';
    protected $prefix     = 'med';
    protected $allowedFields = [
        'med_idx','med_name','med_medical_type','med_content','med_image','med_file_name',
        'med_state','med_subject_1','med_subject_type_1','med_subject_content_1',
        'med_subject_2','med_subject_type_2','med_subject_content_2',
        'med_subject_3','med_subject_type_3','med_subject_content_3',
        'med_subject_4','med_subject_type_4','med_subject_content_4',
        'med_subject_5','med_subject_type_5','med_subject_content_5',
        'med_created_id','med_created_ip','med_created_at','med_updated_id',
        'med_updated_ip','med_updated_at','med_deleted_id','med_deleted_ip','med_deleted_at'
    ];
}