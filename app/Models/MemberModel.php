<?php
namespace App\Models;

class MemberModel extends BaseModel
{
    protected $table      = 'member';
    protected $prefix     = 'mem';
    protected $allowedFields = ['mem_id','mem_pass','mem_name','mem_tel','mem_email','mem_addr1','mem_addr2','mem_gender','mem_level',
                                'mem_created_id','mem_created_ip','mem_created_at',
                                'mem_updated_id','mem_updated_ip','mem_updated_at',
                                'mem_deleted_id','mem_deleted_ip','mem_deleted_at',];



}