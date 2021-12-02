<div class="content ">
    <div class="page-title">
        <h3>업체정보 설정 </h3>
    </div>
    <div id="container">

        <a class="btn btn-lg <?php if($con_lang=="rus")echo "btn-primary";?>" href="<?php echo $cont_url?>/company/rus" >러시아</a>
        <a class="btn btn-lg <?php if($con_lang=="kor")echo "btn-primary";?>" href="<?php echo $cont_url?>/company/kor" >국문</a>

        <!-- Form Box -->
        <form method="post" enctype="multipart/form-data" id="editForm">
            <input type="hidden" name="con_lang" value="<?php echo $con_lang?>">

            <!-- row -->
            <div class="row">
                <div class='col-lg-8 col-lg-offset-2'>
                    <div class="grid simple ">
                        <div class="grid-title no-border">
                            <h4>업체 정보</h4>
                        </div>

                        <div class="grid-body editForm">


                            <div class="row mb10">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="inCTname" class="col-sm-2 control-label">업체명</label>
                                        <div class="col-sm-10 col-md-5 col-lg-3">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="회사명" value="<?php echo $name?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb10">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="inCTname" class="col-sm-2 control-label">대표자명</label>
                                        <div class="col-sm-10 col-md-5 col-lg-3">
                                            <input type="text" class="form-control" id="ceo" name="ceo" placeholder="대표자명" value="<?php echo $ceo?>" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb10">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="inCTname" class="col-sm-2 control-label">사업자 등록번호</label>
                                        <div class="col-sm-10 col-md-5 col-lg-3">
                                            <input type="text" class="form-control" id="code" name="code" placeholder="사업자 등록번호" value="<?php echo $code?>" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--
                            <div class="row mb10">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="inCTname" class="col-sm-2 control-label">통신판매 신고번호</label>
                                        <div class="col-sm-10 col-md-5 col-lg-3">
                                            <input type="text" class="form-control" id="online_license" name="online_license" placeholder="통신판매 신고번호" value="<?php echo $online_license?>" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            -->
                            <div class="row mb10">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="inCTname" class="col-sm-2 control-label">대표 전화번호</label>
                                        <div class="col-sm-10 col-md-5 col-lg-3">
                                            <input type="text" class="form-control" id="tel" name="tel" placeholder="대표 이메일" value="<?php echo $tel?>" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb10">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="inCTname" class="col-sm-2 control-label">대표 이메일</label>
                                        <div class="col-sm-10 col-md-5 col-lg-3">
                                            <input type="text" class="form-control" id="email" name="email" placeholder="대표 이메일" value="<?php echo $email?>" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb10">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="inCTname" class="col-sm-2 control-label">대표 팩스번호</label>
                                        <div class="col-sm-10 col-md-5 col-lg-3">
                                            <input type="text" class="form-control" id="fax" name="fax" placeholder="대표 팩스번호" value="<?php echo $fax?>" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb10">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="inMaddr2" class="col-sm-2 control-label">주소</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="addr" name=addr value="<?php echo $addr?>" placeholder="주소">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb10">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="inMaddr2" class="col-sm-2 control-label">업무시간</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" id="work_time" name="work_time" placeholder="업무시간"><?php echo $work_time?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb10">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="inCTname" class="col-sm-2 control-label">개인정보책임자명</label>
                                        <div class="col-sm-10 col-md-5 col-lg-3">
                                            <input type="text" class="form-control" id="manager" name="manager" placeholder="개인정보책임자명" value="<?php echo $manager?>" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb10">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="inCTname" class="col-sm-2 control-label">개인정보책임자<br>이메일</label>
                                        <div class="col-sm-10 col-md-5 col-lg-3">
                                            <input type="text" class="form-control" id="manager_email" name="manager_email" placeholder="개인정보책임자 이메일" value="<?php echo $manager_email?>" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--
                            <div class="row mb10">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="inCTname" class="col-sm-2 control-label">계좌번호</label>
                                        <div class="col-sm-10">
                                            <div class='input-group'>
                                                <span class='input-group-addon'>은행명:</span>
                                                <input type="text" class="form-control" id="bank_name" name="bank_name" placeholder="은행명" value="<?php echo $bank_name?>" >
                                                <span class='input-group-addon'>계좌번호:</span>
                                                <input type="text" class="form-control" id="bank_code" name="bank_code" placeholder="계좌번호" value="<?php echo $bank_code?>" >
                                                <span class='input-group-addon'>예금주</span>
                                                <input type="text" class="form-control" id="bank_user" name="bank_user" placeholder="예금주" value="<?php echo $bank_user?>" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            -->
                        </div>

                    </div>
                </div>
            </div>
            <!--/ row -->
            <!-- row -->
            <div class="row">
                <div class='col-xs-12 text-center'>
                    <button type='submit' class='btn btn-primary btn-large mr20'>저 장</button>
                </div>
            </div>
            <!--/ row -->
        </form>
        <!--/ Form Box -->

    </div>
    <!-- END PAGE -->
</div>

