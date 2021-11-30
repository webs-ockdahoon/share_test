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
                                        <label class="form-label">전문센터과</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <select name="mes_medical_type" id="mes_medical_type">
                                                    <option value="">미선택</option>
                                                    <?php
                                                    foreach($code_list as $key=>$pos){
                                                        $s = "";
                                                        if($pos['csp_title']==$mes_medical_type)$s = "selected";
                                                        echo '<option value="'.$pos['csp_title'].'" '.$s.'>'.$pos['csp_title'].'</option>';
                                                    }?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="form-label">이름</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="mes_name"  placeholder="이름" value="<?php echo $mes_name?>" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">전문 진료분야</label>
                                        <div class="controls">
                                            <input type="text" class="form-control" name="mes_content"  placeholder="전문 진료분야" value="<?php echo $mes_content?>" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">인물 이미지</label>
                                        <div class="controls">
                                            <input type="file" class="form-control" id="mes_image" name="mes_image" placeholder="인물 이미지" value="" >
                                            <small style="color:red;">※ 권장 사이즈 : 102x136</small>
                                            <?php if(!empty($mes_image)){?>
                                                <br>
                                                <button class='btn btn-mini btn-info ml10 mr10' type='button' onclick='fnThumbView("<?php echo $mes_image; ?>")'><i class='fa fa-eye'></i> 보기</button>
                                                <br>
                                                <label style='display:inline-block;padding-top:5px;'><input type='checkbox' name='mes_image_del' value='1'> 파일명 : <?php echo $mes_file_name; ?> 삭제</label>
                                                <br>
                                                <small style="color:red;">※ 파일 삭제 시 에만 체크</small>
                                            <?php }?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">사용여부</label>
                                        <div class="controls">
                                            <div class="radio radio-success">
                                                <input type="radio" name="mes_state" id="mes_state1" value="Y" <?php echo ($mes_state!="N")?"checked":""?>> <label for="mes_state1">사용</label>
                                            </div>

                                            <div class="radio radio-danger">
                                                <input type="radio" name="mes_state" id="mes_state2" value="N" <?php echo ($mes_state=="N")?"checked":""?>> <label for="mes_state2">사용안함</label>
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

                <div class='col-lg-6 col-lg-offset-3'>
                    <div class="grid simple ">
                        <div class="grid-title no-border">
                            <h4>추가사항<br><small>※ 제목을 입력해야 해당 항목이 노출됩니다.</small></h4>
                        </div>

                        <div class="grid-body editForm">

                            <div class="row">
                                <div class="col-xs-12">
                                    <?php for($i=1; $i<6; $i++){?>
                                        <div class="form-group">
                                            <label class="form-label">제목</label>
                                            <div class="controls">
                                                <input type="text" class="form-control" name="mes_subject_<?php echo $i; ?>"  placeholder="ex) 학력 및 경력" value="<?php echo ${"mes_subject_".$i};?>" >
                                            </div>
                                            <?php for($j=1; $j<3; $j++){?>
                                                <label class="form-label">소제목</label>
                                                <div class="controls">
                                                    <input type="text" class="form-control" name="mes_subject_type_<?php echo $i."_".$j; ?>"  placeholder="ex) 학력" value="<?php echo ${"mes_subject_type_".$i."_".$j};?>" >
                                                </div>
                                                <label class="form-label">관련 내용</label>
                                                <div class="controls">
                                                    <textarea name="mes_subject_content_<?php echo $i."_".$j; ?>" class="w-100" placeholder="ex) - 19xx년 xxx대학교 의과대학 졸업" rows="5"><?php echo ${"mes_subject_content_".$i."_".$j};?></textarea>
                                                </div>
                                            <?php }?>
                                        </div>
                                    <?php } ?>


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
        $("#mes_date_start,#mes_date_end").datetimepicker({
            format: 'yyyy-MM-DD HH:mm',
        });
    });

</Script>