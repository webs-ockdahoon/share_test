<?php


namespace App\Models;


class MrequestInquiryModel extends BaseModel
{
    protected $table      = 'mrequest_inquiry';
    protected $prefix     = 'mri';
    protected $allowedFields = ['mri_name','mri_nationality','mri_email','mri_tel','mri_birth',
        'mri_gender','mri_title','mri_content',
        'mri_agree','mri_created_ip','mri_created_at','mri_updated_at','mri_deleted_at'];
}