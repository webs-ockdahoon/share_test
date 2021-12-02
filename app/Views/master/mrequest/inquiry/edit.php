<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/locale/ko.min.js" integrity="sha512-3kMAxw/DoCOkS6yQGfQsRY1FWknTEzdiz8DOwWoqf+eGRN45AmjS2Lggql50nCe9Q6m5su5dDZylflBY2YjABQ==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.4/js/bootstrap-datetimepicker.min.js" integrity="sha512-r/mHP22LKVhxWFlvCpzqMUT4dWScZc6WRhBMVUQh+SdofvvM1BS1Hdcy94XVOod7QqQMRjLQn5w/AQOfXTPvVA==" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.4/css/bootstrap-datetimepicker.css" integrity="sha512-HWqapTcU+yOMgBe4kFnMcJGbvFPbgk39bm0ExFn0ks6/n97BBHzhDuzVkvMVVHTJSK5mtrXGX4oVwoQsNcsYvg==" crossorigin="anonymous" />

<div class="content ">
    <div class="page-title">
        <h3>진료 문의 관리 </h3>
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
                                        <label class="form-label">이름</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="mri_name"  placeholder="이름" value="<?php echo $mri_name?>" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">국적</label>
                                        <div class="controls">
                                            <input type="text" class="form-control" name="mri_nationality"  placeholder="국적" value="<?php echo $mri_nationality?>" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">이메일</label>
                                        <div class="controls">
                                            <input type="text" class="form-control" name="mri_email"  placeholder="이메일" value="<?php echo $mri_email?>" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">연락처</label>
                                        <div class="controls">
                                            <input type="text" class="form-control" name="mri_tel"  placeholder="연락처" value="<?php echo $mri_tel?>" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">생년월일</label>
                                        <div class="controls">
                                            <input type="text" class="form-control" name="mri_birth"  placeholder="생년월일" value="<?php echo $mri_birth?>" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">성별</label>
                                       <div class="controls">
                                            <div class="radio radio-success">
                                                <input type="radio" name="mri_gender" id="mri_gender1" value="남자" <?php echo ($mri_gender!="여자")?"checked":""?>> <label for="mri_gender1">남자</label>
                                            </div>

                                            <div class="radio radio-danger">
                                                <input type="radio" name="mri_gender" id="mri_gender2" value="여자" <?php echo ($mri_gender=="여자")?"checked":""?>> <label for="mri_gender2">여자</label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="form-label">제목</label>
                                        <div class="controls">
                                            <input type="text" class="form-control" name="mri_title"  placeholder="제목" value="<?php echo $mri_title?>" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">내용</label>
                                        <div class="controls">
                                            <textarea name="mri_content" class="w-100" placeholder="문의 내용" rows="5"><?php echo $mri_content;?></textarea>
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
        $("#mri_date_start,#mri_date_end").datetimepicker({
            format: 'yyyy-MM-DD HH:mm',
        });
    });

</Script>