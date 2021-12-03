<?php

namespace App\Controllers\Master\Medical;
use App\Controllers\Master\MasterController;
use App\Libraries\Uploader;

class SpecializedCenterDoctor extends TreatmentDoctor
{
    protected $doc_dep_group = "specializedcenter";
    protected $doc_dep_group_title = "전문센터";
}
