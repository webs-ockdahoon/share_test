
<div class="content ">
    <div class="page-title">
        <h3>진료 후기 관리</h3>
    </div>
    <div id="container">

        <!--  Form Box -->
        <?php echo $validate_error_msg?>
        <form method="post" enctype="multipart/form-data" id="editForm">
            <input type="hidden" name="<?php echo $primaryKey?>" id="<?php echo $primaryKey?>" value="<?php echo $idx?>">
            <!-- row -->
            <div class="row">

                <div class='col-lg-6'>
                    <div class="grid simple ">
                        <div class="grid-title no-border">
                            <h4>기본정보</h4>
                        </div>

                        <div class="grid-body editForm">

                            <div class="row">
                                <div class="col-xs-12">


                                    <div class="form-group">
                                        <label class="form-label">사이트</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <?php if(isset($rev_idx)){

                                                    echo '<div class="mt10">';
                                                    if($rev_lang=='rus')echo '러시아';
                                                    else if($rev_lang=='kor')echo '국문';
                                                    echo '</div>';

                                                }else{?>
                                                <select class="form-control" name="rev_lang" required>
                                                    <option value="kor">국문</option>
                                                    <option value="rus">러시아</option>
                                                </select>
                                                <?php }?>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="form-label">이름</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="rev_name"  placeholder="이름" value="<?php echo $rev_name?>" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">국적</label>
                                        <div class="controls">
                                            <input type="text" class="form-control" name="rev_nationality"  placeholder="국적" value="<?php echo $rev_nationality?>" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">이메일</label>
                                        <div class="controls">
                                            <input type="text" class="form-control" name="rev_email"  placeholder="이메일" value="<?php echo $rev_email?>" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">연락처</label>
                                        <div class="controls">
                                            <input type="text" class="form-control" name="rev_tel"  placeholder="연락처" value="<?php echo $rev_tel?>" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">진료과</label>
                                        <div class="controls">
                                            <select name="rev_medical_type" value="" id="medical" class="form-control form-control-lg">
                                                <option value="">분야 선택</option>
                                                <?php
                                                foreach($dep_list as $key => $val){?>
                                                    <option value="<?php echo $val['dep_idx'] . "::" . $val['dep_title_kor']?>" <?php if($rev_dep_idx==$val['dep_idx'])echo "selected";?>><?php echo $val['dep_title_kor']; ?></option>
                                                <?php }?>
                                            </select>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">제목</label>
                                        <div class="controls">
                                            <input type="text" class="form-control" name="rev_title"  placeholder="제목" value="<?php echo $rev_title?>" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">내용</label>
                                        <div class="controls">
                                            <textarea name="rev_content" class="w-100" placeholder="문의 내용" rows="5"><?php echo $rev_content;?></textarea>
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
                            <h4>메인 노출정보</h4>
                        </div>

                        <div class="grid-body editForm">

                            <div class="row">
                                <div class="col-xs-12">

                                    <div class="form-group">
                                        <label class="form-label">노출순서</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <input type="number" class="form-control w-75p" name="rev_main_sort"  placeholder="순서" value="<?php echo $rev_main_sort?>" >
                                            </div>
                                            <small>※ 0 또는 미입력 시 노출되지 않습니다.</small>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">이름</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="rev_main_name"  placeholder="이름" value="<?php echo $rev_main_name?>">
                                                ※ 미입력시 기본정보의 '이름'이 표시됩니다.
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="form-label">내용</label>
                                        <div class="controls">
                                            <textarea name="rev_main_content" class="w-100" placeholder="문의 내용" rows="5"><?php echo $rev_main_content;?></textarea>
                                            ※ 미입력시 기본정보의 '내용'이 표시됩니다.
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
        $("#rev_date_start,#rev_date_end").datetimepicker({
            format: 'yyyy-MM-DD HH:mm',
        });
    });

</Script>