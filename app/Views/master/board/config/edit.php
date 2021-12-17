<div class="content ">
    <div class="page-title">
        <h3>게시판관리</h3>
    </div>
    <div id="container">

        <?php echo $validate_error_msg?>

        <form method="post" enctype="multipart/form-data" id="editForm">
            <input type="hidden" name="<?php echo $primaryKey?>" id="<?php echo $primaryKey?>" value="<?php echo $idx?>">

            <!-- Content Area -->
            <div class="row">
                <!--  Form Box -->
                <div class='col-lg-5 col-lg-offset-1 col-sm-6'>
                    <div class="grid simple ">
                        <div class="grid-title no-border">
                            <h4>기본정보</h4>
                        </div>

                        <div class="grid-body editForm">
                            <div class="row">
                                <div class="col-xs-12">

                                    <?php if($boc_code==''){?>
                                    <div class="form-group">
                                        <label class="form-label">게시판 코드</label>
                                        <div class="controls">
                                            <input type="text" class="form-control" id="boc_code" name="boc_code"
                                                   placeholder="게시판 아이디" required>
                                        </div>
                                    </div>
                                    <?php }else{?>
                                    <div class="form-group">
                                        <label class="form-label">게시판 코드</label>
                                        <div class="controls fieldText">
                                            <?php echo $boc_code?>
                                            <input type="hidden" name="boc_code" id="boc_code" value="<?php echo $boc_code?>">
                                        </div>
                                    </div>
                                    <?php }?>

                                    <div class="form-group">
                                        <label class="form-label">게시판명</label>
                                        <div class="controls">
                                            <input type="text" class="form-control" id="boc_title" name="boc_title"
                                                   placeholder="게시판명" value="<?php echo $boc_title?>" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">사용스킨</label>
                                        <div class="controls">
                                            <select class="form-control-static" name="boc_skin" id="boc_skin">
                                                <?php foreach($board_skin as $skin){?>
                                                    <option value="<?php echo $skin?>" <?php if($skin==$boc_skin)echo "selected";?>><?php echo $skin?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">목록 수</label>
                                        <div class="controls">
                                            <select class="form-control-static" name="boc_list_size" id="boc_list_size">
                                                <?php for($k=5;$k<=50;$k++){?>
                                                <option value="<?php echo $k?>" <?php if($k==$boc_list_size)echo "selected";?>><?php echo $k?></option>
                                                <?php }?>
                                            </select>
                                            개
                                            <br><small>한페이지에 출력될 목록 개수 입니다.</small>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">첨부파일 수</label>
                                        <div class="controls">
                                            <select class="form-control-static" name="boc_file_count" id="boc_file_count">
                                                <option vlaue="0">사용안함</option>
                                                <?php for($k=1;$k<=4;$k++){?>
                                                    <option value="<?php echo $k?>" <?php if($k==$boc_file_count)echo "selected";?>><?php echo $k?></option>
                                                <?php }?>
                                            </select>
                                            개
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">첨부파일 용량</label>
                                        <div class="controls">
                                            <select class="form-control-static" name="boc_file_size" id="boc_file_size">
                                                <?php for($k=1;$k<=100;$k++){?>
                                                    <option value="<?php echo $k?>" <?php if($k==$boc_file_size)echo "selected";?>><?php echo $k?></option>
                                                <?php
                                                    if($k>=10)$k+=9;
                                                }?>
                                            </select>
                                            MB
                                            <br><small>첨부파일 1개당 허용 용량입니다.<br>서버 설정에 맞게 설정해주시기 바랍니다.</small>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">첨부 이미지</label>
                                        <div class="controls">
                                            <select class="form-control-static" name="boc_image_view" id="boc_image_view">
                                                <option vlaue="top" <?php if($boc_image_view=="top")echo "selected";?>>본문 상단에 출력</option>
                                                <option vlaue="bottom" <?php if($boc_image_view=="bottom")echo "selected";?>>본문 하단에 출력</option>
                                                <option vlaue="hidden" <?php if($boc_image_view=="hidden")echo "selected";?>>출력안함</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">새글 NEW 표시</label>
                                        <div class="controls">
                                            <select class="form-control-static" name="boc_new_time" id="boc_new_time">
                                                <option vlaue="0">사용안함</option>
                                                <?php for($k=6;$k<=48;$k=$k+6){?>
                                                    <option value="<?php echo $k?>" <?php if($k==$boc_new_time)echo "selected";?>><?php echo $k?> 시간</option>
                                                <?php }?>
                                            </select>
                                            이내 작성 글
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">비밀글</label>
                                        <div class="controls">
                                            <select class="form-control-static" name="boc_secret" id="boc_secret">
                                                <option value="open">사용안함</option>
                                                <option value="check" <?php if($boc_secret=="check")echo "selected";?>>사용자 선택</option>
                                                <option value="force" <?php if($boc_secret=="force")echo "selected";?>>무조건 비밀글</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">1:1게시판</label>
                                        <div class="controls">
                                            <div class='checkbox check-success'>
                                                <input type='checkbox' name='boc_private' value='1' id='boc_private' <?php if($boc_private)echo "checked";?>>
                                                <label for='boc_private'>자신이 작성한 게시물만 확인 가능합니다.</label>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <label class="form-label">글 분류<br>(카테고리)</label>
                                        <div class="controls">
                                            <input type="text" class="form-control" id="boc_category" name="boc_category"
                                                   placeholder="쉼표(,)로 구분" value="<?php echo $boc_category?>" >
                                            <br><small>여러 분류 사용시 쉼료(,)로 구분해주세요. 예) 배송문의,구매문의,교환문의
                                                <br>미입력시 사용하지 않습니다.
                                            </small>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">고정 제목 사용</label>
                                        <div class="controls">
                                            <textarea class="form-control h100" name="boc_fixed_title" id="boc_fixed_title" placeholder="줄바꿈(엔터)으로 구분"><?php echo $boc_fixed_title?></textarea>
                                            <br><small>제목을 직접 입력이 아닌 고정으로 사용을 원할 경우 입력합니다.
                                                <br>예) 배송문의드립니다. 교환문의입니다. 후기입니다.
                                                <br>일반적으로 문의게시판 + 모조건 비밀글로 설정하여, 문의글 제목만으로 내용을 유추할 수 없도록 하기 위해 이용합니다.
                                            </small>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/  Form Box -->
                </div>

                <div class='col-lg-5 col-sm-6'>
                    <div class="grid simple ">
                        <div class="grid-title no-border">
                            <h4>권한설정</h4>
                        </div>

                        <div class="grid-body editForm">

                            <div class="row">
                                <div class="col-xs-12">

                                    <?php
                                    $auth = array("list"=>"게시판 접근","read"=>"읽기","write"=>"쓰기","reply"=>"답변");
                                    foreach($auth as $au=>$au_title){
                                        $v = "boc_auth_".$au;
                                        ?>
                                    <div class="form-group">
                                        <label class="form-label"><?php echo $au_title?></label>
                                        <div class="controls fieldText">

                                            <?php foreach($authConf as $ac_lv=>$ac){
                                                $s = "";
                                                if($$v==$ac_lv)$s = "checked";

                                                ?>
                                            <div class='radio radio-success'>
                                                <input type='radio' name='boc_auth_<?php echo $au?>' value='<?php echo $ac_lv?>' id='boc_auth_<?php echo $au?>_<?php echo $ac_lv?>'
                                                       <?php echo $s?>>
                                                <label for='boc_auth_<?php echo $au?>_<?php echo $ac_lv?>'><?php echo $ac?></label>
                                            </div>
                                            <?php }?>

                                        </div>
                                    </div>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Content Area -->

            <div class="row">
                <div class='col-xs-12 text-center'>
                    <button type='submit' class='btn btn-primary btn-large mr20'>저 장</button>
                    <a type='button' class='btn btn-danger btn-large' href="<?php echo $cont_url.$qstr?>">취소</a>
                </div>
            </div>

        </form>
        <!--/ row -->

        <!-- END PAGE -->
    </div>
</div>

<script>
    $(function(){
        // 특수문자 정규식 변수(공백 미포함)
        var replaceChar = /[~!@\#$%^&*\()\-=+_'\;<> \/.\`:\"\\,\[\]?|{}]/gi;

        // 완성형 아닌 한글 정규식
        var replaceNotFullKorean = /[ㄱ-ㅎ|ㅏ-ㅣ|가-힣]/gi;

        $("#boc_code").on("focusout keyup", function() {
            var x = $(this).val();
            if (x.length > 0) {
                if (x.match(replaceChar) || x.match(replaceNotFullKorean)) {
                    x = x.replace(replaceChar, "").replace(replaceNotFullKorean, "");
                }
                $(this).val(x);
            }
        });
    });


</script>