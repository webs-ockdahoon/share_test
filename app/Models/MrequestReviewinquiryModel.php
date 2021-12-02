<?php


namespace App\Models;


class MrequestReviewinquiryModel extends BaseModel
{
    protected $table      = 'mrequest_reviewinquiry';
    protected $prefix     = 'mrr';
    protected $allowedFields = ['mrr_name','mrr_nationality','mrr_email','mrr_tel','mrr_medical_type',
        'mrr_title','mrr_content','mrr_agree','mrr_main_sort',
        'mrr_created_ip','mrr_created_at','mrr_updated_at','mrr_deleted_at'];
}