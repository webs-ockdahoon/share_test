<div class="content ">
    <div class="page-title">
        <h3>협력업체 관리 </h3>
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
                                        <label class="form-label">노출순서</label>
                                        <div class="controls">
                                            <select class="form-control-static" name="par_sort" >
                                                <?php
                                                if(!$par_sort)$par_sort=99; // 기본 99 - 제일 뒤로 등록시키기
                                                for($k=1;$k<=99;$k++){?>
                                                <option value="<?php echo $k?>" <?php if($k==$par_sort)echo "Selected";?>><?php echo $k?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">업체명</label>
                                        <div class="controls">
                                            <input type="text" class="form-control" name="par_title"  placeholder="업체명" value="<?php echo $par_title?>" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">업체 이미지</label>
                                        <div class="controls">
                                            <input type="file" class="form-control" id="par_image" name="par_image" placeholder="업체 이미지" value="" >
                                            <small style="color:red;">※ 권장 사이즈 : 180x90</small>
                                            <?php if(!empty($par_image)){?>
                                                <br>
                                                <img src="/uploaded/file/<?php echo $par_image?>">
                                                <br>
                                                <label style='display:inline-block;padding-top:5px;'><input type='checkbox' name='par_image_del' value='1'>  삭제</label>
                                                <br>
                                                <small style="color:red;">※ 파일 삭제 시 에만 체크</small>
                                            <?php }?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">링크주소</label>
                                        <div class="controls">
                                            <input type="text" class="form-control" name="par_link"  placeholder="http:// 포함 링크주소" value="<?php echo $par_link?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">사용여부(국문)</label>
                                        <div class="controls">
                                            <div class="radio radio-success">
                                                <input type="radio" name="par_display_kor" id="par_display_kor1" value="Y" <?php echo ($par_display_kor!="N")?"checked":""?>> <label for="par_display_kor1">사용</label>
                                            </div>
                                            <div class="radio radio-danger">
                                                <input type="radio" name="par_display_kor" id="par_display_kor2" value="N" <?php echo ($par_display_kor=="N")?"checked":""?>> <label for="par_display_kor2">사용안함</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">사용여부(러시아)</label>
                                        <div class="controls">
                                            <div class="radio radio-success">
                                                <input type="radio" name="par_display_rus" id="par_display_rus1" value="Y" <?php echo ($par_display_rus!="N")?"checked":""?>> <label for="par_display_rus1">사용</label>
                                            </div>
                                            <div class="radio radio-danger">
                                                <input type="radio" name="par_display_rus" id="par_display_rus2" value="N" <?php echo ($par_display_rus=="N")?"checked":""?>> <label for="par_display_rus2">사용안함</label>
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
        $("#par_date_start,#par_date_end").datetimepicker({
            format: 'yyyy-MM-DD HH:mm',
        });
    });

</Script>