<script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
<div class="content ">
    <div class="page-title">
        <h3><?php echo $group_title?></h3>
    </div>
    <div id="container">

        <!--  Form Box -->
        <?php echo $validate_error_msg?>
        <form method="post" enctype="multipart/form-data" id="editForm">
            <input type="hidden" name="<?php echo $primaryKey?>" id="<?php echo $primaryKey?>" value="<?php echo $idx?>">
            <input type="hidden" name="terms_group" id="<?php echo $terms_group?>" value="<?php echo $s1?>">


            <!-- row -->
            <div class="row">
                <div class='col-lg-8 col-lg-offset-2 col-sm-12'>
                    <div class="grid simple ">
                        <div class="grid-title no-border">
                            <h4>시행일자</h4>
                        </div>

                        <div class="grid-body editForm">
                            <div class="row">
                                <div class="col-xs-12">

                                    <div class="form-group">
                                        <label class="form-label">시행일자</label>
                                        <div class="controls">
                                            <input type="text" class="form-control-static datepicker cleave_date" id="terms_start_date" name="terms_start_date"
                                                   placeholder="시행일자" value="<?php echo $terms_start_date?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">종료일자</label>
                                        <div class="controls">
                                            <input type="text" class="form-control-static datepicker cleave_date" id="terms_end_date" name="terms_end_date"
                                                   placeholder="종료일자" value="<?php echo $terms_end_date?>" >
                                            <br>
                                            <small>※ 미입력시 '현행'으로 표시</small>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="grid simple ">
                        <div class="grid-title no-border">
                            <h4>내용(국문)</h4>
                        </div>

                        <div class="grid-body editForm">
                            <div class="row">
                                <div class="col-xs-12">
                                    <?php echo fnPrintEditor("terms_content_kor",$terms_content_kor,500,'term')?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid simple ">
                        <div class="grid-title no-border">
                            <h4>내용(러시아)</h4>
                        </div>

                        <div class="grid-body editForm">
                            <div class="row">
                                <div class="col-xs-12">
                                    <?php echo fnPrintEditor("terms_content_rus",$terms_content_rus,500,'term')?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--/  Form Box -->
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
</div>