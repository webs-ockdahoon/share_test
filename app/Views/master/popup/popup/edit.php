<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/locale/ko.min.js" integrity="sha512-3kMAxw/DoCOkS6yQGfQsRY1FWknTEzdiz8DOwWoqf+eGRN45AmjS2Lggql50nCe9Q6m5su5dDZylflBY2YjABQ==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.4/js/bootstrap-datetimepicker.min.js" integrity="sha512-r/mHP22LKVhxWFlvCpzqMUT4dWScZc6WRhBMVUQh+SdofvvM1BS1Hdcy94XVOod7QqQMRjLQn5w/AQOfXTPvVA==" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.4/css/bootstrap-datetimepicker.css" integrity="sha512-HWqapTcU+yOMgBe4kFnMcJGbvFPbgk39bm0ExFn0ks6/n97BBHzhDuzVkvMVVHTJSK5mtrXGX4oVwoQsNcsYvg==" crossorigin="anonymous" />

<div class="content ">
    <div class="page-title">
        <h3>팝업 관리 </h3>
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
                            <h4>기본정보</h4>
                        </div>

                        <div class="grid-body editForm">

                            <div class="row">
                                <div class="col-xs-12">

                                    <div class="form-group">
                                        <label class="form-label">팝업제목</label>
                                        <div class="controls">
                                            <input type="text" class="form-control" id="pop_title" name="pop_title" placeholder="팝업제목" value="<?php echo $pop_title?>" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">게시기간</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="pop_date_start" id="pop_date_start" placeholder="시작일" readonly value="<?php echo $pop_date_start?>" required>
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i> ~ </span>
                                                <input type="text" class="form-control" name="pop_date_end" id="pop_date_end" placeholder="종료일" readonly value="<?php echo $pop_date_end?>" required >
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">사용여부</label>
                                        <div class="controls">
                                            <div class="radio radio-success">
                                                <input type="radio" name="pop_state" id="pop_state1" value="1" <?php echo ($pop_state!="-1")?"checked":""?>> <label for="pop_state1">사용</label>
                                            </div>

                                            <div class="radio radio-danger">
                                                <input type="radio" name="pop_state" id="pop_state2" value="-1" <?php echo ($pop_state=="-1")?"checked":""?>> <label for="pop_state2">사용안함</label>
                                            </div>
                                            <br>
                                            <small>※ '사용안함'설정시 게시기간과 상관없이 노출이 되지 않습니다.</small>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">팝업위치</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <span class="input-group-addon">X 좌표 : </span>
                                                <input type="text" class="form-control cleave_number" name="pop_pos_x" id="pop_pos_x" placeholder="X 좌표(숫자만 입력)"  value="<?php echo $pop_pos_x?>">
                                                <span class="input-group-addon"> PX / Y 좌표 : </span>
                                                <input type="text" class="form-control cleave_number" name="pop_pos_y" id="pop_pos_y" placeholder="Y 좌표(숫자만 입력)"  value="<?php echo $pop_pos_y?>">
                                                <span class="input-group-addon"> PX (숫자만 입력) </span>

                                            </div>
                                        </div>
                                    </div>

                                        <div class="form-group">
                                            <label class="form-label">팝업 이미지</label>
                                            <div class="controls">
                                                <input type="file" class="form-control" id="pop_image" name="pop_image" placeholder="팝업이미지" value="" >
                                                <small></small>
                                                <?php if($pop_image!=''){?>
                                                    <button class='btn btn-mini btn-info ml10 mr10' type='button' onclick='fnThumbView("<?php echo $pop_image?>")'><i class='fa fa-eye'></i> 보기</button>
                                                    <br>
                                                    <label style='display:inline-block;padding-top:5px;'><input type='checkbox' name='pop_image_del' value='1'> 삭제</label>
                                                <?php }?>
                                            </div>
                                        </div>

                                    <div class="form-group">
                                        <label class="form-label">링크주소</label>
                                        <div class="controls">
                                            <input type="text" class="form-control" id="pop_link" name="pop_link" placeholder="링크주소(http 포함 전체 주소 입력)" value="<?php echo $pop_link?>" >
                                            ※ 입력시에만 해당 팝업에 링크가 설정됩니다.
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">링크주소 이동</label>
                                        <div class="controls">
                                            <div class="radio radio-success">
                                                <input type="radio" name="pop_link_target" id="pop_link_target1" value="_self" <?php echo ($pop_link_target!="_blank")?"checked":""?>> <label for="pop_link_target1">현재창으로 이동</label>
                                            </div>

                                            <div class="radio radio-danger">
                                                <input type="radio" name="pop_link_target" id="pop_link_target2" value="_blank" <?php echo ($pop_link_target=="_blank")?"checked":""?>> <label for="pop_link_target2">새창으로 이동</label>
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
                <!--/ row -->
            </div>

        </form>
        <!--/  Form Box -->

    </div>
    <!-- END PAGE -->
</div>

<Script>
    $(document).ready(function(){
        $("#pop_date_start,#pop_date_end").datetimepicker({
            format: 'yyyy-MM-DD HH:mm',
        });
    });

</Script>