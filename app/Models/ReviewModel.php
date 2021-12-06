<?php


namespace App\Models;


class ReviewModel extends BaseModel
{
    protected $table      = 'review';
    protected $prefix     = 'rev';
    protected $allowedFields = ['rev_lang','rev_name','rev_nationality','rev_email','rev_tel','rev_dep_idx','rev_dep_title',
        'rev_title','rev_content','rev_agree','rev_main_sort','rev_main_name','rev_main_content',
        'rev_created_ip','rev_created_at','rev_updated_at','rev_deleted_at'];
}