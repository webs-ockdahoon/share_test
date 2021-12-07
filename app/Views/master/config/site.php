<div class="content ">
    <div class="page-title">
        <h3>사이트 설정 </h3>
    </div>
    <div id="container">

            <a class="btn btn-lg <?php if($con_lang=="rus")echo "btn-primary";?>" href="<?php echo $cont_url?>/site/rus" >러시아</a>
            <a class="btn btn-lg <?php if($con_lang=="kor")echo "btn-primary";?>" href="<?php echo $cont_url?>/site/kor" >국문</a>

            <!--  Form Box -->
            <form method="post" enctype="multipart/form-data" id="editForm">
                <input type="hidden" name="con_lang" value="<?php echo $con_lang?>">
                <!-- row -->

                <div class="row">
                    <div class='col-lg-12'>
                        <div class="grid simple ">
                            <div class="grid-title no-border">
                                <h4>메인 홍보영상</h4>
                            </div>

                            <div class="grid-body editForm">

                                <div class="row">
                                    <div class="col-xs-12">

                                        <div class="form-group">
                                            <label for="inCTname" class="col-sm-2 control-label">영상URL</label>
                                            <div class="col-sm-10 col-md-5">
                                                <input type="text" class="form-control" id="main_movie1" name="main_movie1" placeholder="http:// 포함 전체주소 입력" value="<?php echo $main_movie1?>" >
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class='col-lg-6'>
                        <div class="grid simple ">
                            <div class="grid-title no-border">
                                <h4>사이트 헤더 설정</h4>
                            </div>

                            <div class="grid-body editForm">

                                <div class="row">
                                    <div class="col-xs-12">

                                        <div class="form-group">
                                            <label for="inCTname" class="col-sm-2 control-label">사이트 제목 (Title)</label>
                                            <div class="col-sm-10 col-md-5">
                                                <input type="text" class="form-control" id="header_title" name="header_title" placeholder="사이트 제목" value="<?php echo $header_title?>" >
                                            </div>
                                            <div class="col-sm-10 col-sm-offset-2 helpText">
                                                ※ 페이지에 따라서 제목은 달라질 수 있습니다.<br>
                                                ※ 일반적으로 사이트명을 작성합니다.
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="inCTname" class="col-sm-2 control-label">사이트 설명 (Description)</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="header_description" name="header_description" placeholder="사이트 설명" value="<?php echo $header_description?>">
                                            </div>
                                            <div class="col-sm-10 col-sm-offset-2 helpText">
                                                ※ 페이지에 따라서 설명은 달라질 수 있습니다.
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="inCTname" class="col-sm-2 control-label">사이트 대표 이미지 (Image)</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="header_image" name="header_image" placeholder="사이트 대표 이미지" value="<?php echo $header_image?>">
                                            </div>
                                            <div class="col-sm-10 col-sm-offset-2 helpText">
                                                ※ http:// 로 시작하는 전체 주소를 입력해주세요.<br>
                                                ※ 페이지에 따라서 대표 이지미는 달라질 수 있습니다.
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="inCTname" class="col-sm-2 control-label">추가 헤더</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control h200" id="header_additional" name="header_additional" placeholder='추가 헤더' ><?php echo $header_additional?></textarea>
                                            </div>
                                            <div class="col-sm-10 col-sm-offset-2 helpText">
                                                ※ 사이트 상단에 추가로 출력할 내용이 있으실 경우 작성해주세요.<br>
                                                예) 네이버 웹마스터도구나 구글 웹마스터 도구의 소유자 확인 코드를 입력할 수 있습니다.
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
                                <h4>헤더 미리보기</h4>
                            </div>

                            <div class="grid-body editForm">

                                <div class='headerPreview'>
                                    &lt;head&gt;<br>
                                    &nbsp;&nbsp;&nbsp;&lt;meta charset="utf-8"&gt;<br>
                                    &nbsp;&nbsp;&nbsp;&lt;meta http-equiv="X-UA-Compatible" content="IE=edge"&gt;<br>
                                    &nbsp;&nbsp;&nbsp;&lt;meta name="viewport" content="width=device-width, user-scalable=no"&gt;
                                    <div id='previewCode'></div>
                                    &lt;/head&gt;
                                </div>

                            </div>

                        </div>
                    </div>


                </div>
                <!--/ row -->
                <!-- row -->
                <div class='col-xs-12 text-center'>
                    <button type='submit' class='btn btn-primary btn-large mr20'>저 장</button>
                </div>
                <!--/ row -->
            </form>
        <!--/  Form Box -->
        </div>


    </div>
    <!-- END PAGE -->
</div>


<script>
    $(function(){
        $("#header_title,#header_description,#header_image,#header_additional").blur(function(){
            fnHeaderPreview();
        });

        fnHeaderPreview();
    });

</script>