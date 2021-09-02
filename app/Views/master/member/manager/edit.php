<script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
<div class="content ">
    <div class="page-title">
        <h3>관리자 설정 </h3>
    </div>
    <div id="container">

        <!--  Form Box -->
        <?php echo $validate_error_msg?>
        <form method="post" enctype="multipart/form-data" id="editForm">
            <input type="hidden" name="<?php echo $primaryKey?>" id="<?php echo $primaryKey?>" value="<?php echo $idx?>">

            <!-- row -->
            <div class="row">
                <div class='col-lg-4 col-lg-offset-2 col-sm-6'>
                    <div class="grid simple ">
                        <div class="grid-title no-border">
                            <h4>기본정보</h4>
                        </div>

                        <div class="grid-body editForm">
                            <div class="row">
                                <div class="col-xs-12">

                                    <?php if($mem_id==''){?>
                                        <div class="form-group">
                                            <label class="form-label">아이디</label>
                                            <div class="controls">
                                                <input type="text" class="form-control" id="mem_id" name="mem_id"
                                                       placeholder="아이디" required>
                                            </div>
                                        </div>
                                    <?php }else{?>
                                        <div class="form-group">
                                            <label class="form-label">아이디</label>
                                            <div class="controls fieldText">
                                                <?php echo $mem_id?>
                                                <input type="hidden" class="form-control" id="mem_id" name="mem_id" value="<?php echo $mem_id?>">
                                            </div>
                                        </div>
                                    <?php }?>

                                    <div class="form-group">
                                        <label class="form-label">비밀번호</label>
                                        <div class="controls">
                                            <input type="password" class="form-control" id="mem_pass" name="mem_pass"
                                                   placeholder="비밀번호">
                                            <?php if($mem_id!=''){?>
                                                <span class='helpText'>※ 변경시에만 입력</span>
                                            <?php }?>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">이름</label>
                                        <div class="controls">
                                            <input type="text" class="form-control" id="mem_name" name="mem_name"
                                                   placeholder="이름" value="<?php echo $mem_name?>" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">연락처</label>
                                        <div class="controls">
                                            <input type="text" class="form-control" id="mem_tel" name="mem_tel"
                                                   placeholder="연락처" value="<?php echo $mem_tel?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">이메일주소</label>
                                        <div class="controls">
                                            <input type="text" class="form-control" id="mem_email" name="mem_email"
                                                   placeholder="이메일주소" value="<?php echo $mem_email?>">
                                            ※ 회원에게 이메일 발송시 "발신자"이메일주소로 들어갑니다.
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">주소</label>
                                        <div class="controls">
                                            <input type="text" class="form-control" id="mem_addr1" name="mem_addr1"
                                                   placeholder="주소" value="<?php echo $mem_addr1?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">상세주소</label>
                                        <div class="controls">
                                            <input type="text" class="form-control" id="mem_addr2" name="mem_addr2"
                                                   placeholder="상세주소" value="<?php echo $mem_addr2?>">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="form-label">성별</label>
                                        <div class="controls fieldText">
                                            <div class='radio radio-success'>
                                                <input type='radio' name='mem_gender' value='1' id='mem_gender1'
                                                    <?php if($mem_gender!="2")echo 'checked';?>>
                                                <label for='mem_gender1'>남성</label>
                                            </div>
                                            <div class='radio radio-danger'>
                                                <input type='radio' name='mem_gender' value='2' id='mem_gender2'
                                                    <?php if($mem_gender=="2")echo 'checked';?>>
                                                <label for='mem_gender2'>여성</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="grid simple hidden">
                        <div class="grid-title no-border">
                            <h4>탈퇴정보</h4>
                        </div>

                        <div class="grid-body editForm">

                            <div class="row">
                                <div class="col-xs-12">

                                    <div class="form-group">
                                        <label class="form-label">탈퇴일시</label>
                                        <div class="controls fieldText">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">탈퇴사유</label>
                                        <div class="controls fieldText">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/  Form Box -->
                </div>

                <div class='col-lg-4 col-sm-6'>
                    <div class="grid simple ">
                        <div class="grid-title no-border">
                            <h4>메뉴 권한</h4>
                        </div>

                        <div class="grid-body editForm">

                            <div class="row">
                                <div class="col-xs-12">

                                    <?php foreach($master_menu as $code1=>$mn1){?>
                                        <table class="table table-bordered">
                                            <tbody>
                                            <tr>
                                                <th class="w100"><?php echo $mn1["name"]?></th>
                                                <td>
                                                    <div class="row">
                                                        <?php

                                                        //-- 서브가 없을경우 메인 코드로 정의
                                                        if(!isset($mn1["sub"]) || !sizeof($mn1["sub"])){
                                                            $mn1["sub"][] = $mn1;

                                                        }

                                                        foreach($mn1["sub"] as $code2=>$sub){

                                                            $check = "";
                                                            if(isset($auth_menu_list[$code1][$code2]))$check = "checked";
                                                            ?>
                                                            <div class="col-xs-6 mb10">
                                                                <label class="label label-item"><input type="checkbox" name="amn_code[]" value="<?php echo $code1?>::<?php echo $code2?>" <?php echo $check?>>
                                                                    <?php echo $sub["name"]?>
                                                                </label>
                                                            </div>
                                                        <?php }?>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    <?php }?>

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
        <!--/  Form Box -->

    </div>
</div>