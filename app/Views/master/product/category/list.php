<script src='/assets/plugins/jquery-sortable/jquery-sortable2.js'></script>

<div class="content category_list">
    <div class="page-title">
        <h3>분류 관리 </h3>
    </div>
    <div id="container">

        <!-- row -->
        <div class="row">
            <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">

                <!-- Content Area -->
                <div class="grid simple ">
                    <div class="grid-title no-border pd20" style='overflow:hidden;'>

                        <div class='col-xs-12 txtL helpText mb20'>
                            ※  <i class="fa fa-arrows-alt"></i> 아이콘을 드래그&드랍하시면 순서변경이 가능합니다.<br>
                            ※ 순서변경 후 반드시 "순서저장"버튼을 클릭해주세요.<br>
                        </div>

                        <div class='col-xs-6 txtL'><button class='btn btn-success btn-sm' onclick='fnCategorySortSave()'><i class='fa fa-check'></i> 순서저장</button></div>
                        <div class='col-xs-6 txtR'><a type="button" class="btn btn-primary btn-sm" href="<?php echo $cont_url?>/edit<?php echo $qstr?>"><i class="fa fa-plus"></i> 분류 추가</a></div>

                    </div>

                    <div class="grid-body ">
                        <div class="row-fluid">

                            <ol class='sortList'>
                                <?php echo $cat_list?>
                            </ol>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    fnCategoryListInit();
</script>


