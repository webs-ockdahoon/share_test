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
                                        <label class="form-label">메인페이지<br>노출순서</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <input type="number" class="form-control w-75p" name="cde_sort" placeholder="순서" value="<?php echo $cde_sort?>">
                                            </div>
                                            <small>※ 숫자만 입력해 주세요.</small><br>
                                            <small>※ 미작성 시 메인화면에 노출되지 않으며, 낮은 번호가 맨처음 노출됩니다.</small><br>
                                            <small>※ 동일한 순서를 입력하실 경우 동일 순서 안에서 최근 등록순으로 나옵니다.</small>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">진료과 명칭</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="cde_title"  placeholder="진료과 명칭" value="<?php echo $cde_title?>" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">진료과 소개</label>
                                        <div class="controls">
                                            <textarea name="cde_content" class="w-100" placeholder="내용" rows="20"><?php echo $cde_content?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">진료과 이미지</label>
                                        <div class="controls">
                                            <input type="file" class="form-control" id="cde_image" name="cde_image" placeholder="진료과 이미지" value="" >
                                            <small style="color:red;">※ 권장 사이즈 : 80x80</small>
                                            <?php if(!empty($cde_image)){?>
                                                <br>
                                                <button class='btn btn-mini btn-info ml10 mr10' type='button' onclick='fnThumbView("<?php echo $cde_image; ?>")'><i class='fa fa-eye'></i> 보기</button>
                                                <br>
                                                <label style='display:inline-block;padding-top:5px;'><input type='checkbox' name='cde_image_del' value='1'> 파일명 : <?php echo $cde_file_name; ?> 삭제</label>
                                                <br>
                                                <small style="color:red;">※ 파일 삭제 시 에만 체크</small>
                                            <?php }?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">사용여부</label>
                                        <div class="controls">
                                            <div class="radio radio-success">
                                                <input type="radio" name="cde_state" id="cde_state1" value="Y" <?php echo ($cde_state!="N")?"checked":""?>> <label for="cde_state1">사용</label>
                                            </div>

                                            <div class="radio radio-danger">
                                                <input type="radio" name="cde_state" id="cde_state2" value="N" <?php echo ($cde_state=="N")?"checked":""?>> <label for="cde_state2">사용안함</label>
                                            </div>
                                            <br>
                                            <small>※ '사용안함'설정시 사용년도와 상관없이 노출이 되지 않습니다.</small>

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
        $("#cde_date_start,#cde_date_end").datetimepicker({
            format: 'yyyy-MM-DD HH:mm',
        });
    });

</Script>