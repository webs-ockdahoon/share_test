<?php
namespace App\Models;

class LogAdminModel extends BaseModel
{
    protected $table      = 'log_admin';
    protected $prefix     = 'loa';
    protected $allowedFields = ['loa_url','loa_method','loa_data','loa_menu_name',
                                'loa_created_id','loa_created_ip','loa_created_at',
                                'loa_updated_id','loa_updated_ip','loa_updated_at',
                                'loa_deleted_id','loa_deleted_ip','loa_deleted_at',
                                ];


}