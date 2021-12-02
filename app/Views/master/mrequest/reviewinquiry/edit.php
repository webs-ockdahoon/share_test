<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/locale/ko.min.js" integrity="sha512-3kMAxw/DoCOkS6yQGfQsRY1FWknTEzdiz8DOwWoqf+eGRN45AmjS2Lggql50nCe9Q6m5su5dDZylflBY2YjABQ==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.4/js/bootstrap-datetimepicker.min.js" integrity="sha512-r/mHP22LKVhxWFlvCpzqMUT4dWScZc6WRhBMVUQh+SdofvvM1BS1Hdcy94XVOod7QqQMRjLQn5w/AQOfXTPvVA==" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.4/css/bootstrap-datetimepicker.css" integrity="sha512-HWqapTcU+yOMgBe4kFnMcJGbvFPbgk39bm0ExFn0ks6/n97BBHzhDuzVkvMVVHTJSK5mtrXGX4oVwoQsNcsYvg==" crossorigin="anonymous" />

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
                            <h4>기본정보</h4>
                        </div>

                        <div class="grid-body editForm">

                            <div class="row">
                                <div class="col-xs-12">

                                    <div class="form-group">
                                        <label class="form-label">메인노출순서</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <input type="number" class="form-control w-75p" name="mrr_main_sort"  placeholder="순서" value="<?php echo $mrr_main_sort?>" required>
                                            </div>
                                            <small>※ 0 또는 미입력 시 노출되지 않습니다.</small>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">이름</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="mrr_name"  placeholder="이름" value="<?php echo $mrr_name?>" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">국적</label>
                                        <div class="controls">
                                            <input type="text" class="form-control" name="mrr_nationality"  placeholder="국적" value="<?php echo $mrr_nationality?>" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">이메일</label>
                                        <div class="controls">
                                            <input type="text" class="form-control" name="mrr_email"  placeholder="이메일" value="<?php echo $mrr_email?>" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">연락처</label>
                                        <div class="controls">
                                            <input type="text" class="form-control" name="mrr_tel"  placeholder="연락처" value="<?php echo $mrr_tel?>" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">진료과</label>
                                        <div class="controls">
                                            <input type="text" class="form-control" name="mrr_medical_type"  placeholder="진료과" value="<?php echo $mrr_medical_type?>" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">제목</label>
                                        <div class="controls">
                                            <input type="text" class="form-control" name="mrr_title"  placeholder="제목" value="<?php echo $mrr_title?>" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">내용</label>
                                        <div class="controls">
                                            <textarea name="mrr_content" class="w-100" placeholder="문의 내용" rows="5"><?php echo $mrr_content;?></textarea>
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
        $("#mrr_date_start,#mrr_date_end").datetimepicker({
            format: 'yyyy-MM-DD HH:mm',
        });
    });

</Script>