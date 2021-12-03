<div class="content ">
    <div class="page-title">
        <h3>진료과 관리 </h3>
    </div>
    <div id="container">

        <!--  Form Box -->
        <?php echo $validate_error_msg?>
        <form method="post" enctype="multipart/form-data" id="editForm">
            <input type="hidden" name="<?php echo $primaryKey?>" id="<?php echo $primaryKey?>" value="<?php echo $idx?>">
            <!-- row -->
            <div class="row">

                <div class='col-lg-6 col-lg-offset-3'>
                    <div class="grid simple ">
                        <div class="grid-title no-border">
                            <h4>심볼이미지</h4>
                        </div>

                        <div class="grid-body editForm">

                            <div class="row">
                                <div class="col-xs-12">

                                    <div class="form-group">
                                        <label class="form-label">이미지</label>
                                        <div class="controls">
                                            <input type="file" class="form-control" id="dep_image" name="dep_image" placeholder="진료과 이미지" value="" >
                                            <small style="color:red;">※ 권장 사이즈 : 80x80</small>

                                            <?php if(!empty($dep_image)){?>
                                                <br><br>
                                                <img src="/uploaded/file/<?php echo $dep_image; ?>">
                                                <label><input type='checkbox' name='dep_image_del' value='1'> 삭제</label>
                                            <?php }?>

                                        </div>
                                    </div>




                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">

                <div class='col-lg-6'>
                    <div class="grid simple ">
                        <div class="grid-title no-border">
                            <h4>국문</h4>
                        </div>

                        <div class="grid-body editForm">

                            <div class="row">
                                <div class="col-xs-12">

                                    <div class="form-group">
                                        <label class="form-label">사용여부</label>
                                        <div class="controls">
                                            <div class="radio radio-success">
                                                <input type="radio" name="dep_display_kor" id="dep_display_kor1" value="Y" <?php echo ($dep_display_kor!="N")?"checked":""?>> <label for="dep_display_kor1">사용</label>
                                            </div>
                                            <div class="radio radio-danger">
                                                <input type="radio" name="dep_display_kor" id="dep_display_kor2" value="N" <?php echo ($dep_display_kor=="N")?"checked":""?>> <label for="dep_display_kor2">사용안함</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">명칭</label>
                                        <div class="controls">
                                            <input type="text" class="form-control" name="dep_title_kor"  placeholder="명칭" value="<?php echo $dep_title_kor?>" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">소개</label>
                                        <div class="controls">
                                            <textarea name="dep_content_kor" class="w-100" placeholder="내용" rows="20"><?php echo $dep_content_kor?></textarea>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class='col-lg-6'>
                    <div class="grid simple ">
                        <div class="grid-title no-border">
                            <h4>러시아</h4>
                        </div>

                        <div class="grid-body editForm">

                            <div class="row">
                                <div class="col-xs-12">

                                    <div class="form-group">
                                        <label class="form-label">사용여부</label>
                                        <div class="controls">
                                            <div class="radio radio-success">
                                                <input type="radio" name="dep_display_rus" id="dep_display_rus1" value="Y" <?php echo ($dep_display_rus!="N")?"checked":""?>> <label for="dep_display_rus1">사용</label>
                                            </div>
                                            <div class="radio radio-danger">
                                                <input type="radio" name="dep_display_rus" id="dep_display_rus2" value="N" <?php echo ($dep_display_rus=="N")?"checked":""?>> <label for="dep_display_rus2">사용안함</label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="form-label">명칭</label>
                                        <div class="controls">
                                            <input type="text" class="form-control" name="dep_title_rus"  placeholder="명칭" value="<?php echo $dep_title_rus?>" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">소개</label>
                                        <div class="controls">
                                            <textarea name="dep_content_rus" class="w-100" placeholder="내용" rows="20"><?php echo $dep_content_rus?></textarea>
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
                <!--/ row -->
            </div>

        </form>
        <!--/  Form Box -->

    </div>
    <!-- END PAGE -->
</div>

<Script>
    $(document).ready(function(){
        $("#dep_date_start,#dep_date_end").datetimepicker({
            format: 'yyyy-MM-DD HH:mm',
        });
    });

</Script>