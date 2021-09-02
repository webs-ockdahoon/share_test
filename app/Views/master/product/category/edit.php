<div class="content ">
    <div class="page-title">
        <h3>분류 관리 </h3>
    </div>
    <div id="container">

        <!--  Form Box -->
        <?php echo $validate_error_msg?>
        <form method="post" enctype="multipart/form-data" id="editForm">
            <input type="hidden" name="<?php echo $primaryKey?>" id="<?php echo $primaryKey?>" value="<?php echo $idx?>">
            <input type='hidden' name='mode' id='mode' value='<?php echo $mode?>'>
            <!-- row -->
            <div class="row">
                <div class='col-md-6 col-md-offset-3'>
                    <div class="grid simple ">
                        <div class="grid-title no-border">
                            <h4>분류 정보</h4>
                        </div>

                        <div class="grid-body editForm">

                            <div class="row">
                                <div class="col-xs-12">

                                    <?php if ($mode=='addChild'){?>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="form-label">상위분류</label>
                                        <div class="controls">
                                            <span class='fieldText'><?php echo $cat_title?></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="cat_title" class="form-label">분류명</label>
                                        <div class="controls">
                                            <input type="text" class="form-control" id="cat_title" name="cat_title"
                                                   placeholder="분류명" value="" required>
                                        </div>
                                    </div>
                                    <?php }else{?>
                                    <div class="form-group">
                                        <label for="cat_title" class="form-label">분류명</label>
                                        <div class="controls">
                                            <input type="text" class="form-control" id="cat_title" name="cat_title"
                                                   placeholder="분류명" value="<?php echo $cat_title?>" required>
                                        </div>
                                    </div>
                                    <?php }?>


                                    <div class="form-group">
                                        <label for="iCTstate1" class="form-label">사용여부</label>
                                        <div class="controls">

                                            <div class="radio">
                                                <input id="iCTstate1" type="radio" name="cat_state"
                                                       value="1" <?php echo ($cat_state!="-1")?"checked":""?>>
                                                <label for="iCTstate1">사용</label>

                                                <input id="iCTstate2" type="radio" name="cat_state"
                                                       value="-1" <?php echo ($cat_state=="-1")?"checked":""?>>
                                                <label for="iCTstate2">숨김</label>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!--/ row -->

            <!-- row -->
            <div class="row">
                <div class='col-xs-12 text-center'>
                    <button type='submit' class='btn btn-primary btn-large mr20'>저 장</button>
                    <a type='button' class='btn btn-danger btn-large' href="<?php echo $cont_url.$qstr?>">취소</a>
                </div>
            </div>
            <!--/ row -->

        </form>
        <!--/  Form Box -->

    </div>
    <!-- END PAGE -->
</div>


<script>
    $(document).ready(function () {
        $("#inCTname").focus();
    });
</script>