<?php
namespace App\Models;

class HospitalHistoryModel extends BaseModel
{
    protected $table      = 'hospital_history';
    protected $prefix     = 'hoh';
    protected $allowedFields = ['hoh_state',"hoh_year",'hoh_history',
        'hoh_created_id','hoh_created_ip','hoh_created_at',
        'hoh_updated_id','hoh_updated_ip','hoh_updated_at',
        'hoh_deleted_id','hoh_deleted_ip','hoh_deleted_at',
        ];

}



