<?php
namespace App\Models;

class TermsModel extends BaseModel
{
    protected $table      = 'terms';
    protected $prefix     = 'terms';
    protected $allowedFields = ['terms_group','terms_start_date','terms_end_date','terms_content_kor','terms_content_rus',
                                'terms_created_id','terms_created_ip','terms_created_at',
                                'terms_updated_id','terms_updated_ip','terms_updated_at',
                                'terms_deleted_id','terms_deleted_ip','terms_deleted_at',
                                ];





}







