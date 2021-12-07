<?php


namespace App\Models;


class InquiryModel extends BaseModel
{
    protected $table      = 'inquiry';
    protected $prefix     = 'inq';
    protected $allowedFields = ['inq_name','inq_nationality','inq_email','inq_tel','inq_birth',
        'inq_gender','inq_title','inq_content','inq_lang',
        'inq_agree','inq_created_ip','inq_created_at','inq_updated_at','inq_deleted_at'];
}