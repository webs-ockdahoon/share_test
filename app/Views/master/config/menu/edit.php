<div class="content ">
    <div class="page-title">
        <h3>기본메뉴 관리</h3>
    </div>
    <div id="container">

        <!--  Form Box -->
        <?php echo $validate_error_msg?>
        <form method="post" enctype="multipart/form-data" id="editForm">
            <input type="hidden" name="<?php echo $primaryKey?>" id="<?php echo $primaryKey?>" value="<?php echo $idx?>">
            <input type="hidden" name="add_child" value="<?php echo $add_child?>">


            <!-- row -->
            <div class="row">
                <div class='col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3'>

                    <?php if($add_child){?>
                        <div class="grid simple ">
                            <div class="grid-title no-border">
                                <h4>상위메뉴</h4>
                            </div>

                            <div class="grid-body editForm">
                                <div class="row">
                                    <div class="col-xs-12">

                                        <div class="form-group">
                                            <label class="form-label">메뉴명(국문)</label>
                                            <div class="controls fieldText">
                                                <?php echo $parent_info["mnu_title_kor"]?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">메뉴명(러시아)</label>
                                            <div class="controls fieldText">
                                                <?php echo $parent_info["mnu_title_rus"]?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">링크주소</label>
                                            <div class="controls fieldText">
                                                <?php echo $parent_info["mnu_url"]?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">메모</label>
                                            <div class="controls fieldText">
                                                <?php echo $parent_info["mnu_comment"]?>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }?>

                    <div class="grid simple ">
                        <div class="grid-title no-border">
                            <h4>기본정보</h4>
                        </div>

                        <div class="grid-body editForm">
                            <div class="row">
                                <div class="col-xs-12">

                                    <div class="form-group">
                                        <label class="form-label">메뉴명(국문)</label>
                                        <div class="controls">
                                            <input type="text" class="form-control" id="mnu_title_kor" name="mnu_title_kor"
                                                   placeholder="메뉴명" value="<?php echo $mnu_title_kor?>" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">사용여부(국문) </label>
                                        <div class="controls fieldText">
                                            <div class='radio radio-success'>
                                                <input type='radio' name='mnu_display_kor' value='Y' id='mnu_display_kor1'
                                                    <?php if($mnu_display_kor!="N")echo 'checked';?>>
                                                <label for='mnu_display_kor1'>사용</label>
                                            </div>
                                            <div class='radio radio-danger'>
                                                <input type='radio' name='mnu_display_kor' value='N' id='mnu_display_kor2'
                                                    <?php if($mnu_display_kor=="N")echo 'checked';?>>
                                                <label for='mnu_display_kor2'>사용안함</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">메뉴명(러시아)</label>
                                        <div class="controls">
                                            <input type="text" class="form-control" id="mnu_title_rus" name="mnu_title_rus"
                                                   placeholder="메뉴명" value="<?php echo $mnu_title_rus?>" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">사용여부(러시아) </label>
                                        <div class="controls fieldText">
                                            <div class='radio radio-success'>
                                                <input type='radio' name='mnu_display_rus' value='Y' id='mnu_display_rus1'
                                                    <?php if($mnu_display_rus!="N")echo 'checked';?>>
                                                <label for='mnu_display_rus1'>사용</label>
                                            </div>
                                            <div class='radio radio-danger'>
                                                <input type='radio' name='mnu_display_rus' value='N' id='mnu_display_rus2'
                                                    <?php if($mnu_display_rus=="N")echo 'checked';?>>
                                                <label for='mnu_display_rus2'>사용안함</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                    ※ 메뉴명은 국문/러시아 모두 필수입력입니다.<br>특정 언어에서 사용하지 않을 경우 간단하게 입력 후 "사용안함"처리 해주세요  예) 점(.)
                                    </div>

                                    <?php
                                    // 1단계 카테고리만 서브타이틀 출력가능. 일단 급한대로.. 조건은 나중에 다시 손보자.
                                    if( (!$add_child && !$mnu_idx) || substr($mnu_code,2,2)=='00' ){?>
                                    <div class="form-group">
                                        <label class="form-label">서브타이틀</label>
                                        <div class="controls">
                                            <input type="text" class="form-control" id="mnu_sub_title" name="mnu_sub_title"
                                                   placeholder="서브타이틀" value="<?php echo $mnu_sub_title?>">
                                            <br><Small>※ 서브페이지 상단 특정 영역에 노출되는 문구입니다.<br>※ 테마에 따라서 노출 여부 및 노출위치는 달라질 수 있습니다.</Small>
                                        </div>
                                    </div>
                                    <?php }?>

                                    <!--
                                    <div class="form-group">
                                        <label class="form-label">링크 유형 </label>
                                        <div class="controls fieldText">
                                            <div class='radio radio-success'>
                                                <input type='radio' name='mnu_url_type' value='direct' id='mnu_url_type1'
                                                       onclick="fnSetUrlType()"
                                                    <?php if($mnu_url_type!="page")echo 'checked';?>>
                                                <label for='mnu_url_type1'>직접지정</label>
                                            </div>
                                            <div class='radio radio-primary'>
                                                <input type='radio' name='mnu_url_type' value='page' id='mnu_url_type2'
                                                       onclick="fnSetUrlType()"
                                                    <?php if($mnu_url_type=="page")echo 'checked';?>>
                                                <label for='mnu_url_type2'>페이지 지정</label>
                                            </div>
                                        </div>
                                    </div>
                                    -->
                                    <input type="hidden" name="mnu_url_type" id="mnu_url_type" value="direct">

                                    <div class="form-group" id="mnu_url_direct">
                                        <label class="form-label">링크주소</label>
                                        <div class="controls">
                                            <input type="text" class="form-control" id="mnu_url" name="mnu_url"
                                                   placeholder="링크주소" value="<?php echo $mnu_url?>">
                                            <!--<br> ※ 일부 준비된 레이어 팝업 출력을 원하실 경우 #모달ID 로 지정해주세요.-->
                                            </small>
                                        </div>
                                    </div>

                                    <?php /*
                                    <div class="form-group" id="mnu_url_page">
                                        <label class="form-label">페이지 지정</label>
                                        <div class="controls">
                                            <select name="mnu_page_idx" id="mnu_page_idx" class="form-control" onchange="fnSetPageUrl()">
                                                <option value="">미지정</option>
                                                <?php
                                                foreach($page_list as $pg){
                                                    ?>
                                                    <option value="<?php echo $pg["page_idx"]?>" <?php if($pg["page_idx"]==$mnu_page_idx)echo 'selected';?>><?php echo $pg["page_title"]?></option>
                                                <?php }?>
                                            </select>
                                            <b class="text-danger">※ 페이지 지정은 '<?php echo $site_code?>'에서만 작동됩니다.</b>
                                        </div>
                                    </div>
                                    */?>


                                    <div class="form-group">
                                        <label class="form-label">메모</label>
                                        <div class="controls">
                                            <input type="text" class="form-control" id="mnu_comment" name="mnu_comment"
                                                   placeholder="메모" value="<?php echo $mnu_comment?>">
                                        </div>
                                    </div>




                                </div>
                            </div>
                        </div>

                    </div>

                    <!--/  Form Box -->
                </div>
            </div>


            <!--/ row -->

            <!-- row -->
            <div class="row edit_btn_wrap">
                <div class='col-xs-12 text-center'>
                    <button type='submit' class='btn btn-primary btn-large mr20'>저 장</button>
                    <a type='button' class='btn btn-danger btn-large' href="<?php echo $cont_url?>">취소</a>
                </div>
            </div>
            <!--/ row -->
        </form>
        <!--/  Form Box -->

    </div>
</div>

<script>
    $(function(){
        //fnSetUrlType();
    });

    /**
     * 링크 유형 처리
     */
    /*
    function fnSetUrlType(){
        var v = $("[name='mnu_url_type']:checked").val();
        if(v=='page'){
            $("#mnu_site").prop("checked",false).prop("disabled",true);
        }else{
            $("#mnu_site").prop("disabled",false);
        }

        $("#mnu_url_direct,#mnu_url_page").addClass("hidden");
        $("#mnu_url_" + v).removeClass("hidden");
    }
    */

    /**
     * 페이지 선택에 따른 링크 주소 만들기
     */
    function fnSetPageUrl(){
        var v = $("#mnu_page_idx").val();
        if(v==""){
            $("#mnu_url").val("");
        }else{
            $("#mnu_url").val("/page/"+v);
        }
    }
</script>