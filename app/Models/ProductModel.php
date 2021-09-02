<?php
namespace App\Models;

class ProductModel extends BaseModel
{
    protected $table      = 'product';
    protected $prefix     = 'prd';
    protected $allowedFields = ['prd_mem_id','prd_cat_idx1','prd_cat_idx2','prd_brd_idx','prd_brand','prd_maker','prd_state','prd_sort','prd_title','prd_subtitle','prd_code','prd_price_type','prd_common_price','prd_price','prd_additional','prd_thumb1','prd_thumb2','prd_thumb3','prd_thumb4','prd_thumb5','prd_thumb6','prd_content','prd_keyword','prd_created_ip',];
}