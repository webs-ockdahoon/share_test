<?php
namespace App\Models;

class HospitalHistoryModel extends BaseModel
{
    protected $table      = 'hospital_history';
    protected $prefix     = 'hoh';
    protected $allowedFields = ['hoh_state','hoh_created_ip','hoh_created_at','hoh_updated_at','hoh_deleted_at',
        "hoh_position","hoh_year",
        'hoh_date_start_1','hoh_date_end_1','hoh_date_start_2','hoh_date_end_2','hoh_date_start_3','hoh_date_end_3',
        'hoh_date_start_4','hoh_date_end_4','hoh_date_start_5','hoh_date_end_5','hoh_date_start_6','hoh_date_end_6',
        'hoh_date_start_7','hoh_date_end_7','hoh_date_start_8','hoh_date_end_8','hoh_date_start_9','hoh_date_end_9',
        'hoh_date_start_10','hoh_date_end_10','hoh_date_start_11','hoh_date_end_11','hoh_date_start_12','hoh_date_end_12',
        'hoh_date_start_13','hoh_date_end_13','hoh_date_start_14','hoh_date_end_14','hoh_date_start_15','hoh_date_end_15',
        'hoh_date_start_16','hoh_date_end_16','hoh_date_start_17','hoh_date_end_17','hoh_date_start_18','hoh_date_end_18',
        'hoh_date_start_19','hoh_date_end_19','hoh_date_start_20','hoh_date_end_20',
        'hoh_content_1','hoh_content_2','hoh_content_3','hoh_content_4','hoh_content_5','hoh_content_6','hoh_content_7',
        'hoh_content_8','hoh_content_9','hoh_content_10','hoh_content_11','hoh_content_12','hoh_content_13','hoh_content_14',
        'hoh_content_15','hoh_content_16','hoh_content_17','hoh_content_18','hoh_content_19','hoh_content_20'
        ];

}



