<?php


namespace App\Models;


class MedicalSpecializedModel extends BaseModel
{
    protected $table      = 'medical_specialized';
    protected $prefix     = 'mes';
    protected $allowedFields = [
        'mes_idx','mes_name','mes_medical_type','mes_content','mes_image','mes_file_name', 'mes_state',
        'mes_subject_1','mes_subject_type_1_1','mes_subject_content_1_1','mes_subject_type_1_2','mes_subject_content_1_2',
        'mes_subject_2','mes_subject_type_2_1','mes_subject_content_2_1','mes_subject_type_2_2','mes_subject_content_2_2',
        'mes_subject_3','mes_subject_type_3_1','mes_subject_content_3_1','mes_subject_type_3_2','mes_subject_content_3_2',
        'mes_subject_4','mes_subject_type_4_1','mes_subject_content_4_1','mes_subject_type_4_2','mes_subject_content_4_2',
        'mes_subject_5','mes_subject_type_5_1','mes_subject_content_5_1','mes_subject_type_5_2','mes_subject_content_5_2',
        'mes_created_id','mes_created_ip','mes_created_at','mes_updated_id',
        'mes_updated_ip','mes_updated_at','mes_deleted_id','mes_deleted_ip','mes_deleted_at'
    ];
}