<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/locale/ko.min.js" integrity="sha512-3kMAxw/DoCOkS6yQGfQsRY1FWknTEzdiz8DOwWoqf+eGRN45AmjS2Lggql50nCe9Q6m5su5dDZylflBY2YjABQ==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.4/js/bootstrap-datetimepicker.min.js" integrity="sha512-r/mHP22LKVhxWFlvCpzqMUT4dWScZc6WRhBMVUQh+SdofvvM1BS1Hdcy94XVOod7QqQMRjLQn5w/AQOfXTPvVA==" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.4/css/bootstrap-datetimepicker.css" integrity="sha512-HWqapTcU+yOMgBe4kFnMcJGbvFPbgk39bm0ExFn0ks6/n97BBHzhDuzVkvMVVHTJSK5mtrXGX4oVwoQsNcsYvg==" crossorigin="anonymous" />

<div class="content ">
    <div class="page-title">
        <h3>배너 관리 </h3>
    </div>
    <div id="container">

        <!-- Form Box -->
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
                                        <label class="form-label">배너제목</label>
                                        <div class="controls">
                                            <input type="text" class="form-control" id="ban_title" name="ban_title" placeholder="배너제목" value="<?php echo $ban_title?>" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">게시기간</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="ban_date_start" id="ban_date_start" placeholder="시작일" readonly value="<?php echo $ban_date_start?>" required>
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i> ~ </span>
                                                <input type="text" class="form-control" name="ban_date_end" id="ban_date_end" placeholder="종료일" readonly value="<?php echo $ban_date_end?>" required >
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">사용여부</label>
                                        <div class="controls">
                                            <div class="radio radio-success">
                                                <input type="radio" name="ban_state" id="ban_state1" value="1" <?php echo ($ban_state!="-1")?"checked":""?>> <label for="ban_state1">사용</label>
                                            </div>

                                            <div class="radio radio-danger">
                                                <input type="radio" name="ban_state" id="ban_state2" value="-1" <?php echo ($ban_state=="-1")?"checked":""?>> <label for="ban_state2">사용안함</label>
                                            </div>
                                            <br>
                                            <small>※ '사용안함'설정시 게시기간과 상관없이 노출이 되지 않습니다.</small>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">노출사이트</label>
                                        <div class="controls">
                                            <div class="radio radio-success">
                                                <input type="radio" name="ban_lang" id="ban_lang1" value="all" <?php echo (!$ban_lang || $ban_lang=="all")?"checked":""?>> <label for="ban_lang1">전체</label>
                                            </div>

                                            <div class="radio radio-success">
                                                <input type="radio" name="ban_lang" id="ban_lang2" value="rus" <?php echo ($ban_lang=="rus")?"checked":""?>> <label for="ban_lang2">러시아</label>
                                            </div>

                                            <div class="radio radio-success">
                                                <input type="radio" name="ban_lang" id="ban_lang3" value="kor" <?php echo ($ban_lang=="kor")?"checked":""?>> <label for="ban_lang2">국문</label>
                                            </div>
                                            
                                            
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">배너위치</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <select name="ban_position" id="ban_position">
                                                    <option value="">미선택</option>
                                                    <?php
                                                    foreach($ban_pos_list as $key=>$pos){
                                                        $s = "";
                                                        if($key==$ban_position)$s = "selected";
                                                        echo '<option value="'.$key.'" '.$s.'>'.$pos.'</option>';
                                                    }?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">노출 순서</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <select name="ban_sort" id="ban_sort">
                                                    <?php
                                                    for($k=1;$k<=99;$k++){
                                                        $s = "";
                                                        if($k==$ban_sort)$s = "selected";
                                                        echo '<option value="'.$k.'" '.$s.'>'.$k.'</option>';
                                                    }?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                        <div class="form-group">
                                            <label class="form-label">배너 이미지</label>
                                            <div class="controls">

                                                <input type="file" class="form-control" id="ban_image" name="ban_image" placeholder="배너이미지" value="" >
                                                <?php
                                                if($ban_image!=''){?>
                                                    <br>
                                                    <img src="/uploaded/file/<?php echo $ban_image?>" class="img-responsive">
                                                    <label style='display:inline-block;padding-top:5px;'><input type='checkbox' name='ban_image_del' value='1'> 삭제</label>
                                                <?php }?>
                                            </div>
                                        </div>

                                    <div class="form-group">
                                        <label class="form-label">링크주소</label>
                                        <div class="controls">
                                            <input type="text" class="form-control" id="ban_link" name="ban_link" placeholder="링크주소(http 포함 전체 주소 입력)" value="<?php echo $ban_link?>" >
                                            ※ 입력시에만 해당 배너에 링크가 설정됩니다.
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">링크주소 이동</label>
                                        <div class="controls">
                                            <div class="radio radio-success">
                                                <input type="radio" name="ban_link_target" id="ban_link_target1" value="_self" <?php echo ($ban_link_target!="_blank")?"checked":""?>> <label for="ban_link_target1">현재창으로 이동</label>
                                            </div>

                                            <div class="radio radio-danger">
                                                <input type="radio" name="ban_link_target" id="ban_link_target2" value="_blank" <?php echo ($ban_link_target=="_blank")?"checked":""?>> <label for="ban_link_target2">새창으로 이동</label>
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
        <!--/ Form Box -->

    </div>
    <!-- END PAGE -->
</div>


<Script>
    $(document).ready(function(){
        $("#ban_date_start,#ban_date_end").datetimepicker({
            format: 'yyyy-MM-DD HH:mm',
        });
    });

</Script>